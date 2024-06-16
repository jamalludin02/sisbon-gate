<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\PeriodePenilaian;
use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ctrlLaporanGaji extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AttendanceService $attendanceService, Request $request)
    {
        $role = Auth::user()->role;
        $selectedYear = $request->year ?? now()->year;
        $selectedMonth = $request->month ?? now()->format('m');
        $firstYearList = $selectedYear - 5;
        $periode = PeriodePenilaian::select('id')->where('tahun', intval($selectedYear))->where('bulan', intval($selectedMonth))->first();
        // if ($periode == null) {
        //     $data = null;
        //     return view('pages.laporan-gaji', compact('data', 'selectedYear', 'selectedMonth', 'firstYearList',  'role'));
        // }

        $data = $this->generateGaji($attendanceService, $selectedYear, $selectedMonth);

        return view('pages.laporan-gaji', compact('data', 'selectedYear', 'selectedMonth', 'firstYearList',  'role'));
    }

    public function printAsPdf(AttendanceService $attendanceService, $year, $month)
    {
        $data = $this->generateGaji($attendanceService, $year, $month);
        return view('pages.pdf.laporan-gaji', compact('data', 'year', 'month'));
    }
    public function generateGaji($attendanceService, $year, $month)
    {

        $periode = PeriodePenilaian::select('id')->where('tahun', intval($year))->where('bulan', intval($month))->first();
        if ($periode) {
            $request = new Request();
            $request->merge(['id' => $periode->id]);
        }

        $lapPresensi = new ctrlLaporanPresensi();
        $lapPresensi = $lapPresensi->generateLaporanPresensi($attendanceService, $year, $month);

        $lapPenilaian = new ctrlLaporanPenilaian();
        if ($periode) {
            $lapPenilaian = $lapPenilaian->dataLaporan($request);
        }
        // dd($lapPenilaian);

        // $penilaian = $penilaian->lapo
        $lapPresensi = collect($lapPresensi['arrAttPegawai'])->all();
        $lapPresensi = collect($lapPresensi)->map(function ($item) use ($lapPenilaian, $periode) {
            $rangkig = 0;
            if ($periode) {
                $lapPenilaianArray = collect($lapPenilaian['data'])->toArray();
                $getIndexRangking = array_search($item['data']['id'], array_column($lapPenilaianArray, 'id'));
                $rangkig = $getIndexRangking + 1;
            }
            // dd($lapPenilaianArray);
            // dd($getIndexRangking);

            // H = Hadir, A = Alpha, S = Sakit, I = Izin, C = Cuti
            $hadirCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'HADIR';
                })
                ->count();

            $alphaCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'ALPHA';
                })
                ->count();

            $sakitCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'SAKIT';
                })
                ->count();
            $izinCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'IZIN';
                })
                ->count();
            $cutiCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'CUTI';
                })
                ->count();
            $liburCount = collect($item['presensi'])
                ->filter(function ($status) {
                    return $status == 'LIBUR';
                })
                ->count();

            $gaji = ($hadirCount - $liburCount) * $item['data']['gaji_harian'];
            // Menggunakan if-else untuk menghitung bonus gaji berdasarkan rangking
            if ($rangkig == '1') {
                $bonus_gaji = 500000;
            } elseif ($rangkig == '2') {
                $bonus_gaji = 400000;
            } elseif ($rangkig == '3') {
                $bonus_gaji = 300000;
            } elseif ($rangkig == '4') {
                $bonus_gaji = 200000;
            } elseif ($rangkig == '5') {
                $bonus_gaji = 100000;
            } else {
                $bonus_gaji = 0;
            }

            // Gunakan $bonus_gaji sesuai kebutuhan Anda di sini

            // Menghitung gaji
            // $item['data']['id'] = $getIndexRangking;
            $item['data']['rangking'] = $rangkig;
            $item['data']['hadir'] = $hadirCount;
            $item['data']['alpha'] = $alphaCount;
            $item['data']['sakit'] = $sakitCount;
            $item['data']['izin'] = $izinCount;
            $item['data']['cuti'] = $cutiCount;
            $item['data']['libur'] = $liburCount;
            $item['data']['gaji'] = $gaji;
            $item['data']['bonus_gaji'] = $bonus_gaji;
            $item['data']['total_gaji'] = $gaji + $bonus_gaji;
            // dd($item);
            return $item['data'];
        });
        return $lapPresensi;
    }
}
