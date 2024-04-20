<?php

namespace App\Http\Controllers;

use App\Models\KriteriaPenilaian;
use App\Models\Pegawai;
use App\Models\Penilaian;
use App\Models\PeriodePenilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ctrlPenilaian extends Controller
{
    // public function AdminShow()
    // {
    //     return view('pages.admin.penilaian');
    // }

    public function getPeriodActive()
    {
        $role = Auth::user()->role;
        $data = PeriodePenilaian::where('status', 'DIBUKA')->first();
        return view('pages.penilaianPeriode', isset($data) ? compact('data', 'role') : compact('role'));
    }
    // getpegawaiList for spv
    public function pegawaiList($id)
    {
        $role = Auth::user()->role;
        $periode = PeriodePenilaian::findOrFail($id);
        if (Auth::user()->role == 'SPV') {
            $pegawai = Pegawai::with(['jabatan', 'akun'])
                ->whereDoesntHave('akun', function ($q) {
                    $q->whereIn('role', ['SPV', 'ADMIN']);
                })
                ->get();
            // dd($pegawai);
        } elseif (Auth::user()->role == 'ADMIN') {
            $pegawai = Pegawai::with(['jabatan', 'akun'])
                ->whereDoesntHave('akun', function ($q) {
                    $q->where('role', 'ADMIN');
                })
                ->get();
        }
        // dd($pegawai);
        return view('pages.penilaianPegawai', compact('pegawai', 'periode', 'role'));
    }

    public function formPenilaian($periode_id, $pegawai_id)
    {
        $role = Auth::user()->role;

        $periode = PeriodePenilaian::find($periode_id);
        $pegawai = Pegawai::with('jabatan', 'akun')->findOrFail($pegawai_id);

        // Cek apakah user adalah SPV dan mencoba mengakses halaman untuk dirinya sendiri
        if ($role == 'SPV' && Auth::user()->id == $pegawai_id) {
            return abort(404, 'Halaman Tidak Ditemukan');
        }

        // Cek apakah user adalah SPV dan pegawai yang diakses adalah admin
        if ($role == 'SPV' && $pegawai->akun->role == 'ADMIN') {
            return abort(404, 'Halaman Tidak Ditemukan');
        }
        
        $data = Penilaian::with('kriteria')->where('periode_id', $periode_id)->where('pegawai_id', $pegawai_id)->orderBy('kriteria_id')->get();

        // Jika tidak ada data penilaian untuk periode dan pegawai tertentu
        if ($data->isEmpty()) {
            // Ambil semua kriteria penilaian sebagai data default
            $data = KriteriaPenilaian::select('*', 'id as kriteria_id')->orderBy('kriteria_id')->get();
        } else {
            // Jika ada data penilaian, tambahkan properti 'kriteria' ke setiap objek
            $data = collect($data)
                ->map(function ($item) {
                    $item->kriteria = collect($item->kriteria)->map(function ($kriteria, $key) use ($item) {
                        $key = $key == 'id' ? 'kriteria_id' : $key;
                        $item->{$key} = $kriteria;
                    });
                    unset($item->kriteria);
                    return $item;
                });

            // Ambil objek unik berdasarkan kriteria
            $data = $data->unique('kriteria_id')->values();
        }

        // dd($data->orderBy('kriteria_id')->all());
        return view('pages.formPenilaian', compact('data', 'periode', 'pegawai', 'role'));
    }

    public function storePenilaian(Request $request, $periode_id, $pegawai_id)
    {
        try {
            $role = Auth::user()->role;

            foreach ($request->data as $key => $value) {
                $data = Penilaian::updateOrCreate(
                    [
                        'periode_id' => $periode_id,
                        'pegawai_id' => $pegawai_id,
                        'kriteria_id' => $value['kriteria_id'],
                    ],
                    ['nilai' => $value['value']],
                );
            }

            return redirect()
                ->route($role == 'SPV' ? 'spv.penilaian.select' : 'admin.penilaian.select', $periode_id)
                ->with('success', 'Penilaian Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Penilaian Gagal');
        }
    }
}
