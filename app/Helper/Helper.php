<?php

namespace App\Helper;
/**
 * Class AttendanceService
 * @package App\Helper
 */
trait Helper
{
    function removePrefix(array $input, string $prefix): array
    {
        $result = [];

        foreach ($input as $key => $value) {
            if (strpos($key, $prefix) === 0) {
                $newKey = substr($key, strlen($prefix));
                $result[$newKey] = $value;
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
    function getItemsWithPrefix(array $input, string $prefix): array
    {
        $result = [];
        foreach ($input as $key => $value) {
            if (strpos($key, $prefix) === 0) {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    function getIndonesianDayName($year, $month, $day)
    {
        $dayNumber = date('w', strtotime("$year-$month-$day"));
        $englishDayName = date('D', strtotime("Sunday +{$dayNumber} days"));

        // Membuat peta konversi nama hari
        $dayNameMapping = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        ];

        // Konversi nama hari ke dalam bahasa Indonesia
        return $dayNameMapping[$englishDayName];
    }
}
