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
        // $result = Mahasiswa_Model::all();
        return \Excel::download(new MahasiswaExport, 'Menu Data Mahasiswa.xlsx');
        // $spreadsheet = new Spreadsheet();
		// $sheet = $spreadsheet->getActiveSheet();
		// $sheet->setTitle('Laporan Data Mahasiswa');
		// $sheet->mergeCells('A1:D1');
		// $sheet->setCellValue('A1', 'Laporan Data Mahasiswa');
		// $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');

		// $sheet->setCellValue('A3', 'NO.');
		// $sheet->setCellValue('B3', 'NIM');
        // $sheet->setCellValue('C3', 'PAS FOTO');
		// $sheet->setCellValue('D3', 'NAMA');
		// $sheet->setCellValue('E3', 'TEMPAT LAHIR');
        // $sheet->setCellValue('F3', 'TANGGAL LAHIR');
        // $sheet->setCellValue('G3', 'AGAMA');
        // $sheet->setCellValue('H3', 'ASAL SEKOLAH');
        // $sheet->setCellValue('I3', 'JENIS KELAMIN');
        // $sheet->setCellValue('J3', 'GOL. DARAH');
        // $sheet->setCellValue('K3', 'ALAMAT');
        // $sheet->setCellValue('L3', 'NAMA ORANGTUA/WALI');
        // $sheet->setCellValue('M3', 'PENDIDIKAN TERAKHIR');
        // $sheet->setCellValue('N3', 'PEKERJAAN');
        // $sheet->setCellValue('O3', 'KETERANGAN');
		// $no=1;
		// $cell = 4;
		// foreach($result as $row){
		// 	$sheet->setCellValue('A'.$cell, $no++);
		// 	$sheet->setCellValue('B'.$cell, $row->nim);
		// 	$sheet->setCellValue('C'.$cell, $row->foto);
		// 	$sheet->setCellValue('D'.$cell, $row->nama);
        //     $sheet->setCellValue('E'.$cell, $row->tempat_lahir);
        //     $sheet->setCellValue('F'.$cell, $row->tanggal_lahir);
        //     $sheet->setCellValue('G'.$cell, $row->agama);
        //     $sheet->setCellValue('H'.$cell, $row->asal_sekolah);
        //     $sheet->setCellValue('I'.$cell, $row->jenis_kelamin);
        //     $sheet->setCellValue('J'.$cell, $row->golongan_darah);
        //     $sheet->setCellValue('K'.$cell, $row->alamat);
        //     $sheet->setCellValue('L'.$cell, $row->nama_ortu);
        //     $sheet->setCellValue('M'.$cell, $row->pendidikan_terakhir);
        //     $sheet->setCellValue('N'.$cell, $row->pekerjaan);
        //     $sheet->setCellValue('O'.$cell, $row->keterangan);
		// 	$cell++;
		// }
		// $writer = new Xlsx($spreadsheet);        
		// header('Content-Type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa.xlsx"');
		// $writer->save('php://output');
    }

    public function edit($id) {
        
    }

    public function destroy($id) {

    }
}
