<?php

namespace App\Services;


use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Support\Facades\Route;

/**
 * Class AttendanceService
 * @package App\Services
 */
class AttendanceService
{
    /**
     * @return mixed
     */
    public function getAttendances()
    {
        return Presensi::select(['pegawai_id', 'tgl'])
            ->get()
            ->groupBy('pegawai_id')
            ->map(function ($items) {
                return $items->pluck('pegawai_id', 'tgl');
            });
    }

    /**
     * @param int $year
     * @param int $month
     * @param array $attendances
     */
    public function storeAttendances(int $year, int $month, array $attendances)
    {
        Presensi::query()
            ->whereYear('tgl', $year)
            ->whereMonth('tgl', $month)
            ->delete();

        foreach ($attendances as $key => $dates) {
            list(, $studentId) = explode('_', $key);
            $pegawai = Pegawai::find($studentId);

            $studentAttendances = [];
            foreach ($dates as $date) {
                $studentAttendances[] = new Presensi(['tgl' => $date]);
            }

            $pegawai->attendances()->saveMany($studentAttendances);
        }
    }

    /**
     * @param int $year
     * @param int $month
     * @return int
     */
    public function daysInMonth(int $year, int $month)
    {
        return now()->setYear($year)
            ->setMonth($month)
            ->daysInMonth;
    }

    /**
     * @param int $year
     * @param int $month
     * @return array
     */
    public function getAttendancePaginationLinks(int $year, int $month)
    {
        $currentDate       = now()->setYear($year)->setMonth($month)->toImmutable();
        $currentDateYear   = $currentDate->year;
        $currentDateMonth  = $currentDate->format('m');
        $previousDate      = $currentDate->subMonth();
        $previousDateYear  = $previousDate->year;
        $previousDateMonth = $previousDate->format('m');
        $nextDate          = $currentDate->addMonth();
        $nextDateYear      = $nextDate->year;
        $nextDateMonth     = $nextDate->format('m');

        $dates = [
            [
                'year'     => $previousDateYear,
                'month'    => $previousDateMonth,
                'fullName' => $this->getYearAndFullMonthName($previousDateYear, $previousDateMonth),
            ],
            [
                'year'     => $currentDateYear,
                'month'    => $currentDateMonth,
                'fullName' => $this->getYearAndFullMonthName($currentDateYear, $currentDateMonth)
            ],
        ];

        if ($year < now()->year | ($year == now()->year && $month < now()->month)) {
            $dates[] = [
                'year'     => $nextDateYear,
                'month'    => $nextDateMonth,
                'fullName' => $this->getYearAndFullMonthName($nextDateYear, $nextDateMonth)
            ];
        }

        return $dates;
    }

    /**
     * @param int $year
     * @param int $month
     * @return bool
     */
    public function isProvidedMonthGreaterThanCurrentMonth(int $year, int $month)
    {
        if ($year > now()->year) {
            return true;
        }

        if ($year == now()->year && $month > now()->month) {
            return true;
        }

        return false;
    }

    /**
     * @param int $year
     * @param int $month
     * @return string
     */
    public function getYearAndFullMonthName(int $year, int $month)
    {
        return now()->setYear($year)->setMonth($month)->format('F Y');
    }
}
