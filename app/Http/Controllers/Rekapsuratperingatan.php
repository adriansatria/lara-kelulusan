<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekapsuratperingatan_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekapsuratperingatan extends Controller
{
    public function index(){
		$Rekapsuratperingatan = Rekapsuratperingatan_model::all();
		return view('report_f4.index', ['title' => 'Report F4','detail' => 'Rekapitulasi Surat Peringatan', 'f4s' => $Rekapsuratperingatan]);
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$Rekapsuratperingatan = Rekapsuratperingatan_model::all();
			return view('report_f4.index', ['title' => 'Report F4','detail' => 'Rekapitulasi Surat Peringatan', 'f4s' => $Rekapsuratperingatan]);

		} else{
			$year = $request->input('year');
			$result = Rekapsuratperingatan_model::where('tahun', $year)->get();
			return view('report_f4.year', ['title' => 'Report F4 ' . $year,'detail' => 'Rekapitulasi Surat Peringatan','report_f4' => $result]);
		}
	}

	public function create(){
		return view('report_f4.create', ['title' => 'Form Add Data Report F4', 'detail' => '']);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'prodi' => 'required',
			'jenjang' => 'required',
			'semester' => 'required',
			'kelas' => 'required',
			'jumlah_mahasiswa' => 'required',
			'sp1' => '',
			'sp2' => '',
			'sp3' => '',
			'keterangan' => '',
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

		Rekapsuratperingatan_model::create($validateData);

		return redirect()->route('rekapsuratperingatan')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Rekapsuratperingatan_model::find($id);
		return view('report_f4.edit', ['title' => 'Edit Data Report F4', 'detail' => '', 'report_f4' => $result]);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'prodi' => 'required',
			'jenjang' => 'required',
			'semester' => 'required',
			'kelas' => 'required',
			'jumlah_mahasiswa' => 'required',
			'sp1' => '',
			'sp2' => '',
			'sp3' => '',
			'keterangan' => '',
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

		Rekapsuratperingatan_model::where('id',$id)->update($validateData);

		return redirect()->route('rekapsuratperingatan')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Rekapsuratperingatan_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('rekapsuratperingatan')
		->with('delete','Data deleted successfully');

	}

	public function export(Request $request)
	{
		$year = $request->input('year');
		$result = Rekapsuratperingatan_model::where('tahun', $year)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Surat Peringatan');
		$sheet->mergeCells('A1:J1');
		$sheet->setCellValue('A1', 'JUMLAH MAHASISWA YANG MENDAPAT SURAT PERINGATAN');
		$sheet->getStyle('A1:J1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:J1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:J2');
		$sheet->setCellValue('A2', 'JURUSAN TEKNIK INFORMATIKAN DAN KOMPUTER');
		$sheet->getStyle('A2:J2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:J2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:J3');
		$sheet->setCellValue('A3', 'POLITEKNIK NEGERI JAKARTA');
		$sheet->getStyle('A3:J3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:J3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:J4');
		$sheet->setCellValue('A4', 'SEMESTER GANJIL TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A4:J4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:J4')->getFont()->setBold(true);

		$sheet->mergeCells('G6:I6');
		$sheet->setCellValue('G6', 'SURAT PERINGATAN');
		$sheet->getStyle('G6:I6')->getAlignment()->setHorizontal('center');

 		$sheet->mergeCells('A6:A7');
		$sheet->setCellValue('A6', 'NO.');
		$sheet->getStyle('A6:A7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('B6:B7');
		$sheet->setCellValue('B6', 'PRODI');
		$sheet->getStyle('B6:B7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('C6:C7');
		$sheet->setCellValue('C6', 'JENJANG');
		$sheet->getStyle('C6:C7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('D6:D7');
		$sheet->setCellValue('D6', 'SEMESTER');
		$sheet->getStyle('D6:D7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('E6:E7');
		$sheet->setCellValue('E6', 'KELAS');
		$sheet->getStyle('E6:E7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('F6:F7');
		$sheet->setCellValue('F6', 'JUMLAH MAHASISWA');
		$sheet->getStyle('F6:F7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('G7', 'I');
		$sheet->getStyle('G7')->getAlignment()->setHorizontal('center');
		$sheet->setCellValue('H7', 'II');
		$sheet->getStyle('H7')->getAlignment()->setHorizontal('center');
		$sheet->setCellValue('I7', 'III');
		$sheet->getStyle('I7')->getAlignment()->setHorizontal('center');
		$sheet->mergeCells('J6:J7');
		$sheet->setCellValue('J6', 'KETERANGAN');
		$sheet->getStyle('J6:J7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$no=1;
		$cell = 8;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->prodi);
			$sheet->setCellValue('C'.$cell, $row->jenjang);
			$sheet->setCellValue('D'.$cell, $row->semester);
			$sheet->setCellValue('E'.$cell, $row->kelas);
			$sheet->setCellValue('F'.$cell, $row->jumlah_mahasiswa);
			$sheet->setCellValue('G'.$cell, $row->sp1);
			$sheet->setCellValue('H'.$cell, $row->sp2);
			$sheet->setCellValue('I'.$cell, $row->sp3);
			$sheet->setCellValue('J'.$cell, $row->keterangan);
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Surat Peringatan.xlsx"');
		$writer->save('php://output');
	}
}
