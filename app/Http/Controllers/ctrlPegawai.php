<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaiDataTable;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ctrlPegawai extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AdminShow(PegawaiDataTable $dataTable)
    {
        $data = Pegawai::with('jabatan')->get();
            return $dataTable->render('pages.admin.pegawai', compact('data'));
    }

    public function AdminEdit($id)
    {
        $data = Pegawai::findOrFail($id);
        $jabatan = Jabatan::all();
        // dd($data, $jabatan);
        return view('pages.admin.pegawaiEdit', compact('data', 'id', 'jabatan'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $data = Pegawai::find($id)->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tgl_lahir' => $request->tgl_lahir,
                'pendidikan' => $request->pendidikan,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'jabatan_id' => $request->jabatan_id,
                'no_telp' => $request->no_telp,
                'status' => $request->status,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // dd($e);
        }
        return redirect()->route('admin.pegawai')->with('success', 'Data Berhasil Di Update');
    }

    public function AdminCreated(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'nip' => 'required',
                'tgl_lahir' => 'required|date',
                'pendidikan' => 'required',
                'gender' => 'required',
                'alamat' => 'required',
                'jabatan_id' => 'required',
                'no_telp' => 'required',
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
            $data = Pegawai::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tgl_lahir' => $request->tgl_lahir,
                'pendidikan' => $request->pendidikan,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'jabatan_id' => $request->jabatan_id,
                'no_telp' => $request->no_telp,
                'status' => $request->status,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.pegawai')->with('success', 'Data Berhasil Di Tambah');
    }

    public function AdminDelete($id)
    {
        Pegawai::find($id)->delete();
        // dd($data);
        return redirect()->route('admin.pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
}
