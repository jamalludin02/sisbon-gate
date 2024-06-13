<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Services\AttendanceService;
use Carbon\Carbon;
use stdClass;
use App\Helper\Helper;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ctrlPresensi extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dataPresensi(AttendanceService $attendanceService, Request $request)
    {
        $role = Auth::user()->role;
        $selectedYear = $request->year ?? now()->year;
        $selectedMonth = $request->month ?? now()->format('m');
        $daysInMonth = $attendanceService->daysInMonth($selectedYear, $selectedMonth);
        $firstYearList = $selectedYear - 5;
        $arrDay = [];

        $countPegawai = Pegawai::whereDoesntHave('akun', function ($query) {
            $query->where('role', 'ADMIN');
        })->count();

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = Carbon::create($selectedYear, $selectedMonth, $i);

            $countPresensi = Presensi::whereDate('tgl', $date)->count();

            $arrDay[] = (object) [
                'hari' => $this->getIndonesianDayName($date->year, $date->month, $date->day),
                'tgl' => $date->toDateString(),
                'presensi' => $countPresensi == $countPegawai ? ' ' : 'Absensi Tidak Lengkap',
                'status' =>'enable',
                // 'status' => $date->isToday() && now()->hour >= 7 && now()->hour < 17 ? 'enable' : 'disable',
            ];
        }

        return view('pages.presensi', compact('arrDay', 'selectedYear', 'selectedMonth', 'firstYearList', 'role'));
    }

    public function showDataPresensi($year = null, $month = null, $day = null, $dayName = null)
    {
        $role = Auth::user()->role;
        $pegawai = Presensi::with(['pegawai', 'pegawai.jabatan'])
            ->whereDate('tgl', $year . '-' . $month . '-' . $day)
            ->orderBy('pegawai_id')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => $item->id,
                    'pegawai_id' => $item->pegawai_id,
                    'tgl' => $item->tgl,
                    'status' => $item->status,
                    'nip' => $item->pegawai->nip,
                    'nama' => $item->pegawai->nama,
                    'jabatan' => optional($item->pegawai->jabatan)->jabatan ?? '',
                ];
            });

        if ($pegawai->isEmpty()) {
            $pegawai = Pegawai::with(['jabatan', 'akun'])
                ->whereHas('akun', function ($query) {
                    $query->where('role', '!=', 'ADMIN');
                })
                ->get()
                ->map(function ($item) {
                    return (object) [
                        'id' => $item->id,
                        'pegawai_id' => $item->id,
                        'nip' => $item->nip,
                        'nama' => $item->nama,
                        'jabatan' => optional($item->jabatan)->jabatan ?? '',
                    ];
                });
        }

        return view('pages.presensiForm', compact('year', 'month', 'day', 'dayName', 'pegawai', 'role'));
    }

    public function storeDataPresensi(Request $request, $year = null, $month = null, $day = null)
    {
        $dtStore = $this->getItemsWithPrefix($request->all(), 'status_');
        $getId = $this->removePrefix($dtStore, 'status_');
        // $extDt = [];
        $extDt = array_map(
            function ($item, $key) use ($year, $month, $day) {
                return [
                    'pegawai_id' => $key,
                    'tgl' => date_format(Carbon::parse($year . '-' . $month . '-' . $day), 'Y-m-d'),
                    'status' => $item,
                ];
            },
            $getId,
            array_keys($getId),
        );
        foreach ($extDt as $key => $value) {
            $presensi = Presensi::updateOrCreate(['pegawai_id' => $value['pegawai_id'], 'tgl' => $value['tgl']], ['status' => $value['status']]);
        }
        return redirect()->back()->with('success', 'Data Berhasil Di Simpan');
    }

    
}
