<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listHadir = array(
            'HADIR' => 60,  // Peluang HADIR lebih besar
            'ALPA' => 10,
            'SAKIT' => 10,
            'IZIN' => 10,
            'CUTI' => 5,
            'LIBUR' => 5
        );

        $totalWeight = array_sum($listHadir);
        $startDate = Carbon::create(2023, 1, 1);
        $endDate = Carbon::create(2024, 5, 31);

        $dates = [];

        while ($startDate->lte($endDate)) {
            $dates[] = $startDate->copy();
            $startDate->addDay();
        }

        $pegawaiIds = DB::table('pegawai')->pluck('id'); // Mendapatkan semua pegawai_id dari tabel pegawai
        $batchSize = 1000; // Ukuran batch untuk setiap insert
        $presensiData = [];

        foreach ($pegawaiIds as $pegawaiId) {
            foreach ($dates as $date) {
                $randomValue = rand(1, $totalWeight);
                $cumulativeWeight = 0;

                foreach ($listHadir as $status => $weight) {
                    $cumulativeWeight += $weight;
                    if ($randomValue <= $cumulativeWeight) {
                        $presensiData[] = [
                            'pegawai_id' => $pegawaiId,
                            'tgl' => $date->toDateString(),
                            'status' => $status,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        break;
                    }
                }

                // Insert data in batches
                if (count($presensiData) >= $batchSize) {
                    DB::table('presensi')->insert($presensiData);
                    $presensiData = []; // Reset the array
                    sleep(1); // Add a delay to avoid too many placeholders error
                }
            }
        }

        // Insert remaining data
        if (!empty($presensiData)) {
            DB::table('presensi')->insert($presensiData);
        }
    }
}
