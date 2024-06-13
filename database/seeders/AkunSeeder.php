<?php

namespace Database\Seeders;

use App\Models\Akun;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'id' => 1,
                'pegawai_id' => 1,
                'username' => 'CHARIS SAPUTRA',
                'email' => 'charis.saputra@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'pegawai_id' => 2,
                'username' => 'AGUS SUNARNO',
                'email' => 'agus.sunarno@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'pegawai_id' => 3,
                'username' => 'MULIADI',
                'email' => 'muliadi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'pegawai_id' => 4,
                'username' => 'ALI MACHMUDI',
                'email' => 'ali.machmudi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'pegawai_id' => 5,
                'username' => 'SARJONO',
                'email' => 'sarjono@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'pegawai_id' => 6,
                'username' => 'KHOIRUL FATIHIN',
                'email' => 'khoirul.fatihin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'pegawai_id' => 7,
                'username' => 'M. FACHRUDIN HARI WIJAYA',
                'email' => 'm.fachrudin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'pegawai_id' => 8,
                'username' => 'SANDI GIOVANI SAPUTRA',
                'email' => 'sandi.giovani@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'pegawai_id' => 9,
                'username' => 'MUHYIDIN NASRULLAH',
                'email' => 'muhyidin.nasrullah@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'pegawai_id' => 10,
                'username' => 'MOH. KHOIRUDIN',
                'email' => 'moh.khoirudin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'pegawai_id' => 11,
                'username' => 'IWAN KAMIL',
                'email' => 'iwan.kamil@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'pegawai_id' => 12,
                'username' => 'MISKANTO',
                'email' => 'miskanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'pegawai_id' => 13,
                'username' => 'ABANDI',
                'email' => 'abandi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'pegawai_id' => 14,
                'username' => 'SAPARUDDIN',
                'email' => 'saparuddin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'pegawai_id' => 15,
                'username' => 'AGUS FIRMANSYAH',
                'email' => 'agus.firmansyah@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'pegawai_id' => 16,
                'username' => 'SHOBIRIN',
                'email' => 'shobirin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'pegawai_id' => 17,
                'username' => 'NUR RIFKI AL ZAMZAMI',
                'email' => 'nur.rifki@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'pegawai_id' => 18,
                'username' => 'KARTOPO',
                'email' => 'kartopo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'pegawai_id' => 19,
                'username' => 'NOVA ANDREAN',
                'email' => 'nova.andrean@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'pegawai_id' => 20,
                'username' => 'WAWAN SUWANDA',
                'email' => 'wawan.suwanda@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 21,
                'pegawai_id' => 21,
                'username' => 'ALI MA\'MUN',
                'email' => 'ali.mamun@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 22,
                'pegawai_id' => 22,
                'username' => 'DIANTO',
                'email' => 'dianto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 23,
                'pegawai_id' => 23,
                'username' => 'AHMAD RICO SAIFUDIN',
                'email' => 'ahmad.rico@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 24,
                'pegawai_id' => 24,
                'username' => 'RIZKI ANDREA SAPUTRA',
                'email' => 'rizki.andrea@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 25,
                'pegawai_id' => 25,
                'username' => 'EKO SUSANTO',
                'email' => 'eko.susanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 26,
                'pegawai_id' => 26,
                'username' => 'NURUL YAQIN',
                'email' => 'nurul.yaqin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 27,
                'pegawai_id' => 27,
                'username' => 'MOH. ALI MUSTOFA',
                'email' => 'moh.ali@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 28,
                'pegawai_id' => 28,
                'username' => 'EKO HERU WICAKSONO',
                'email' => 'eko.heru@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 29,
                'pegawai_id' => 29,
                'username' => 'BAGUS TRIYANTO',
                'email' => 'bagus.triyanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 30,
                'pegawai_id' => 30,
                'username' => 'SUGENG HARIYADI',
                'email' => 'sugeng.hariyadi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 31,
                'pegawai_id' => 31,
                'username' => 'ACHYAT SANTOSO',
                'email' => 'achyat.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 32,
                'pegawai_id' => 32,
                'username' => 'MUHAMMAD RIZAL BAIDHOWI',
                'email' => 'muhammad.rizal@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 33,
                'pegawai_id' => 33,
                'username' => 'KHOLIK SANTOSO',
                'email' => 'kholik.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 34,
                'pegawai_id' => 34,
                'username' => 'WARSONO',
                'email' => 'warsono@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 35,
                'pegawai_id' => 35,
                'username' => 'BAGAS DWI HANDIKA PUTRA',
                'email' => 'bagas.dwi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 36,
                'pegawai_id' => 36,
                'username' => 'MAHSUN NUR HIDAYAT',
                'email' => 'mahsun.nur@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 37,
                'pegawai_id' => 37,
                'username' => 'MOCH. FIKRI ANDRIANSYAH',
                'email' => 'moch.fikri@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
