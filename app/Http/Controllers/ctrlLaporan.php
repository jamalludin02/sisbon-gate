<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanDataTable;
use App\Models\Penilaian;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ctrlLaporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dataLaporan(Request $request)
    {
        $id = $request->id ?? null;
        // var_dump($id);
        $role = Auth::user()->role;
        $list = PeriodePenilaian::all();
        if ($id == null) {
            $periode = PeriodePenilaian::select('id')->latest()->firstOrFail();
        } else {
            $periode = PeriodePenilaian::select('id')->find($id);
        }
        $nilaiPg = Penilaian::with([
            'pegawai' => function ($q) {
                $q->with(['jabatan']);
            },
            'periode',
            'kriteria',
        ])
            ->where('periode_id', $periode->id)
            ->orderBy('pegawai_id')
            ->orderBy('kriteria_id')
            ->get()
            ->groupBy('pegawai_id')
            ->values()
            ->toArray();

        $nilaiPg = collect($nilaiPg)
            ->map(function ($item) {
                return collect($item)
                    ->map(function ($val) {
                        return [
                            'id' => $val['id'],
                            'pegawai_id' => $val['pegawai_id'],
                            'nip' => $val['pegawai']['nip'],
                            'nama' => $val['pegawai']['nama'],
                            'jabatan' => $val['pegawai']['jabatan']['jabatan'],
                            'periode_id' => $val['periode_id'],
                            'kriteria_id' => $val['kriteria_id'],
                            'nilai' => $val['nilai'],
                            'bobot' => $val['kriteria']['bobot'],
                            'tipe' => $val['kriteria']['tipe'],
                        ];
                    })
                    ->toArray();
            })
            ->toArray();

        $data = $this->topsis($nilaiPg);
        usort($data, function($a, $b) {
            if ($a['preferensi'] == $b['preferensi']) {
                return 0;
            }
            return ($a['preferensi'] > $b['preferensi']) ? -1 : 1;
        });
        
        return view('pages.laporan', compact('data', 'periode', 'list', 'role'));
    }

    public function topsis($data)
    {
        // matriks Evaluasi
        $criteriaPow = collect($data)
            ->map(function ($item, $keys) {
                // dd($item);
                $item = collect($item)
                    ->map(function ($val) {
                        $val['nilai_pow'] = pow($val['nilai'], 2);
                        return $val;
                    })
                    ->toArray();
                return $item;
            })
            ->toArray();
        $transposed = $this->transposedata($criteriaPow);

        $sum = collect($transposed)->map(function ($item) {
            return sqrt(collect($item)->pluck('nilai_pow')->sum());
        });

        // normalisasi
        $normalisasi = collect($criteriaPow)->map(function ($item) use ($sum) {
            return collect($item)
                ->map(function ($val, $key) use ($sum) {
                    // dd($sum, $key);
                    $val['normalisasi'] = round($val['nilai'] / $sum[$key], 5);
                    return $val;
                })
                ->toArray();
        });

        // normalisasi terbobot
        $normalisasiTbb = collect($normalisasi)->map(function ($item) {
            $sum = collect($item)->pluck('bobot')->sum();
            return collect($item)
                ->map(function ($val, $key) use ($sum) {
                    // dd($sum, $key);
                    $val['normalisasi_terbobot'] = round(($val['bobot'] * $val['normalisasi']) / $sum, 5);
                    return $val;
                })
                ->toArray();
        });

        $transposed = $this->transposedata($normalisasiTbb);

        // matrix minimum dan maximum
        $matrixMinMax = [];
        collect($transposed)->map(function ($item, $keys) use (&$matrixMinMax) {
            $matrixMinMax[$keys]['Min'] = collect($item)->pluck('normalisasi_terbobot')->min();
            $matrixMinMax[$keys]['Max'] = collect($item)->pluck('normalisasi_terbobot')->max();
        });

        // matrix solusi ideal
        $matrixSolusi = [];
        collect($transposed)->map(function ($item, $keys) use (&$matrixSolusi, $matrixMinMax) {
            $tipe = collect($item)->pluck('tipe')->first();
            $matrixSolusi[$keys]['positif'] = $tipe == 'BENEFIT' ? $matrixMinMax[$keys]['Max'] : $matrixMinMax[$keys]['Min'];
            $matrixSolusi[$keys]['negatif'] = $tipe == 'COST' ? $matrixMinMax[$keys]['Max'] : $matrixMinMax[$keys]['Min'];
        });

        // matrix positif dan negatif by pegawai
        $matrix = collect($normalisasiTbb)->map(function ($item) use ($matrixSolusi) {
            return collect($item)
                ->map(function ($val, $key) use ($matrixSolusi) {
                    $val['positif'] = round(pow($val['normalisasi_terbobot'] - $matrixSolusi[$key]['positif'], 2), 5);
                    $val['negatif'] = round(pow($val['normalisasi_terbobot'] - $matrixSolusi[$key]['negatif'], 2), 5);
                    return $val;
                })
                ->toArray();
        });

        $transposed = $this->transposedata($matrix);
        $matrixRangking = [];
        collect($transposed)->map(function ($item, $keys) use (&$matrixRangking) {
            $matrixRangking[$keys]['positif'] = collect($item)->pluck('positif')->min();
            $matrixRangking[$keys]['negatif'] = collect($item)->pluck('negatif')->max();
        });
        // dd($matrixRangking);

        $matrixResult = collect($matrix)
            ->map(function ($item, $key) use ($matrixRangking) {
                // Menginisialisasi variabel $positif dan $negatif
                $positif = 0;
                $negatif = 0;

                // Menghitung total positif dan negatif dari matriks
                foreach ($item as $row) {
                    $positif += $row['positif'];
                    $negatif += $row['negatif'];
                }

                // Menghitung akar kuadrat dari total positif dan negatif
                $sqrtPositif = round(sqrt($positif), 5);
                $sqrtNegatif = round(sqrt($negatif), 5);

                // Menghitung preferensi
                $preferensi = $sqrtNegatif / ($sqrtPositif + $sqrtNegatif);

                // Mengembalikan hasil dalam bentuk array
                return [
                    'nama' => $item[0]['nama'],
                    'nip' => $item[0]['nip'],
                    'jabatan' => $item[0]['jabatan'],
                    'positif' => $sqrtPositif,
                    'negatif' => $sqrtNegatif,
                    'preferensi' => $preferensi,
                ];
            })
            ->toArray();

        return $matrixResult;
    }

    public function transposeData($data)
    {
        $transposed = [];
        foreach ($data as $key => $value) {
            foreach ($value as $subKey => $subValue) {
                $transposed[$subKey][$key] = $subValue;
            }
        }
        return $transposed;
    }
}
