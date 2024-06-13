<?php

namespace Database\Seeders;

use App\Models\KriteriaPenilaian as ModelsKriteriaPenilaian;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaPenilaian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     ['kriteria' => 'Kriteria A', 'deskripsi' => 'Deskripsi Kriteria A', 'bobot' => 3, 'tipe' => 'BENEFIT'], 
        //     ['kriteria' => 'Kriteria B', 'deskripsi' => 'Deskripsi kriteria penilaian B', 'bobot' => 5, 'tipe' => 'BENEFIT'], 
        //     ['kriteria' => 'Kriteria C', 'deskripsi' => 'Deskripsi kriteria penilaian C', 'bobot' => 4, 'tipe' => 'BENEFIT'], 
        //     ['kriteria' => 'Kriteria D', 'deskripsi' => 'Deskripsi kriteria penilaian D', 'bobot' => 4, 'tipe' => 'BENEFIT'], 
        //     ['kriteria' => 'Kriteria E', 'deskripsi' => 'Deskripsi kriteria penilaian E', 'bobot' => 3, 'tipe' => 'COST'],];
        // foreach ($data as $key => $value) {
        //     ModelsKriteriaPenilaian::create($value);
        // }
        DB::table('kriteria')->insert([
            [
                'kriteria' => 'Kerjasama tim',
                'deskripsi' => 'Kemampuan bekerja sama dalam tim',
                'bobot' => 3,
                'tipe' => 'BENEFIT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria' => 'Presensi',
                'deskripsi' => 'Kehadiran dan ketepatan waktu',
                'bobot' => 5,
                'tipe' => 'BENEFIT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria' => 'Kedisiplinan',
                'deskripsi' => 'Tingkat kedisiplinan dalam pekerjaan',
                'bobot' => 4,
                'tipe' => 'COST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria' => 'Target',
                'deskripsi' => 'Kemampuan mencapai target yang ditetapkan',
                'bobot' => 4,
                'tipe' => 'BENEFIT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kriteria' => 'Komunikasi',
                'deskripsi' => 'Kemampuan berkomunikasi dengan baik',
                'bobot' => 3,
                'tipe' => 'BENEFIT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);


    }
}
