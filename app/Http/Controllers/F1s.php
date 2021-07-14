<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F1s_model;
use App\imports\ImportReportF1S;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Session;

class F1s extends Controller
{
	public function index(){
		$f1s = F1s_model::all();
		return view('report_f1.index', ['title' => 'Report F1', 'detail' => 'Master Data Report F1', 'f1s' => $f1s, 'year' => '']);
	}

	public function year(Request $request)
	{
		$year = $request->input('year');
		$yearFix = str_replace("-", "/", $year);
		$f1s = F1s_model::where('tahun', $yearFix)->get();
		return view('report_f1.index', ['title' => 'Report F1 ' . $yearFix, 'detail' => 'Master Data Report F1','f1s' => $f1s, 'year' => $yearFix]);
	}

	public function import(Request $request) {
		try {
			\Excel::import(new ImportReportF1S, $request->import_file);
			Session::flash('sukses','Data Imported Successfully');
    } catch (\Exception $e) {
      Session::flash('error', $e->getMessage());
    }

		return Back();
	}

	public function create(){
		return view('report_f1.create', ['title' => 'Form Add Data Report F1', 'detail' => '']);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'nama_dosen' => 'required',
			'nip' => 'required',
			'mata_kuliah' => 'required',
			'kelas' => 'required',
			'jpm' => 'required',
			'kpk' => 'required',
			'rata_kehadiran' => 'required',
			'tahun' => 'required'
		],
		[
			'nama_dosen.required' => 'Data must not be empty!',
			'nip.required' => 'Data must not be empty!',
			'mata_kuliah.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'jpm.required' => 'Data must not be empty!',
			'kpk.required' => 'Data must not be empty!',
			'rata_kehadiran.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		F1s_model::create($validateData);

		return redirect()->route('f1s')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = F1s_model::find($id);
		return view('report_f1.edit', ['title' => 'Edit Data Report F1', 'detail' => '', 'report_f1' => $result]);
		// dd($id);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'nama_dosen' => 'required',
			'nip' => 'required',
			'mata_kuliah' => 'required',
			'p1' => '',
			'p2' => '',
			'p3' => '',
			'p4' => '',
			'p5' => '',
			'p6' => '',
			'p7' => '',
			'p8' => '',
			'p9' => '',
			'p10' => '',
			'p11' => '',
			'p12' => '',
			'p13' => '',
			'p14' => '',
			'p15' => '',
			'p16' => '',
			'p17' => '',
			'p18' => '',
			'p19' => '',
			'prosentase_hadir' => 'required',
			'prosentase_tidakhadir' => 'required',
			'hadir' => '',
			'izin' => '',
			'keluar_dinas' => '',
			'mangkir' => '',
			'sakit' => '',
			'tahun' => 'required'
			
		],
		[
			'nama_dosen.required' => 'Data must not be empty!',
			'nip.required' => 'Data must not be empty!',
			'mata_kuliah.required' => 'Data must not be empty!',
			'prosentase_hadir.required' => 'Data must not be empty!',
			'prosentase_tidakhadir.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		F1s_model::where('id',$id)->update($validateData);
		return redirect()->route('f1s')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = F1s_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('f1s')
		->with('delete','Data deleted successfully');

	}

