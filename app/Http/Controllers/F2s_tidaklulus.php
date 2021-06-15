<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F2s_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class F2s_tidaklulus extends Controller
{
    public function index(){
    	$f2s_tidaklulus = F2s_model::where('status', '=', 'kosong')->get();

		return view('report_f2_tidaklulus.index', ['title' => 'Data Mahasiswa Tidak/Belum Lulus','detail' => 'Rekapitulasi Mahasiswa Tidak/Belum Lulus', 'f2s_tidaklulus' => $f2s_tidaklulus, 'year' => '']);
	}

	public function index2(){
    	$f2s_tidaklulus = F2s_model::where('status', '!=', 'L')->get();

		return view('report_f2_tidaklulus.index', ['title' => 'Data Mahasiswa Tidak/Belum Lulus','detail' => 'Rekapitulasi Mahasiswa Tidak/Belum Lulus', 'f2s_tidaklulus' => $f2s_tidaklulus, 'year' => $year]);
	}

	public function year(Request $request)
	{
			$year = $request->input('year');

			$f2s_tidaklulus = F2s_model::where('tahun', $year)->where('status', '!=', 'L')->get();
			return view('report_f2_tidaklulus.index', ['title' => 'Data Mahasiswa Tidak/Belum Lulus ' . $year,'detail' => 'Rekapitulasi Mahasiswa Tidak/Belum Lulus','f2s_tidaklulus' => $f2s_tidaklulus, 'year' => $year]);
	}

	public function export($year)
	{
		$result = F2s_model::where('tahun', $year)->where('status', '!=', 'L')->get();
		// $result = DB::table('report_f2s')
  //               ->where('status', '=', 'L')
  //               ->where('tahun', '=', $year)
  //               ->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Data Mahasiswa Tidak Lulus');
		$sheet->mergeCells('A1:D1');
		$sheet->setCellValue('A1', 'Data Mahasiswa Tidak Lulus ' .$year);
		$sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');

		$sheet->setCellValue('A3', 'NO.');
		$sheet->setCellValue('B3', 'NAMA MAHASISWA');
		$sheet->setCellValue('C3', 'NIM');
		$sheet->setCellValue('D3', 'STATUS');
		$no=1;
		$cell = 4;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('C'.$cell, $row->nim);
			$sheet->setCellValue('D'.$cell, $row->status);
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa Tidak/Belum Lulus.xlsx"');
		$writer->save('php://output');
		// dd($year);
	}
}
