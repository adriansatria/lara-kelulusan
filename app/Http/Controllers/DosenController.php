<?php

namespace App\Http\Controllers;

use App\Models\dosen_model;
use Illuminate\Http\Request;
use App\imports\DosenImport;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = dosen_model::all();
        return view('menudosen.menudosen', ['title' => 'Data Dosen', 'detail' => 'Rekapitulasi data dosen', 'dosen' => $dosen]);
    }

    public function importdosen(Request $request) {
        \Excel::import(new DosenImport, $request->import_file);
        \Session::put('Berhasil', 'Data berhasil di masukan');

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nip' => 'required',
            'nama_dosen' => 'required',
            'jabatan_struktural' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan_fungsional' => 'required',
            'tmt' => 'required',
            'notelp' => 'required',
            'nidn_nidk' => 'required',
            'homebase_prodi' => 'required',
            'serdos' => 'required',
            'keterangan' => 'required'
        ],
        [
            'nip.required' => 'Data must not be empty!',
            'nama_dosen.required' => 'Data must not be empty!',
            'jabatan_struktural.required' => 'Data must not be empty!',
            'pangkat_golongan.required' => 'Data must not be empty!',
            'jabatan_fungsional.required' => 'Data must not be empty!',
            'tmt.required' => 'Data must not be empty!',
            'notelp.required' => 'Data must not be empty!',
            'nidn_nidk.required' => 'Data must not be empty!',
            'homebase_prodi.required' => 'Data must not be empty!',
            'serdos.required' => 'Data must not be empty!',
            'keterangan.required' => 'Data must not be empty!'

        ]);

        DB::table('dosen')->where('id', $id)
            ->update([
                'nama_dosen' => $request->nama_dosen,
                'jabatan_struktural' => $request->jabatan_struktural,
                'pangkat_golongan' => $request->pangkat_golongan,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'tmt' => $request->tmt,
                'notelp' => $request->notelp,
                'nidn_nidk' => $request->nidn_nidk,
                'homebase_prodi' => $request->homebase_prodi,
                'serdos' => $request->serdos,
                'keterangan' => $request->keterangan
            ]);

        return redirect()->route('dosen')->with('update', 'Data updated successfully');
    }

    public function edit($id) {
        $result = dosen_model::find($id);
        return view('menudosen.form', ['title' => 'Edit Data Dosen', 'detail' => '', 'dosen' => $result]);
    }

    public function destroy(Request $request, $id) {
        $dosen = dosen_model::find($id);
        $status = $dosen->delete();

        return redirect()->route('dosen')->with('delete','Data deleted successfully');
    }
}
