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
        DB::table('pegawai')->insert(
            [
                [
                    "nip" => "000",
                    "nama" => "ADMIN SISBON GATE",
                    "alamat" => "Surabaya, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("04/01/1990")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "001",
                    "nama" => "CHARIS SAPUTRA",
                    "alamat" => "Petisbenem Rt 01/Rw 01, Desa Petisbenem, Kec. Duduksampeyan, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("04/01/1985")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "002",
                    "nama" => "AGUS SUNARNO",
                    "alamat" => "DSN Nggirsapi Rt 01/Rw 02, Desa Sugihwaras, Kec. Jenu, Tuban, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("25/02/1996")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "003",
                    "nama" => "MULIADI",
                    "alamat" => "Tesan Rt 13/ Rw 06, Desa Tritunggal, Kec. Babat, Lamongan, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("18/11/2002")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "004",
                    "nama" => "ALI MACHMUDI",
                    "alamat" => "Jrebeng Rt 01/Rw 02, Desa Jrebeng, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("22/09/1998")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "005",
                    "nama" => "SARJONO",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("27/08/2001")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "1"
                ],
                [
                    "nip" => "006",
                    "nama" => "KHOIRUL FATIHIN",
                    "alamat" => "Baron Rt 07/Rw 04, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("22/01/1977")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "007",
                    "nama" => "M. FACHRUDIN HARI WIJAYA",
                    "alamat" => "Manyarsidorukun Rt 12/Rw 03, Desa Manyarsidorukun, Kec. Manyar, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("11/05/1974")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "008",
                    "nama" => "SANDI GIOVANI SAPUTRA",
                    "alamat" => "Padang Bandung Rt 12/Rw 03, Desa Padang Bandung, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("02/03/1990")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "009",
                    "nama" => "MUHYIDIN NASRULLAH",
                    "alamat" => "Dusun Brak Rt 02/Rw09, Desa Wadeng, Kec. Sidayu, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("05/04/1972")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "010",
                    "nama" => "MOH. KHOIRUDIN",
                    "alamat" => "Dusun Kedungrejo Rt 37/Rw 08, Desa Ngumpakdalem, Kec. Dander, Bojonegoro, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("19/05/2000")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "011",
                    "nama" => "IWAN KAMIL ",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("23/06/1979")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "012",
                    "nama" => "MISKANTO ",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("30/06/1971")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "013",
                    "nama" => "ABANDI",
                    "alamat" => "Dusun Gunung Remuk Rt 01/Rw 05, Desa Ketapang, Kec. Kalipuro, Banyuwangi, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("03/07/1969")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "014",
                    "nama" => "SAPARUDDIN",
                    "alamat" => "Jl Made Kidul III/42 Rt 01/Rw 09, Desa Made, Kec. Lamongan, Lamongan, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("13/04/1996")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "015",
                    "nama" => "AGUS FIRMANSYAH",
                    "alamat" => "Desa Rendeng Rt 05/Rw 03, Kec. Malo, Tuban, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("09/12/1986")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "016",
                    "nama" => "SHOBIRIN",
                    "alamat" => "Dusun Kedungrejo Rt 32/Rw 07, Desa Ngumpakdalem, Kec. Dander, Bojonegoro, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("19/05/1988")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "017",
                    "nama" => "NUR RIFKI AL ZAMZAMI",
                    "alamat" => "Dusun Suwareh Rt 01/Rw 03, Desa Brabowan, Kec. Sambong, Blora, Jawa Tengah",
                    "tgl_lahir" => date('Y-m-d', strtotime("07/12/1998")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "018",
                    "nama" => "KARTOPO",
                    "alamat" => "Mulung Rt 02/Rw 01, Desa Karangtinggil, Kec. Pucuk, Lamongan, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("05/03/1978")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "2"
                ],
                [
                    "nip" => "019",
                    "nama" => "NOVA ANDREAN",
                    "alamat" => "Desa Nglanjuk Rt 02/Rw 02, Kec. Cepu, Blora, Jawa Tengah",
                    "tgl_lahir" => date('Y-m-d', strtotime("07/05/1987")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "020",
                    "nama" => "WAWAN SUWANDA",
                    "alamat" => "Pedongkelan Rt 01/Rw 14, Desa Cengkareng Timur, Kec. Cengkareng, Tanggerang, DKI Jakarta",
                    "tgl_lahir" => date('Y-m-d', strtotime("12/11/1998")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "021",
                    "nama" => "ALI MA'MUN",
                    "alamat" => "Sedopok Rt 07/Rw 02, Desa Ngeper, Kec. Padangan, Bojonegoro, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("27/07/1987")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "022",
                    "nama" => "DIANTO",
                    "alamat" => "Kupang Panjaan 4/42 Rt 05/Rw 04, Dr. Sutomo, Kec. Tegalsari, Surabaya, Jawa timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("27/06/1988")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "023",
                    "nama" => "AHMAD RICO SAIFUDIN",
                    "alamat" => "Baron Rt 06/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("01/01/1975")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "024",
                    "nama" => "RIZKI ANDREA SAPUTRA",
                    "alamat" => "Ngampel Rt 08/Rw 03, Desa Ngampel, Kec. Manyar, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("23/12/1987")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "025",
                    "nama" => "EKO SUSANTO",
                    "alamat" => "DSN Nggirsapi Rt 01/Rw 02, Desa Sugihwaras, Kec. Jenu, Tuban, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("24/11/1999")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "026",
                    "nama" => "NURUL YAQIN",
                    "alamat" => "Tesan Rt 13/ Rw 06, Desa Tritunggal, Kec. Babat, Lamongan, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("21/04/1989")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "027",
                    "nama" => "MOH. ALI MUSTOFA",
                    "alamat" => "Jrebeng Rt 01/Rw 02, Desa Jrebeng, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("26/12/1989")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "028",
                    "nama" => "EKO HERU WICAKSONO",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("27/11/1988")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "029",
                    "nama" => "BAGUS TRIYANTO",
                    "alamat" => "Baron Rt 07/Rw 04, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("18/11/1983")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "030",
                    "nama" => "SUGENG HARIYADI",
                    "alamat" => "Manyarsidorukun Rt 12/Rw 03, Desa Manyarsidorukun, Kec. Manyar, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("29/07/1983")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "031",
                    "nama" => "ACHYAT SANTOSO",
                    "alamat" => "Padang Bandung Rt 12/Rw 03, Desa Padang Bandung, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("15/01/1988")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "032",
                    "nama" => "MUHAMMAD RIZAL BAIDHOWI",
                    "alamat" => "Dusun Brak Rt 02/Rw09, Desa Wadeng, Kec. Sidayu, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("01/12/1985")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "3"
                ],
                [
                    "nip" => "033",
                    "nama" => "KHOLIK SANTOSO",
                    "alamat" => "Dusun Kedungrejo Rt 37/Rw 08, Desa Ngumpakdalem, Kec. Dander, Bojonegoro, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("02/12/1989")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "4"
                ],
                [
                    "nip" => "034",
                    "nama" => "WARSONO",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("03/04/1983")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "4"
                ],
                [
                    "nip" => "035",
                    "nama" => "BAGAS DWI HANDIKA PUTRA",
                    "alamat" => "Baron Rt 07/Rw 03, Desa Baron, Kec. Dukun, Gresik, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("04/12/1985")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "4"
                ],
                [
                    "nip" => "036",
                    "nama" => "MAHSUN NUR HIDAYAT",
                    "alamat" => "Dusun Gunung Remuk Rt 01/Rw 05, Desa Ketapang, Kec. Kalipuro, Banyuwangi, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("05/12/1986")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "5"
                ],
                [
                    "nip" => "037",
                    "nama" => "MOCH. FIKRI ANDRIANSYAH",
                    "alamat" => "Jl Made Kidul III/42 Rt 01/Rw 09, Desa Made, Kec. Lamongan, Lamongan, Jawa Timur",
                    "tgl_lahir" => date('Y-m-d', strtotime("06/12/1980")),
                    "pendidikan" => "SMA/SMK",
                    "no_telp" => "Null",
                    "jabatan_id" => "5"
                ]
            ]
        );
    }
}
