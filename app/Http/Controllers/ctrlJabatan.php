<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use DataTables;
// use Yajra\DataTables\Contracts\DataTable;
use App\DataTables\JabatanDataTable;
use Illuminate\Support\Facades\Validator;
use Spatie\FlareClient\Flare;

class ctrlJabatan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminShow(JabatanDataTable $dataTable)
    {
        $data = Jabatan::all();
        return $dataTable->render('pages.admin.jabatan', compact('data'));
    }

    public function AdminEdit($id)
    {
        $data = Jabatan::findOrFail($id);
        return view('pages.admin.jabatanEdit', compact('data', 'id'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        try {
            $data = Jabatan::find($id)->update([
                'jabatan' => $request->jabatan,
                'gaji_harian' => filter_var($request->gaji_harian, FILTER_SANITIZE_NUMBER_INT),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // dd($e);
        }
        return redirect()->route('admin.jabatan')->with('success', 'Data Berhasil Di Update');
    }

    public function AdminCreated(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'jabatan' => 'required',
                'gaji_harian' => 'required',
            ],
            [
                'required' => 'Data :attribute tidak boleh kosong.',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

       try{
        $data = Jabatan::create([
            'jabatan' => $request->jabatan,
            'gaji_harian' => filter_var($request->gaji_harian, FILTER_SANITIZE_NUMBER_INT),
        ]);
       }catch(\Exception $e){
        return back()->with('error', $e->getMessage());
       }

        return redirect()->route('admin.jabatan')->with('success', 'Data Berhasil Di Tambah');
    }

    public function AdminDelete($id)
    {   
        Jabatan::find($id)->delete();
        // dd($data);
        return redirect()->route('admin.jabatan')->with('success', 'Data Berhasil Di Hapus');
    }
}