	public function export($year)
	{
		$result = F1s_model::where('tahun', $year)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Master Data Report F1');
		$sheet->mergeCells('A1:AE1');
		$sheet->setCellValue('A1', 'REKAPITULASI PROSENTASE KEHADIRAN DOSEN');
		$sheet->getStyle('A1:AE1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:AE1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:AE2');
		$sheet->setCellValue('A2', 'PROGRAM REGULER');
		$sheet->getStyle('A2:AE2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:AE2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:AE3');
		$sheet->setCellValue('A3', 'SEMESTER GANJIL TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A3:AE3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:AE3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:AE4');
		$sheet->setCellValue('A4', 'JURUSAN TEKNIK INFORMATIKA DAN KOMPUTER');
		$sheet->getStyle('A4:AE4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:AE4')->getFont()->setBold(true);

		$sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
		$sheet->getColumnDimension('Q')->setAutoSize(true);
        $sheet->getColumnDimension('R')->setAutoSize(true);
        $sheet->getColumnDimension('S')->setAutoSize(true);
        $sheet->getColumnDimension('T')->setAutoSize(true);
        $sheet->getColumnDimension('U')->setAutoSize(true);
        $sheet->getColumnDimension('V')->setAutoSize(true);
        $sheet->getColumnDimension('W')->setAutoSize(true);
        $sheet->getColumnDimension('X')->setAutoSize(true);
		$sheet->getColumnDimension('Y')->setAutoSize(true);
        $sheet->getColumnDimension('Z')->setAutoSize(true);
        $sheet->getColumnDimension('AA')->setAutoSize(true);
        $sheet->getColumnDimension('AB')->setAutoSize(true);
        $sheet->getColumnDimension('AC')->setAutoSize(true);
        $sheet->getColumnDimension('AD')->setAutoSize(true);
		$sheet->getColumnDimension('AE')->setAutoSize(true);

		$sheet->getStyle('A6:AE6')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A6:AE6')->getFont()->setBold(true);

		$sheet->setCellValue('A6', 'NO.');
		$sheet->setCellValue('B6', 'Nama Dosen');
		$sheet->setCellValue('C6', 'NIP');
		$sheet->setCellValue('D6', 'Mata Kuliah');
		$sheet->mergeCells('E5:W5');
		$sheet->setCellValue('E5', 'PERTEMUAN');
		$sheet->getStyle('E5:W5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('E5:W5')->getFont()->setBold(true);
		$sheet->getStyle('E6:W6')->getFont()->setBold(true);
		$sheet->setCellValue('E6', 'P1');
		$sheet->setCellValue('F6', 'P2');
		$sheet->setCellValue('G6', 'P3');
		$sheet->setCellValue('H6', 'P4');
		$sheet->setCellValue('I6', 'P5');
		$sheet->setCellValue('J6', 'P6');
		$sheet->setCellValue('K6', 'P7');
		$sheet->setCellValue('L6', 'P8');
		$sheet->setCellValue('M6', 'P9');
		$sheet->setCellValue('N6', 'P10');
		$sheet->setCellValue('O6', 'P11');
		$sheet->setCellValue('P6', 'P12');
		$sheet->setCellValue('Q6', 'P13');
		$sheet->setCellValue('R6', 'P14');
		$sheet->setCellValue('S6', 'P15');
		$sheet->setCellValue('T6', 'P16');
		$sheet->setCellValue('U6', 'P17');
		$sheet->setCellValue('V6', 'P18');
		$sheet->setCellValue('W6', 'P19');
		$sheet->mergeCells('X5:Y5');
		$sheet->setCellValue('X5', 'Prosentase');
		$sheet->getStyle('X5:Y5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('X5:Y5')->getFont()->setBold(true);
		$sheet->setCellValue('X6', 'Hadir');
		$sheet->setCellValue('Y6', 'Tidak Hadir');
		$sheet->mergeCells('Z5:AD5');
		$sheet->setCellValue('Z5', 'Total Jam');
		$sheet->getStyle('Z5:AD5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('Z5:AD5')->getFont()->setBold(true);
		$sheet->setCellValue('Z6', 'H');
		$sheet->setCellValue('AA6', 'I');
		$sheet->setCellValue('AB6', 'K');
		$sheet->setCellValue('AC6', 'M');
		$sheet->setCellValue('AD6', 'S');
		$sheet->setCellValue('AE6', 'Tahun');
		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A5:AE5')->applyFromArray($styleArray);
		$sheet ->getStyle('A6:AE6')->applyFromArray($styleArray);

		$no=1;
		$cell = 7;
		foreach($result as $row){
			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'.$cell. ':AE'.$cell)->applyFromArray($styleArray);

			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->getStyle('A'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('B'.$cell, $row->nama_dosen);
			$sheet->setCellValue('C'.$cell, $row->nip);
			$sheet->setCellValue('D'.$cell, $row->mata_kuliah);
			$sheet->setCellValue('E'.$cell, $row->p1);
			$sheet->getStyle('E'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('F'.$cell, $row->p2);
			$sheet->getStyle('F'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('G'.$cell, $row->p3);
			$sheet->getStyle('G'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('H'.$cell, $row->p4);
			$sheet->getStyle('H'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('I'.$cell, $row->p5);
			$sheet->getStyle('I'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('J'.$cell, $row->p6);
			$sheet->getStyle('J'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('K'.$cell, $row->p7);
			$sheet->getStyle('K'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('L'.$cell, $row->p8);
			$sheet->getStyle('L'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('M'.$cell, $row->p9);
			$sheet->getStyle('M'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('N'.$cell, $row->p10);
			$sheet->getStyle('N'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$cell, $row->p11);
			$sheet->getStyle('O'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('P'.$cell, $row->p12);
			$sheet->getStyle('P'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('Q'.$cell, $row->p13);
			$sheet->getStyle('Q'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('R'.$cell, $row->p14);
			$sheet->getStyle('R'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('S'.$cell, $row->p15);
			$sheet->getStyle('S'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('T'.$cell, $row->p16);
			$sheet->getStyle('T'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('U'.$cell, $row->p17);
			$sheet->getStyle('U'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('V'.$cell, $row->p18);
			$sheet->getStyle('V'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('W'.$cell, $row->p19);
			$sheet->getStyle('W'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('X'.$cell, $row->prosentase_hadir);
			$sheet->getStyle('X'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('Y'.$cell, $row->prosentase_tidakhadir);
			$sheet->getStyle('Y'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('Z'.$cell, $row->hadir);
			$sheet->getStyle('Z'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('AA'.$cell, $row->izin);
			$sheet->getStyle('AA'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('AB'.$cell, $row->keluar_dinas);
			$sheet->getStyle('AB'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('AC'.$cell, $row->mangkir);
			$sheet->getStyle('AC'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('AD'.$cell, $row->sakit);
			$sheet->getStyle('AD'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('AE'.$cell, $row->tahun);
			$sheet->getStyle('AE'. $cell)->getAlignment()->setHorizontal('center');
			

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Master Data F1.xlsx"');
		$writer->save('php://output');
	}
}
