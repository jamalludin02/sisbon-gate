<?php

namespace App\Http\Controllers;

use App\DataTables\PeriodePenilaianDataTable;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ctrlPeriodePenilaian extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminShow(PeriodePenilaianDataTable $dataTable)
    {
        $data = PeriodePenilaian::all();
        return $dataTable->render('pages.admin.periode', compact('data'));
    }

    public function AdminEdit($id)
    {
        $data = PeriodePenilaian::findOrFail($id);
        return view('pages.admin.periodeEdit', compact('data', 'id'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        try {
            if ($request->status == 'DIBUKA') {
                $countPeriode = PeriodePenilaian::where('status', 'DIBUKA')->where('id', '!=', $id)->count();
                // dd($countPeriode);
                if ($countPeriode != 0) {
                    return redirect()->back()->with('error', 'Periode penilaian masih ada yang aktif');
                }
            }
            $data = PeriodePenilaian::find($id)->update([
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'terbit' => $request->terbit,
                'tutup' => $request->tutup,
                'status' => $request->status,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // dd($e);
        }
        return redirect()->route('admin.periode-penilaian')->with('success', 'Data Berhasil Di Update');
    }

    public function AdminCreated(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'tahun' => 'required',
                'bulan' => 'required',
                'terbit' => 'required',
                'tutup' => 'required',
                'status' => 'required',
            ],
            [
                'required' => 'Data :attribute tidak boleh kosong.',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = PeriodePenilaian::create([
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'terbit' => $request->terbit,
                'tutup' => $request->tutup,
                'status' => $request->status,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.periode-penilaian')->with('success', 'Data Berhasil Di Tambah');
    }

    public function AdminDelete($id)
    {
        PeriodePenilaian::find($id)->delete();
        // dd($data);
        return redirect()->route('admin.periode-penilaian')->with('success', 'Data Berhasil Di Hapus');
    }
}
