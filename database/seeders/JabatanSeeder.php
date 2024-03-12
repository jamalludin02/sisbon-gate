<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'jabatan' => 'Manager',
            'gaji_harian' => 10000000, // Isi dengan gaji pokok yang sesuai
        ]);

        Jabatan::create([
            'jabatan' => 'Supervisor',
            'gaji_harian' => 8000000, // Isi dengan gaji pokok yang sesuai
        ]);

        Jabatan::create([
            'jabatan' => 'Staff',
            'gaji_harian' => 6000000, // Isi dengan gaji pokok yang sesuai
        ]);

        Jabatan::create([
            'jabatan' => 'Assistant',
            'gaji_harian' => 5000000, // Isi dengan gaji pokok yang sesuai
        ]);

        Jabatan::create([
            'jabatan' => 'Trainee',
            'gaji_harian' => 3000000, // Isi dengan gaji pokok yang sesuai
        ]);
    }
}
