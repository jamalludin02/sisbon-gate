<?php

namespace Database\Seeders;

use App\Models\PeriodePenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodePenilaiainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tahun' => 2023, 'bulan' => 6, 'terbit' => '2023-06-01', 'tutup' => '2023-06-30', 'status' => 'DITUTUP'],
            ['tahun' => 2023, 'bulan' => 12, 'terbit' => '2021-12-01', 'tutup' => '2021-12-31', 'status' => 'DITUTUP'],
            ['tahun' => 2023, 'bulan' => 6, 'terbit' => '2021-06-01', 'tutup' => '2021-06-30', 'status' => 'DIBUKA'],
        ];

        foreach ($data as $key => $value) {
            PeriodePenilaian::create($value);
        }
    }
}
