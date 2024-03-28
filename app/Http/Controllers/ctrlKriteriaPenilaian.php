<?php

namespace App\Http\Controllers;

use App\DataTables\KriteriaPenilaianDataTable;
use App\Models\KriteriaPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ctrlKriteriaPenilaian extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminShow(KriteriaPenilaianDataTable $dataTable)
    {
        $data = KriteriaPenilaian::all();
        return $dataTable->render('pages.admin.kriteria', compact('data'));
    }

    public function AdminEdit($id)
    {
        $data = KriteriaPenilaian::findOrFail($id);
        return view('pages.admin.kriteriaEdit', compact('data', 'id'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        try {
            $data = KriteriaPenilaian::find($id)->update([
                'kriteria' => $request->kriteria,
                'deskripsi' => $request->deskripsi,
                'bobot' => $request->bobot,
                'tipe' => $request->tipe,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // dd($e);
        }
        return redirect()->route('admin.kriteria-penilaian')->with('success', 'Data Berhasil Di Update');
    }

    public function AdminCreated(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'kriteria' => 'required',
                'deskripsi' => 'required',
                'bobot' => 'required',
                'tipe' => 'required',
            ],
            [
                'required' => 'Data :attribute tidak boleh kosong.',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = KriteriaPenilaian::create([
                'kriteria' => $request->kriteria,
                'deskripsi' => $request->deskripsi,
                'bobot' => $request->bobot,
                'tipe' => $request->tipe,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.kriteria-penilaian')->with('success', 'Data Berhasil Di Tambah');
    }

    public function AdminDelete($id)
    {
        KriteriaPenilaian::find($id)->delete();
        // dd($data);
        return redirect()->route('admin.kriteria-penilaian')->with('success', 'Data Berhasil Di Hapus');
    }
}
