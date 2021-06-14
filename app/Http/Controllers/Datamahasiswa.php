<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluations_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa_Model;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nim' => 'required',
            'foto' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'required'
        ],
        [
            'nim.required' => 'Data must not be empty!',
            'foto.required' => 'Data must not be empty!',
            'nama.required' => 'Data must not be empty!',
            'tempat_lahir.required' => 'Data must not be empty!',
            'tanggal_lahir.required' => 'Data must not be empty!',
            'agama.required' => 'Data must not be empty!',
            'asal_sekolah.required' => 'Data must not be empty!',
            'jenis_kelamin.required' => 'Data must not be empty!',
            'golongan_darah.required' => 'Data must not be empty!',
            'alamat.required' => 'Data must not be empty!',
            'nama_ortu.required' => 'Data must not be empty!',
            'pendidikan_terakhir.required' => 'Data must not be empty!',
            'pekerjaan.required' => 'Data must not be empty!',
            'keterangan.required' => 'Data must not be empty!'

        ]);

        DB::table('mahasiswa')->where('id', $id)
            ->update([
                'foto' => $request->foto,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'asal_sekolah' => $request->asal_sekolah,
                'jenis_kelamin' => $request->jenis_kelamin,
                'golongan_darah' => $request->golongan_darah,
                'alamat' => $request->alamat,
                'nama_ortu' => $request->nama_ortu,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'keterangan' => $request->keterangan
            ]);

        return redirect()->route('mahasiswa')->with('update', 'Data updated successfully');
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
