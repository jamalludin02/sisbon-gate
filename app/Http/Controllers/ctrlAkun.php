<?php

namespace App\Http\Controllers;

use App\DataTables\AkunDataTable;
use App\Models\Akun;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ctrlAkun extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AdminShow(AkunDataTable $dataTable)
    {
        // dd(auth()->user());
        $data = Akun::with('pegawai')->get();
        return $dataTable->render('pages.admin.akun', compact('data'));
    }

    public function AdminEdit($id)
    {
        $data = Akun::findOrFail($id);
        $pegawai = Pegawai::select('id', 'nama')->get();
        return view('pages.admin.akunEdit', compact('data', 'id', 'pegawai'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        try {
            $data = Akun::find($id)->update([
                'pegawai_id' => $request->pegawai_id,
                'username' => $request->username,
                'role' => $request->role,
                'email' => $request->email,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // dd($e);
        }
        return redirect()->route('admin.akun')->with('success', 'Data Berhasil Di Update');
    }

    public function AdminCreated(Request $request)
    {
        $pegawai = Pegawai::select('tgl_lahir')->find($request->pegawai_id);
        $tgl_lahir = str_replace('-', '', preg_replace('#.*\s([\w-]*)$#', '', $pegawai->tgl_lahir));
        $pw = Hash::make($tgl_lahir);
        $validator = Validator::make(
            $request->all(),
            [
                'pegawai_id' => 'required',
                'username' => 'required',
                'role' => 'required',
                'email' => 'required|email',
            ],
            [
                'required' => 'Data :attribute tidak boleh kosong.',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = Akun::create([
                'pegawai_id' => $request->pegawai_id,
                'username' => $request->username,
                'role' => $request->role,
                'email' => $request->email,
                'password' => $pw,
            ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.akun')->with('success', 'Data Berhasil Di Tambah');
    }

    public function AdminDelete($id)
    {
        Akun::find($id)->delete();
        // dd($data);
        return redirect()->route('admin.akun')->with('success', 'Data Berhasil Di Hapus');
    }
    public function AdminResetPassword($id)
    {
        $data = Akun::with('pegawai')->find($id);
        $tgl_lahir = str_replace('-', '', preg_replace('#.*\s([\w-]*)$#', '', $data->pegawai->tgl_lahir));
        $pw = Hash::make($tgl_lahir);

        try {
            $data = Akun::find($id)->update([
                'password' => $pw,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.akun')->with('success', 'Password Berhasil di reset');
    }
}
