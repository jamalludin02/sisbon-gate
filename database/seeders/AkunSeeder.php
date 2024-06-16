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

        DB::table('akun')->insert([
            [
                'pegawai_id' => 1,
                'username' => 'ADMIN SISBON GATE',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'ADMIN',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 1+1,
                'username' => 'CHARIS SAPUTRA',
                'email' => 'charis.saputra@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 2+1,
                'username' => 'AGUS SUNARNO',
                'email' => 'agus.sunarno@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 3+1,
                'username' => 'MULIADI',
                'email' => 'muliadi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 4+1,
                'username' => 'ALI MACHMUDI',
                'email' => 'ali.machmudi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 5+1,
                'username' => 'SARJONO',
                'email' => 'sarjono@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPV',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 6+1,
                'username' => 'KHOIRUL FATIHIN',
                'email' => 'khoirul.fatihin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 7+1,
                'username' => 'M. FACHRUDIN HARI WIJAYA',
                'email' => 'm.fachrudin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 8+1,
                'username' => 'SANDI GIOVANI SAPUTRA',
                'email' => 'sandi.giovani@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 9+1,
                'username' => 'MUHYIDIN NASRULLAH',
                'email' => 'muhyidin.nasrullah@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 10+1,
                'username' => 'MOH. KHOIRUDIN',
                'email' => 'moh.khoirudin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 11+1,
                'username' => 'IWAN KAMIL',
                'email' => 'iwan.kamil@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 12+1,
                'username' => 'MISKANTO',
                'email' => 'miskanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 13+1,
                'username' => 'ABANDI',
                'email' => 'abandi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 14+1,
                'username' => 'SAPARUDDIN',
                'email' => 'saparuddin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 15+1,
                'username' => 'AGUS FIRMANSYAH',
                'email' => 'agus.firmansyah@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 16+1,
                'username' => 'SHOBIRIN',
                'email' => 'shobirin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 17+1,
                'username' => 'NUR RIFKI AL ZAMZAMI',
                'email' => 'nur.rifki@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 18+1,
                'username' => 'KARTOPO',
                'email' => 'kartopo@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 19+1,
                'username' => 'NOVA ANDREAN',
                'email' => 'nova.andrean@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 20+1,
                'username' => 'WAWAN SUWANDA',
                'email' => 'wawan.suwanda@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 21+1,
                'username' => 'ALI MA\'MUN',
                'email' => 'ali.mamun@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 22+1,
                'username' => 'DIANTO',
                'email' => 'dianto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 23+1,
                'username' => 'AHMAD RICO SAIFUDIN',
                'email' => 'ahmad.rico@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 24+1,
                'username' => 'RIZKI ANDREA SAPUTRA',
                'email' => 'rizki.andrea@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 25+1,
                'username' => 'EKO SUSANTO',
                'email' => 'eko.susanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 26+1,
                'username' => 'NURUL YAQIN',
                'email' => 'nurul.yaqin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 27+1,
                'username' => 'MOH. ALI MUSTOFA',
                'email' => 'moh.ali@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 28+1,
                'username' => 'EKO HERU WICAKSONO',
                'email' => 'eko.heru@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 29+1,
                'username' => 'BAGUS TRIYANTO',
                'email' => 'bagus.triyanto@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 30+1,
                'username' => 'SUGENG HARIYADI',
                'email' => 'sugeng.hariyadi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 31+1,
                'username' => 'ACHYAT SANTOSO',
                'email' => 'achyat.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 32+1,
                'username' => 'MUHAMMAD RIZAL BAIDHOWI',
                'email' => 'muhammad.rizal@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 33+1,
                'username' => 'KHOLIK SANTOSO',
                'email' => 'kholik.santoso@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 34+1,
                'username' => 'WARSONO',
                'email' => 'warsono@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 35+1,
                'username' => 'BAGAS DWI HANDIKA PUTRA',
                'email' => 'bagas.dwi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 36+1,
                'username' => 'MAHSUN NUR HIDAYAT',
                'email' => 'mahsun.nur@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'GUEST',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'pegawai_id' => 37+1,
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
