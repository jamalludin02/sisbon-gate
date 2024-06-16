<?php

namespace App\Http\Controllers;

use App\Models\PeriodePenilaian;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class ctrlDashboard extends Controller
{
    public function indexAdmin()
    {
        $dataRangkTable = $this->getRangkingTable();
        $rank = collect(array_slice($dataRangkTable['data'], 0, 10));

        $dataPresensi = $this->getDataPresensi();

        $dataPenilaian = $this->getDataPenilaian();

        return view("pages.admin.dashboard", compact('rank', 'dataPresensi', 'dataPenilaian'));
    }
    public function indexSupervisor()
    {
        $dataRangkTable = $this->getRangkingTable();
        $rank = collect(array_slice($dataRangkTable['data'], 0, 10));

        $dataPresensi = $this->getDataPresensi();

        $dataPenilaian = $this->getDataPenilaian();

        return view("pages.supervisor.dashboard", compact('rank', 'dataPresensi', 'dataPenilaian'));
    }

    public function getDataPresensi()
    {


        $data = DB::table('presensi')
            ->select(
                DB::raw('CONCAT(YEAR(tgl), "-", LPAD(MONTH(tgl), 2, "0")) as bulan'),
                DB::raw('SUM(CASE WHEN status = "HADIR" THEN 1 ELSE 0 END) as HADIR'),
                DB::raw('SUM(CASE WHEN status = "ALPA" THEN 1 ELSE 0 END) as ALPA'),
                DB::raw('SUM(CASE WHEN status = "SAKIT" THEN 1 ELSE 0 END) as SAKIT'),
                DB::raw('SUM(CASE WHEN status = "IZIN" THEN 1 ELSE 0 END) as IZIN'),
                DB::raw('SUM(CASE WHEN status = "CUTI" THEN 1 ELSE 0 END) as CUTI'),
                DB::raw('SUM(CASE WHEN status = "LIBUR" THEN 1 ELSE 0 END) as LIBUR')
            )
            ->groupBy(DB::raw('YEAR(tgl)'), DB::raw('MONTH(tgl)'))
            ->get();

        // Initialize arrays for the chart series data
        $hadirData = [];
        $alpaData = [];
        $sakitData = [];
        $izinData = [];
        $cutiData = [];
        $liburData = [];

        // Process the query result to fill the series data arrays
        foreach ($data as $record) {
            $bulan[] = $record->bulan;
            $hadirData[] = (int)$record->HADIR;
            $alpaData[] = (int)$record->ALPA;
            $sakitData[] = (int)$record->SAKIT;
            $izinData[] = (int)$record->IZIN;
            $cutiData[] = (int)$record->CUTI;
        }
        $categories = $bulan;

        // Prepare the series data for the chart
        $series = [
            [
                'name' => 'HADIR',
                'data' => $hadirData
            ],
            [
                'name' => 'ALPA',
                'data' => $alpaData
            ],
            [
                'name' => 'SAKIT',
                'data' => $sakitData
            ],
            [
                'name' => 'IZIN',
                'data' => $izinData
            ],
            [
                'name' => 'CUTI',
                'data' => $cutiData
            ],
        ];


        // Output the series data
        // dd([$bulan, $series]);

        // dd($data);
        return compact('categories', 'series');
    }

    public function getDataPenilaian()
    {
        $request = new Request();
        $periode = PeriodePenilaian::where("status", 'DITUTUP')->get();
        $laporan = new ctrlLaporanPenilaian();
        $dt = array();
        foreach ($periode as $item) {
            $periodeId = $request->input('id', $item->id);
            if ($periodeId) {
                $dt[] = $laporan->dataLaporan($periodeId);
            }
        }

        $categories = [];
        foreach ($periode as $item) {
            $categories[] = ($item->id % 2 == 0 ? 'Genap' : 'Ganjil') . ', ' . $item->bulan . ' - ' . $item->tahun;
        }

        $series = [];
        foreach ($dt as $item) {
            $series[] = $item['data'];
        }
        $series = collect($series);
        $name = $series->map(function ($group) {
            $itemCollection = collect($group);
            $name = $itemCollection->groupBy('jabatan')->keys()->toArray();
            return $name;
        })->values()->toArray();
        $series = $series->map(function ($group) {
            $itemCollection = collect($group);
            $data = $itemCollection->groupBy('jabatan')->map(function ($item, $key) {
                return $item->avg('preferensi');
            });

            return $data;
        });
        $name = array_merge($name);
        $result = [];
        foreach ($name[0] as $item) {

            $result[] =
                [
                    'name' => $item,
                    'data' => $series->pluck($item)->values()->toArray()
                ];
        }


        return compact('categories', 'result');
    }

    public function getRangkingTable()
    {
        $request = new Request();
        $periode = PeriodePenilaian::where("status", 'DITUTUP')->orderBy("created_at", "desc")->first();
        $laporan = new ctrlLaporanPenilaian();
        $dt = null;
        $periodeId = $request->input('id', $periode->id);
        if ($periodeId) {
            $dt = $laporan->dataLaporan($periodeId);
        }
        return $dt;
    }

    function transpose($data)
    {
        $series = [];


        foreach ($data as $item) {
            $series[] = [
                'name' => $item['name'][0], // Ambil nama dari indeks pertama
                'data' => $item['data'],
            ];
        }

        return $series;
    }
}
