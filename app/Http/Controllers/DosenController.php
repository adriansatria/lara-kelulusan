<?php

namespace App\Http\Controllers;

use App\Models\dosen_model;
use Illuminate\Http\Request;
use App\imports\DosenImport;

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
        dd($id);
    }

    public function edit($id) {
        dd($id);
        // $result = Mahasiswa_Model::find($id);
        // return view('datamahasiswa.form', ['title' => 'Edit Data Mahasiswa', 'detail' => '', 'mahasiswa' => $result]);
    }

    public function destroy(Request $request, $id) {
        $dosen = dosen_model::find($id);
        $status = $dosen->delete();

        return redirect()->route('dosen')->with('delete','Data deleted successfully');
    }
}
