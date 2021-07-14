<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekapipmahasiswa_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class F2s_lulus extends Controller
{
    public function index(){
    	$f2s_lulus = Rekapipmahasiswa_model::where('status', 'L')->get();

		return view('report_f2_lulus.index', ['title' => 'Data Mahasiswa Lulus','detail' => 'Rekapitulasi Mahasiswa Lulus', 'f2s_lulus' => $f2s_lulus, 'year' => '', 'prodi' => '']);
	}

	public function year(Request $request)
	{
			$year = $request->input('year');
			$yearFix = str_replace("-", "/", $year);
			$prodi = $request->input('prodi');
			$f2s_lulus = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->where('status', 'L')->get();
			return view('report_f2_lulus.index', ['title' => 'Data Mahasiswa Lulus ' . $yearFix,'detail' => 'Rekapitulasi Mahasiswa Lulus','f2s_lulus' => $f2s_lulus, 'year' => $yearFix, 'yearAwal' => $year, 'prodi' => $prodi]);
	}

	public function export($year, $prodi)
	{
		$year = str_replace("-", "/", $year);
		$result = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->where('status', 'L')->get();
		// $result = DB::table('report_f2s')
  //               ->where('status', '=', 'L')
  //               ->where('tahun', '=', $year)
  //               ->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Data Mahasiswa Lulus');
		$sheet->mergeCells('A1:D1');
		$sheet->setCellValue('A1', 'Laporan Data Mahasiswa Lulus '.$prodi. ' ' .$year);
		$sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');
		$sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);

		$sheet->setCellValue('A3', 'NO.');
		$sheet->setCellValue('B3', 'NAMA MAHASISWA');
		$sheet->setCellValue('C3', 'NIM');
		$sheet->setCellValue('D3', 'STATUS');

		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A3:D3')->applyFromArray($styleArray);

		$no=1;
		$cell = 4;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('C'.$cell, $row->nim);
			$sheet->setCellValue('D'.$cell, $row->status);

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'. $cell.':D'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa Lulus.xlsx"');
		$writer->save('php://output');
	}
}
