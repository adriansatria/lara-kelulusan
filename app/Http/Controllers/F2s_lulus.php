<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F2s_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class F2s_lulus extends Controller
{
    public function index(){
    	$f2s_lulus = F2s_model::where('status', 'L')->get();

		return view('report_f2_lulus.index', ['title' => 'Data Mahasiswa Lulus','detail' => 'Rekapitulasi Mahasiswa Lulus', 'f2s_lulus' => $f2s_lulus]);
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$f2s_lulus = F2s_model::where('status', 'L')->get();

			return view('report_f2_lulus.index', ['title' => 'Data Mahasiswa Lulus','detail' => 'Rekapitulasi Mahasiswa Lulus', 'f2s_lulus' => $f2s_lulus]);

		} else{
			$year = $request->input('year');

			$f2s_lulus = F2s_model::where('tahun', $year)->where('status', 'L')->get();
			return view('report_f2_lulus.year', ['title' => 'Data Mahasiswa Lulus ' . $year,'detail' => 'Rekapitulasi Mahasiswa Lulus','report_f2s_lulus' => $f2s_lulus]);
		}
	}

	public function export(Request $request)
	{
		$year = $request->input('year');
		$result = F2s_model::where('tahun', $year)->where('status', 'L')->get();
		// $result = DB::table('report_f2s')
  //               ->where('status', '=', 'L')
  //               ->where('tahun', '=', $year)
  //               ->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Data Mahasiswa Lulus');
		$sheet->mergeCells('A1:D1');
		$sheet->setCellValue('A1', 'Laporan Data Mahasiswa Lulus');
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
		header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa Lulus.xlsx"');
		$writer->save('php://output');
	}
}
