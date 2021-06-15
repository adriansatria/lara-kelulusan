<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekapkehadirandosen_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekapkehadirandosen extends Controller
{
	public function index(){
		$Rekapkehadirandosen = Rekapkehadirandosen_model::all();
		return view('report_f1.index', ['title' => 'Report F1', 'detail' => 'Rekapitulasi Kehadiran Dosen', 'f1s' => $Rekapkehadirandosen]);
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$Rekapkehadirandosen = Rekapkehadirandosen_model::all();
			return view('report_f1.index', ['title' => 'Report F1', 'detail' => 'Rekapitulasi Kehadiran Dosen', 'f1s' => $fRekapkehadirandosen1s]);

		} else{
			$year = $request->input('year');
			$result = Rekapkehadirandosen_model::where('tahun', $year)->get();
			return view('report_f1.year', ['title' => 'Report F1 ' . $year, 'detail' => 'Rekapitulasi Kehadiran Dosen','report_f1' => $result]);
		}
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

		Rekapkehadirandosen_model::create($validateData);

		return redirect()->route('Rekapkehadirandosen')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Rekapkehadirandosen_model::find($id);
		return view('report_f1.edit', ['title' => 'Edit Data Report F1', 'detail' => '', 'report_f1' => $result]);
	}

	public function update(Request $request, $id)
	{
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

		Rekapkehadirandosen_model::where('id',$id)->update($validateData);

		return redirect()->route('Rekapkehadirandosen')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Rekapkehadirandosen_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('Rekapkehadirandosen')
		->with('delete','Data deleted successfully');

	}

	public function export(Request $request)
	{
		$year = $request->input('year');
		$result = Rekapkehadirandosen_model::where('tahun', $year)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Rekapitulasi Kehadiran Dosen');
		$sheet->mergeCells('A1:H1');
		$sheet->setCellValue('A1', 'REKAPITULASI PROSENTASE KEHADIRAN DOSEN');
		$sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:H1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:H2');
		$sheet->setCellValue('A2', 'PROGRAM REGULER');
		$sheet->getStyle('A2:H2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:H2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:H3');
		$sheet->setCellValue('A3', 'SEMESTER GANJIL TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A3:H3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:H3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:H4');
		$sheet->setCellValue('A4', 'JURUSAN TEKNIK INFORMATIKA DAN KOMPUTER');
		$sheet->getStyle('A4:H4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:H4')->getFont()->setBold(true);


		$sheet->setCellValue('A6', 'NO.');
		$sheet->setCellValue('B6', 'NAMA DOSEN');
		$sheet->setCellValue('C6', 'NIP');
		$sheet->setCellValue('D6', 'MATA KULIAH');
		$sheet->setCellValue('E6', 'KELAS');
		$sheet->setCellValue('F6', 'JPM');
		$sheet->setCellValue('G6', '% Kehadiran per KLS.');
		$sheet->setCellValue('H6', 'Rata-rata Kehadiran per SMT.');
		$no=1;
		$cell = 7;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nama_dosen);
			$sheet->setCellValue('C'.$cell, $row->nip);
			$sheet->setCellValue('D'.$cell, $row->mata_kuliah);
			$sheet->setCellValue('E'.$cell, $row->kelas);
			$sheet->setCellValue('F'.$cell, $row->jpm);
			$sheet->setCellValue('G'.$cell, $row->kpk);
			$sheet->setCellValue('H'.$cell, $row->rata_kehadiran);
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Rekapitulasi Kehadiran Dosen.xlsx"');
		$writer->save('php://output');
	}
}
