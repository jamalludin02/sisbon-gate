<?php

namespace App\Http\Controllers;

use App\Models\KriteriaPenilaian;
use App\Models\Pegawai;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class ctrlPenilaian extends Controller
{
    // public function AdminShow()
    // {
    //     return view('pages.admin.penilaian');
    // }

    public function spvGetPeriodActive()
    {
        $data = PeriodePenilaian::where('status', 'DIBUKA')->first();
        return view('pages.supervisor.penilaianPeriode', isset($data) ? compact('data') : []);
    }
    public function spvPegawaiList($id)
    {
        $periode = PeriodePenilaian::find($id);
        $pegawai = Pegawai::with('jabatan')->get();
        // dd($pegawai);
        return view('pages.supervisor.penilaianPegawai', compact('pegawai', 'periode'));
    }
    public function formPenilaian($periode_id, $pegawai_id)
    {
        $kriteria = KriteriaPenilaian::all();
        $periode = PeriodePenilaian::find($periode_id);
        $pegawai = Pegawai::with('jabatan')->find($pegawai_id);
        // dd($pegawai);
        return view('pages.supervisor.formPenilaian', compact('kriteria', 'periode', 'pegawai'));
    }
}
