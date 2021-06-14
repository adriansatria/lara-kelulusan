<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluations_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa_Model;

class Datamahasiswa extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa_Model::all();
        return view('datamahasiswa.datamahasiswa', ['title' => 'Data Mahasiswa', 'detail' => 'Rekapitulasi data mahasiswa', 'mahasiswa' => $mahasiswa]);
    }

    public function import(Request $request) {
        \Excel::import(new MahasiswaImport, $request->import_file);
        \Session::put('Berhasil', 'Data berhasil di masukan');

        return back();
    }

    public function export() {
        return \Excel::download(new MahasiswaExport, 'Menu Data Mahasiswa.xlsx');
    }

    public function edit($id) {
        $result = Mahasiswa_Model::find($id);
        return view('datamahasiswa.form', ['title' => 'Edit Data Mahasiswa', 'detail' => '', 'mahasiswa' => $result]);
    }

    public function destroy(Request $request, $id) {
        $mahasiswa = Mahasiswa_Model::find($id);
        $status = $mahasiswa->delete();

        return back();
    }
}
