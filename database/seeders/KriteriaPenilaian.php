<?php

namespace Database\Seeders;

use App\Models\KriteriaPenilaian as ModelsKriteriaPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaPenilaian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kriteria' => 'Kriteria A', 'deskripsi' => 'Deskripsi Kriteria A', 'bobot' => 3, 'tipe' => 'BENEFIT'], 
            ['kriteria' => 'Kriteria B', 'deskripsi' => 'Deskripsi kriteria penilaian B', 'bobot' => 5, 'tipe' => 'BENEFIT'], 
            ['kriteria' => 'Kriteria C', 'deskripsi' => 'Deskripsi kriteria penilaian C', 'bobot' => 4, 'tipe' => 'BENEFIT'], 
            ['kriteria' => 'Kriteria D', 'deskripsi' => 'Deskripsi kriteria penilaian D', 'bobot' => 4, 'tipe' => 'BENEFIT'], 
            ['kriteria' => 'Kriteria E', 'deskripsi' => 'Deskripsi kriteria penilaian E', 'bobot' => 3, 'tipe' => 'COST'],];
        foreach ($data as $key => $value) {
            ModelsKriteriaPenilaian::create($value);
        }
    }
}
