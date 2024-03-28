<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Services\AttendanceService;
use Carbon\Carbon;
use stdClass;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;

class ctrlPresensi extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dataAbsensi(AttendanceService $attendanceService, Request $request)
    {
        $role = Auth::user()->role;
        $selectedYear = $request->year ?? now()->year;
        $selectedMonth = $request->month ?? now()->format('m');
        $daysInMonth = $attendanceService->daysInMonth($selectedYear, $selectedMonth);
        $firstYearList = $selectedYear - 5;
        $arrDay = [];
        for ($i = 0; $i < $daysInMonth; $i++) {
            $tglPad = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
            array_push(
                $arrDay,
                (object) [
                    'hari' => $this->getIndonesianDayName($selectedYear, $selectedMonth, $tglPad),
                    'tgl' => $selectedYear . '-' . $selectedMonth . '-' . $tglPad,
                    'status' => now()->hour >= 7 && now()->isToday() && now()->format('Y-m-d') == date('Y-m-d', strtotime($selectedYear . '-' . $selectedMonth . '-' . $tglPad)) ? 'enable' : 'disable',
                    // 'status' => now()->hour >= 7 && now()->hour < 17 && now()->isToday() && now()->format('Y-m-d') == date('Y-m-d', strtotime($selectedYear . '-' . $selectedMonth . '-' . ($i + 1))) ? 'enable' : 'disable',
                ],
            );
        }
        return view('pages.absensi', compact('arrDay', 'selectedYear', 'selectedMonth', 'firstYearList', 'role'));
    }

    public function showDataAbsensi($year = null, $month = null, $day = null, $dayName = null)
    {
        $role = Auth::user()->role;
        $pegawai = Presensi::with(['pegawai', 'pegawai.jabatan'])
            ->where('tgl', 'like', $year . '-' . $month . '-' . $day . '%')
            ->orderBy('pegawai_id', 'asc')
            ->get();
        $pegawai = array_combine(array_column($pegawai->toArray(), 'id'), $pegawai->toArray());
        $pegawai = array_map(function ($item) {
            $dtObj = new stdClass();
            $dtObj->id = $item['id'];
            $dtObj->pegawai_id = $item['pegawai_id'];
            $dtObj->tgl = $item['tgl'];
            $dtObj->status = $item['status'];
            $dtObj->nip = $item['pegawai']['nip'];
            $dtObj->nama = $item['pegawai']['nama'];
            if ($item['pegawai']['jabatan']) {
                $dtObj->jabatan = $item['pegawai']['jabatan']['jabatan'];
            } else {
                $dtObj->jabatan = '';
            }
            return $dtObj;
        }, $pegawai);

        if (!$pegawai) {
            $pegawai = Pegawai::with(['jabatan', 'akun'])
                ->whereHas('akun', function ($query) {
                    $query->where('role', '!=', 'ADMIN');
                })
                ->get();
            $pegawai = array_map(function ($item) {
                $dtObj = new stdClass();
                $dtObj->id = $item['id'];
                $dtObj->pegawai_id = $item['id'];
                $dtObj->nip = $item['nip'];
                $dtObj->nama = $item['nama'];
                if ($item['jabatan']) {
                    $dtObj->jabatan = $item['jabatan']['jabatan'];
                } else {
                    $dtObj->jabatan = '';
                }
                return $dtObj;
            }, $pegawai->toArray());
        }
        // dd($pegawai);
        return view('pages.formAbsensi', compact('year', 'month', 'day', 'dayName', 'pegawai', 'role'));
    }

    public function storeDataAbsensi(Request $request, $year = null, $month = null, $day = null)
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
            $presensi = Presensi::where('pegawai_id', $value['pegawai_id'])
                ->where('tgl', $value['tgl'])
                ->first();
            if ($presensi) {
                $presensi->update([
                    'status' => $value['status'],
                ]);
            } else {
                Presensi::create($value);
            }
        }
        return redirect()->back()->with('success', 'Data Berhasil Di Simpan');
    }
}
