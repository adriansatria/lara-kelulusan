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
        $result = Mahasiswa_Model::all();
        // return \Excel::download(new MahasiswaExport, 'Menu Data Mahasiswa.xlsx');
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Data Mahasiswa');
		$sheet->mergeCells('A2:O2');
		$sheet->setCellValue('A2', 'Laporan Data Mahasiswa');
		$sheet->getStyle('A2:O2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2:O2')->getFont()->setBold(true);

		$sheet->mergeCells('A4:A5');
		$sheet->setCellValue('A4', 'NO.');
		$sheet->getStyle('A4:A5')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('B4:B5');
		$sheet->setCellValue('B4', 'NIM');
		$sheet->getStyle('B4:B5')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('C4:C5');
		$sheet->setCellValue('C4', 'Pas foto');
		$sheet->getStyle('C4:C5')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('D4:H4');
        $sheet->setCellValue('D4', 'Detail');
		$sheet->getStyle('D4:H4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('D5', 'Nama');
        $sheet->setCellValue('E5', 'Tempat lahir');
        $sheet->setCellValue('F5', 'Tanggal lahir');
        $sheet->setCellValue('G5', 'Agama');
        $sheet->setCellValue('H5', 'Asal sekolah');
        $sheet->mergeCells('I4:I5');
		$sheet->setCellValue('I4', 'Jenis kelamin');
		$sheet->getStyle('I4:I5')->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->mergeCells('J4:J5');
		$sheet->setCellValue('J4', 'Gol. darah');
		$sheet->getStyle('J4:J5')->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->mergeCells('K4:K5');
		$sheet->setCellValue('K4', 'Alamat');
		$sheet->getStyle('K4:K5')->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->mergeCells('L4:N4');
        $sheet->setCellValue('L4', 'Detail Wali');
		$sheet->getStyle('L4:N4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('L5', 'Nama Ortu/Wali');
        $sheet->setCellValue('M5', 'Pendidikan Terakhir');
        $sheet->setCellValue('N5', 'Pekerjaan');
        $sheet->mergeCells('O4:O5');
		$sheet->setCellValue('O4', 'Keterangan');
		$sheet->getStyle('O4:O5')->getAlignment()->setHorizontal('center')->setVertical('center');

		$no=1;
		$cell = 6;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nim);
			$sheet->setCellValue('C'.$cell, $row->foto);
			$sheet->setCellValue('D'.$cell, $row->nama);
            $sheet->setCellValue('E'.$cell, $row->tempat_lahir);
            $sheet->setCellValue('F'.$cell, $row->tanggal_lahir);
            $sheet->setCellValue('G'.$cell, $row->agama);
            $sheet->setCellValue('H'.$cell, $row->asal_sekolah);
            $sheet->setCellValue('I'.$cell, $row->jenis_kelamin);
            $sheet->setCellValue('J'.$cell, $row->golongan_darah);
            $sheet->setCellValue('K'.$cell, $row->alamat);
            $sheet->setCellValue('L'.$cell, $row->nama_ortu);
            $sheet->setCellValue('M'.$cell, $row->pendidikan_terakhir);
            $sheet->setCellValue('N'.$cell, $row->pekerjaan);
            $sheet->setCellValue('O'.$cell, $row->keterangan);
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa.xlsx"');
		$writer->save('php://output');
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

        return redirect()->route('mahasiswa')->with('delete','Data deleted successfully');
    }
}
