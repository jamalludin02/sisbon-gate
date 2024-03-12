<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat data pegawai secara manual
        Pegawai::create([
            'nip' => '12345',
            'nama' => 'John Doe',
            'tgl_lahir' => '1990-05-15',
            'pendidikan' => 'S1',
            'gender' => 'L',
            'no_telp' => '08123456789',
            'alamat' => 'Jl. Contoh No. 123',
            'jabatan_id' => 1, // Ganti dengan id jabatan yang sesuai
            'status' => true,
        ]);

        Pegawai::create([
            'nip' => '67890',
            'nama' => 'Jane Doe',
            'tgl_lahir' => '1995-10-20',
            'pendidikan' => 'S2',
            'gender' => 'P',
            'no_telp' => '087654321',
            'alamat' => 'Jl. Contoh No. 456',
            'jabatan_id' => 2, // Ganti dengan id jabatan yang sesuai
            'status' => true,
        ]);

        // Buat 3 pegawai lainnya
        for ($i = 0; $i < 3; $i++) {
            Pegawai::create([
                'nip' => '1000' . ($i + 1),
                'nama' => 'Pegawai ' . ($i + 1),
                'tgl_lahir' => '1990-01-0' . ($i + 1),
                'pendidikan' => 'S1',
                'gender' => 'L',
                'no_telp' => '0812345678' . ($i + 1),
                'alamat' => 'Jl. Contoh No. ' . ($i + 100),
                'jabatan_id' => $i + 3, // Ganti dengan id jabatan yang sesuai
                'status' => true,
            ]);
        }
    }
}
