<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Presensi;
use App\Services\AttendanceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ctrlLaporanPresensi extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dataLaporan(AttendanceService $attendanceService, Request $request)
    {
        $role = Auth::user()->role;
        $selectedYear = $request->year ?? now()->year;
        $selectedMonth = $request->month ?? now()->format('m');
        $firstYearList = $selectedYear - 5;
        $result = $this->generateLaporanPresensi($attendanceService, $selectedYear, $selectedMonth);
        // dd($result);
        $arrDay = $result['arrDay'];
        $arrAttPegawai = $result['arrAttPegawai'];

        return view('pages.laporan-presensi', compact('selectedYear', 'selectedMonth', 'firstYearList', 'role', 'arrDay', 'arrAttPegawai'));
    }

    public function printAsPdf(AttendanceService $attendanceService, $year = null, $month = null)
    {
        try {
            $result = $this->generateLaporanPresensi($attendanceService, $year, $month);
            $arrDay = $result['arrDay'];
            $arrAttPegawai = $result['arrAttPegawai'];
            return view('pages.pdf.laporan-presensi', compact('arrDay', 'arrAttPegawai', 'year', 'month'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateLaporanPresensi($attendanceService, $selectedYear, $selectedMonth)
    {
        $daysInMonth = $attendanceService->daysInMonth($selectedYear, $selectedMonth);

        // Initialize array with a certain length and fill it with '-'
        $arr = array_fill(0, $daysInMonth, '-');

        // Populate arrDay with day and date details
        for ($i = 0; $i < $daysInMonth; $i++) {
            $tglPad = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
            $arr[$i] = (object) [
                'hari' => $this->getIndonesianDayName($selectedYear, $selectedMonth, $tglPad),
                'tgl' => $tglPad,
            ];
        }
        $arrDay = $this->transposeData($arr);
        // $arrStatus = $arr;
        // dd($arrStatus);

        // Retrieve attendance data for the selected month
        $pegawai = Presensi::with(['pegawai', 'pegawai.jabatan'])
            ->where('tgl', 'like', $selectedYear . '-' . $selectedMonth . '%')
            ->orderBy('tgl', 'asc')
            ->orderBy('pegawai_id', 'asc')
            ->get();

        // Group attendance data by employee ID
        $arrAttPegawai = collect($pegawai)
            ->groupBy('pegawai_id')
            ->map(function ($item) use ($daysInMonth) {
                $pegawaiData = [];
                $presensi = array_fill(0, $daysInMonth, '-');

                foreach ($item as $key => $value) {
                    // dd($value);  
                    $pegawaiData['id'] = $value->pegawai->id;
                    $pegawaiData['nip'] = $value->pegawai->nip;
                    $pegawaiData['nama'] = $value->pegawai->nama;
                    $pegawaiData['jabatan'] = $value->pegawai->jabatan->jabatan;
                    $pegawaiData['gaji_harian'] = $value->pegawai->jabatan->gaji_harian;

                    $index = intval(substr($value->tgl, 8, 2)) -1 ;
                    $presensi[$index] = $value->status;
                }

                return [
                    'data' => $pegawaiData,
                    'presensi' => $presensi,
                ];
            })
            ->values()
            ->toArray();
        // dd($arrAttPegawai);
        return compact('arrDay', 'arrAttPegawai');
    }

    public function transposeData($data)
    {
        $transposed = [];
        foreach ($data as $key => $value) {
            foreach ($value as $subKey => $subValue) {
                $transposed[$subKey][$key] = $subValue;
            }
        }
        // dd($transposed);
        return $transposed;
    }
}
