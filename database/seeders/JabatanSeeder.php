<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Jabatan::insert([
            ['jabatan' => 'FORMEN', 'gaji_harian' => 100000],
            ['jabatan' => 'FITTER', 'gaji_harian' => 80000],
            ['jabatan' => 'RIGGER', 'gaji_harian' => 70000],
            ['jabatan' => 'SCAFFOLDER', 'gaji_harian' => 75000],
            ['jabatan' => 'WELDER', 'gaji_harian' => 85000],
        ]);
    }
}
