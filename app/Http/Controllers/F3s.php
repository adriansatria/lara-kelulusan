<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F3s_model;
use App\imports\ImportReportF3S;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Session;

class F3s extends Controller
{
    public function index(){
		$f3s = F3s_model::all();
		return view('report_f3.index', ['title' => 'Report F3','detail' => 'Rekapitulasi Status Kelulusan', 'f3s' => $f3s, 'year' => '', 'prodi' => '', 'semester' => '']);
	}

	public function import(Request $request) {
		\Excel::import(new ImportReportF3S, $request->import_file);
		Session::flash('sukses','Data Siswa Berhasil Diimport!');

		return Back();
	}

	public function year(Request $request)
	{
		$year = $request->input('year');
		$prodi = $request->input('prodi');
		$semester = $request->input('semester');
		$result = F3s_model::where('tahun', $year)->where('prodi', $prodi)->where('semester', $semester)->get();
		return view('report_f3.index', ['title' => 'Report F3 ' . $year. ' - '.$prodi. ' - '.$semester,'detail' => 'Rekapitulasi Status Kelulusan','f3s' => $result, 'year' => $year, 'prodi' => $prodi, 'semester' => $semester]);

	}

	public function create(){
		return view('report_f3.create', ['title' => 'Form Add Data Report F3', 'detail' => '']);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'nama_mahasiswa' => '',
			'nim' => '',
			'prodi' => 'required',
			'jenjang' => 'required',
			'semester' => 'required',
			'kelas' => 'required',
			'jumlah_mahasiswa' => 'required',
			'status_l' => '',
			'status_lp' => '',
			'status_ct' => '',
			'status_ml' => '',
			'status_md' => '',
			'status_do' => '',
			'tahun' => 'required'
		],
		[
			'prodi.required' => 'Data must not be empty!',
			'jenjang.required' => 'Data must not be empty!',
			'semester.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'jumlah_mahasiswa.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		F3s_model::create($validateData);

		return redirect()->route('f3s')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = F3s_model::find($id);
		return view('report_f3.edit', ['title' => 'Edit Data Report F3', 'detail' => '', 'report_f3' => $result]);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'nim' => 'required',
			'nama_mahasiswa' => 'required',
			'izin' => 'required',
			'tidak_izin' => 'required',
			'jumlah' => 'required',
			'kelakuan' => 'required',
			'status_lulus_lalu' => 'required',
			'status_lulus_baru' => 'required',
			'amxsks' => 'required',
			'ip' => 'required',
			'kapita_selekta2' => 'required',
			'k3' => 'required',
			'metodologi_penelitian2' => 'required',
			'k2' => 'required',
			'bahasa_inggris_komunikasi2' => 'required',
			'k2_2' => 'required',
			'tugas_akhir' => 'required',
			'k6' => 'required',
		],
		[
			'nim.required' => 'Data must not be empty!',
			'nama_mahasiswa.required' => 'Data must not be empty!',
			'izin.required' => 'Data must not be empty!',
			'tidak_izin.required' => 'Data must not be empty!',
			'jumlah.required' => 'Data must not be empty!',
			'kelakuan.required' => 'Data must not be empty!',
			'status_lulus_lalu.required' => 'Data must not be empty!',
			'status_lulus_baru.required' => 'Data must not be empty!',
			'amxsks.required' => 'Data must not be empty!',
			'ip.required' => 'Data must not be empty!',
			'kapita_selekta2.required' => 'Data must not be empty!',
			'k3.required' => 'Data must not be empty!',
			'metodologi_penelitian2.required' => 'Data must not be empty!',
			'k2.required' => 'Data must not be empty!',
			'bahasa_inggris_komunikasi2.required' => 'Data must not be empty!',
			'k2_2.required' => 'Data must not be empty!',
			'tugas_akhir.required' => 'Data must not be empty!',
			'k6.required' => 'Data must not be empty!'
		]);

		F3s_model::where('id',$id)->update($validateData);

		return redirect()->route('f3s')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = F3s_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('f3s')
		->with('delete','Data deleted successfully');

	}

	public function export()
	{
		$result = F3s_model::all();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Kelulusan');
		$sheet->mergeCells('A1:O1');
		$sheet->setCellValue('A1', 'DATA MAHASISWA KELULUSAN MAHASISWA');
		$sheet->getStyle('A1:O1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:O1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:O2');
		$sheet->setCellValue('A2', 'IZIN, TIDAK HADIR, JUMLAH DAN KELAKUAN');
		$sheet->getStyle('A2:O2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:O2')->getFont()->setBold(true);

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


		$sheet->setCellValue('A6', 'NO.');
		$sheet->setCellValue('B6', 'NIM');
		$sheet->setCellValue('C6', 'NAMA MAHASISWA');
		$sheet->setCellValue('D6', 'IZIN');
		$sheet->setCellValue('E6', 'TIDAK IZIN');
		$sheet->setCellValue('F6', 'JUMLAH');
		$sheet->setCellValue('G6', 'KELAKUAN');
		$sheet->setCellValue('H6', 'STATUS LULUS SMT SEBELUMNYA');
		$sheet->setCellValue('I6', 'STATUS LULUS SMT SEKARANG');
		$sheet->setCellValue('J6', 'AM X SKS');
		$sheet->setCellValue('K6', 'IP');
		$sheet->setCellValue('L6', 'KAPITA SELEKTA 2');
		$sheet->setCellValue('M6', '3');
		$sheet->setCellValue('N6', 'METODOLOGI PENELITIAN 2');
		$sheet->setCellValue('O6', '2');
		$sheet->setCellValue('P6', 'BAHASA INGGRIS KOMUNIKASI 2');
		$sheet->setCellValue('Q6', '2');
		$sheet->setCellValue('R6', 'TUGAS AKHIR');
		$sheet->setCellValue('S6', '6');

		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A6:S6')->applyFromArray($styleArray);
		$sheet ->getStyle('A7:S7')->applyFromArray($styleArray);

		$no=1;
		$cell = 7;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->getStyle('A'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('B'.$cell, $row->nim);
			$sheet->setCellValue('C'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('D'.$cell, $row->izin);
			$sheet->getStyle('D'.$cell. ':F'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('E'.$cell, $row->tidak_izin);
			$sheet->setCellValue('F'.$cell, $row->jumlah);
			$sheet->setCellValue('G'.$cell, $row->kelakuan);
			$sheet->setCellValue('H'.$cell, $row->status_lulus_lalu);
			$sheet->setCellValue('I'.$cell, $row->status_lulus_baru);
			$sheet->setCellValue('J'.$cell, $row->amxsks);
			$sheet->getStyle('J'.$cell. ':S'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('K'.$cell, $row->ip);
			$sheet->setCellValue('L'.$cell, $row->kapita_selekta2);
			$sheet->setCellValue('M'.$cell, $row->k3);
			$sheet->setCellValue('N'.$cell, $row->metodologi_penelitian2);
			$sheet->setCellValue('O'.$cell, $row->k2);
			$sheet->setCellValue('P'.$cell, $row->bahasa_inggris_komunikasi2);
			$sheet->setCellValue('Q'.$cell, $row->k2_2);
			$sheet->setCellValue('R'.$cell, $row->tugas_akhir);
			$sheet->setCellValue('S'.$cell, $row->k6);

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'.$cell.':S'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Master Data F3.xlsx"');
		$writer->save('php://output');
	}
}
