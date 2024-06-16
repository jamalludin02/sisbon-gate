<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodeIds = [1, 2];
        $kriteriaIds = range(1, 5);

        // Get all pegawai_id except 1
        $pegawaiIds = DB::table('pegawai')->where('id', '<>', 1)->pluck('id');

        $penilaianData = [];
        $batchSize = 1000;

        foreach ($pegawaiIds as $pegawaiId) {
            foreach ($periodeIds as $periodeId) {
                foreach ($kriteriaIds as $kriteriaId) {
                    $penilaianData[] = [
                        'pegawai_id' => $pegawaiId,
                        'periode_id' => $periodeId,
                        'kriteria_id' => $kriteriaId,
                        'nilai' => rand(1, 5),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    // Insert data in batches
                    if (count($penilaianData) >= $batchSize) {
                        DB::table('penilaian')->insert($penilaianData);
                        $penilaianData = []; // Reset the array
                        sleep(1); // Add a delay to avoid too many placeholders error
                    }
                }
            }
        }

        // Insert remaining data
        if (!empty($penilaianData)) {
            DB::table('penilaian')->insert($penilaianData);
        }
    }
}
