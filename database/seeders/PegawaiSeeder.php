<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sql=
        `
            INSERT INTO pegawai (id, nip, nama, tgl_lahir, pendidikan, gender, no_telp, alamat, jabatan_id, status, created_at, updated_at) VALUES
            (1, '001', 'CHARIS SAPUTRA', '1990-01-01', 'SMA', 'L', '081234567890', 'Surabaya', 1, 'aktif', NOW(), NOW()),
            (2, '002', 'AGUS SUNARNO', '1991-02-02', 'SMA', 'L', '081234567891', 'Sidoarjo', 1, 'aktif', NOW(), NOW()),
            (3, '003', 'MULIADI', '1992-03-03', 'SMA', 'L', '081234567892', 'Gresik', 1, 'aktif', NOW(), NOW()),
            (4, '004', 'ALI MACHMUDI', '1993-04-04', 'SMA', 'L', '081234567893', 'Surabaya', 1, 'aktif', NOW(), NOW()),
            (5, '005', 'SARJONO', '1994-05-05', 'SMA', 'L', '081234567894', 'Sidoarjo', 1, 'aktif', NOW(), NOW()),
            (6, '006', 'KHOIRUL FATIHIN', '1990-06-06', 'SMA', 'L', '081234567895', 'Gresik', 2, 'aktif', NOW(), NOW()),
            (7, '007', 'M. FACHRUDIN HARI WIJAYA', '1991-07-07', 'SMA', 'L', '081234567896', 'Surabaya', 2, 'aktif', NOW(), NOW()),
            (8, '008', 'SANDI GIOVANI SAPUTRA', '1992-08-08', 'SMA', 'L', '081234567897', 'Sidoarjo', 2, 'aktif', NOW(), NOW()),
            (9, '009', 'MUHYIDIN NASRULLAH', '1993-09-09', 'SMA', 'L', '081234567898', 'Gresik', 2, 'aktif', NOW(), NOW()),
            (10, '010', 'MOH. KHOIRUDIN', '1994-10-10', 'SMA', 'L', '081234567899', 'Surabaya', 2, 'aktif', NOW(), NOW()),
            (11, '011', 'IWAN KAMIL', '1990-11-11', 'SMA', 'L', '081234567800', 'Sidoarjo', 2, 'aktif', NOW(), NOW()),
            (12, '012', 'MISKANTO', '1991-12-12', 'SMA', 'L', '081234567801', 'Gresik', 2, 'aktif', NOW(), NOW()),
            (13, '013', 'ABANDI', '1992-01-13', 'SMA', 'L', '081234567802', 'Surabaya', 2, 'aktif', NOW(), NOW()),
            (14, '014', 'SAPARUDDIN', '1993-02-14', 'SMA', 'L', '081234567803', 'Sidoarjo', 2, 'aktif', NOW(), NOW()),
            (15, '015', 'AGUS FIRMANSYAH', '1994-03-15', 'SMA', 'L', '081234567804', 'Gresik', 2, 'aktif', NOW(), NOW()),
            (16, '016', 'SHOBIRIN', '1990-04-16', 'SMA', 'L', '081234567805', 'Surabaya', 2, 'aktif', NOW(), NOW()),
            (17, '017', 'NUR RIFKI AL ZAMZAMI', '1991-05-17', 'SMA', 'L', '081234567806', 'Sidoarjo', 2, 'aktif', NOW(), NOW()),
            (18, '018', 'KARTOPO', '1992-06-18', 'SMA', 'L', '081234567807', 'Gresik', 2, 'aktif', NOW(), NOW()),
            (19, '019', 'NOVA ANDREAN', '1993-07-19', 'SMA', 'L', '081234567808', 'Surabaya', 3, 'aktif', NOW(), NOW()),
            (20, '020', 'WAWAN SUWANDA', '1994-08-20', 'SMA', 'L', '081234567809', 'Sidoarjo', 3, 'aktif', NOW(), NOW()),
            (21, '021', 'ALI MA\'MUN', '1990-09-21', 'SMA', 'L', '081234567810', 'Gresik', 3, 'aktif', NOW(), NOW()),
            (22, '022', 'DIANTO', '1991-10-22', 'SMA', 'L', '081234567811', 'Surabaya', 3, 'aktif', NOW(), NOW()),
            (23, '023', 'AHMAD RICO SAIFUDIN', '1992-11-23', 'SMA', 'L', '081234567812', 'Sidoarjo', 3, 'aktif', NOW(), NOW()),
            (24, '024', 'RIZKI ANDREA SAPUTRA', '1993-12-24', 'SMA', 'L', '081234567813', 'Gresik', 3, 'aktif', NOW(), NOW()),
            (25, '025', 'EKO SUSANTO', '1994-01-25', 'SMA', 'L', '081234567814', 'Surabaya', 3, 'aktif', NOW(), NOW()),
            (26, '026', 'NURUL YAQIN', '1990-02-26', 'SMA', 'L', '081234567815', 'Sidoarjo', 3, 'aktif', NOW(), NOW()),
            (27, '027', 'MOH. ALI MUSTOFA', '1991-03-27', 'SMA', 'L', '081234567816', 'Gresik', 3, 'aktif', NOW(), NOW()),
            (28, '028', 'EKO HERU WICAKSONO', '1992-04-28', 'SMA', 'L', '081234567817', 'Surabaya', 3, 'aktif', NOW(), NOW()),
            (29, '029', 'BAGUS TRIYANTO', '1993-05-29', 'SMA', 'L', '081234567818', 'Sidoarjo', 3, 'aktif', NOW(), NOW()),
            (30, '030', 'SUGENG HARIYADI', '1994-06-30', 'SMA', 'L', '081234567819', 'Gresik', 3, 'aktif', NOW(), NOW()),
            (31, '031', 'ACHYAT SANTOSO', '1990-07-31', 'SMA', 'L', '081234567820', 'Surabaya', 3, 'aktif', NOW(), NOW()),
            (32, '032', 'MUHAMMAD RIZAL BAIDHOWI', '1991-08-01', 'SMA', 'L', '081234567821', 'Sidoarjo', 3, 'aktif', NOW(), NOW()),
            (33, '033', 'KHOLIK SANTOSO', '1992-09-02', 'SMA', 'L', '081234567822', 'Gresik', 4, 'aktif', NOW(), NOW()),
            (34, '034', 'WARSONO', '1993-10-03', 'SMA', 'L', '081234567823', 'Surabaya', 4, 'aktif', NOW(), NOW()),
            (35, '035', 'BAGAS DWI HANDIKA PUTRA', '1994-11-04', 'SMA', 'L', '081234567824', 'Sidoarjo', 4, 'aktif', NOW(), NOW()),
            (36, '036', 'MAHSUN NUR HIDAYAT', '1990-12-05', 'SMA', 'L', '081234567825', 'Gresik', 4, 'aktif', NOW(), NOW()),
            (37, '037', ''MOCH. FIKRI ANDRIANSYAH', '1991-01-06', 'SMA', 'L', '081234567826', 'Surabaya', 4, 'aktif', NOW(), NOW()),
        `;
        DB::statement($sql);
    }
}
