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

        return view('menudosen.menudosen', ['title' => 'Data Dosen', 'detail' => 'Rekapitulasi data dosen']);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dosen_model  $dosen_model
     * @return \Illuminate\Http\Response
     */
    public function show(dosen_model $dosen_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dosen_model  $dosen_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen_model $dosen_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dosen_model  $dosen_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen_model $dosen_model)
    {
        //
    }
}
