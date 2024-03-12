<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akun::create([
            'pegawai_id' => 1, // Ganti dengan id pegawai yang sesuai
            'username' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'ADMIN',
        ]);

        Akun::create([
            'pegawai_id' => 2, // Ganti dengan id pegawai yang sesuai
            'username' => 'Jane Doe',
            'email' => 'spv@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'SPV',
        ]);

        // Buat 3 akun lainnya
        for ($i = 0; $i < 3; $i++) {
            Akun::create([
                'pegawai_id' => $i + 3, // Ganti dengan id pegawai yang sesuai
                'username' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
            ]);
        }
    }
}
