<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([JabatanSeeder::class]);
        sleep(1);
        $this->call([PegawaiSeeder::class]);
        sleep(1);
        $this->call([AkunSeeder::class]);
        sleep(1);
        $this->call([PeriodePenilaiainSeeder::class]);
        sleep(1);
        $this->call([KriteriaPenilaian::class]);
        sleep(1);
        $this->call([PresensiSeeder::class]);
        sleep(1);

    }
}
