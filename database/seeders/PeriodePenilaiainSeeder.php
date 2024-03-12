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
            ['tahun' => 2020, 'bulan' => 1, 'terbit' => '2020-01-01', 'tutup' => '2020-01-15', 'status' => 'DIBUKA'],
            ['tahun' => 2021, 'bulan' => 2, 'terbit' => '2021-02-05', 'tutup' => '2021-02-20', 'status' => 'DITUTUP'],
            // Tambahkan data lainnya sesuai kebutuhan
            ['tahun' => 2022, 'bulan' => 3, 'terbit' => '2022-03-10', 'tutup' => '2022-03-25', 'status' => 'DIBUKA'],
            ['tahun' => 2022, 'bulan' => 4, 'terbit' => '2022-04-15', 'tutup' => '2022-04-30', 'status' => 'DITUTUP'],
        ];

        foreach ($data as $key => $value) {
            PeriodePenilaian::create($value);
        }
    }
}
