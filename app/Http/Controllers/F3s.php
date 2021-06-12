<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F3s_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class F3s extends Controller
{
    public function index(){
		$f3s = F3s_model::all();
		return view('report_f3.index', ['title' => 'Report F3','detail' => 'Rekapitulasi Status Kelulusan', 'f3s' => $f3s]);
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$f3s = F3s_model::all();
			return view('report_f3.index', ['title' => 'Report F3','detail' => 'Rekapitulasi Status Kelulusan', 'f3s' => $f3s]);

		} else{
			$year = $request->input('year');
			$result = F3s_model::where('tahun', $year)->get();
			return view('report_f3.year', ['title' => 'Report F3 ' . $year,'detail' => 'Rekapitulasi Status Kelulusan','report_f3' => $result]);
		}
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
			'prodi.Dequired' => 'Data must not be empty!',
			'jenjang.required' => 'Data must not be empty!',
			'semester.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'jumlah_mahasiswa.required' => 'Data must not be empty!',
			'status.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

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

	public function export(Request $request)
	{
		$year = $request->input('year');
		$result = F3s_model::where('tahun', $year)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Kelulusan');
		$sheet->mergeCells('A1:N1');
		$sheet->setCellValue('A1', 'JUMLAH MAHASISWA LULUS, LULUS PERCOBAAN, CUTI');
		$sheet->getStyle('A1:N1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:N1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:N2');
		$sheet->setCellValue('A2', 'MENGULANG, MENGUNDURKAN DIRI & DROP OUT');
		$sheet->getStyle('A2:N2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:N2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:N3');
		$sheet->setCellValue('A3', 'JURUSAN TEKNIK INFORMATIKA DAN KUMPUTER POLITEKNIK NEGERI JAKARTA');
		$sheet->getStyle('A3:N3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:N3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:N4');
		$sheet->setCellValue('A4', 'SEMESTER GANJIL TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A4:N4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:N4')->getFont()->setBold(true);

		$sheet->mergeCells('I6:N6');
		$sheet->setCellValue('I6', 'STATUS');
		$sheet->getStyle('I6:N6')->getAlignment()->setHorizontal('center');

		$sheet->mergeCells('A6:A7');
		$sheet->setCellValue('A6', 'NO.');
		$sheet->getStyle('A6:A7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('B6:B7');
		$sheet->setCellValue('B6', 'NAMA MAHASISWA');
		$sheet->getStyle('B6:B7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('C6:C7');
		$sheet->setCellValue('C6', 'NIM');
		$sheet->getStyle('C6:C7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('D6:D7');
		$sheet->setCellValue('D6', 'PRODI');
		$sheet->getStyle('D6:D7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('E6:E7');
		$sheet->setCellValue('E6', 'JENJANG');
		$sheet->getStyle('E6:E7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('F6:F7');
		$sheet->setCellValue('F6', 'SEMESTER');
		$sheet->getStyle('F6:F7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('G6:G7');
		$sheet->setCellValue('G6', 'KELAS');
		$sheet->getStyle('G6:G7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('H6:H7');
		$sheet->setCellValue('H6', 'JUMLAH MAHASISWA');
		$sheet->getStyle('H6:H7')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('I7', 'L');
		$sheet->setCellValue('J7', 'LP');
		$sheet->setCellValue('K7', 'CT');
		$sheet->setCellValue('L7', 'ML');
		$sheet->setCellValue('M7', 'MD');
		$sheet->setCellValue('N7', 'DO');
		$no=1;
		$cell = 8;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('C'.$cell, $row->nim);
			$sheet->setCellValue('D'.$cell, $row->prodi);
			$sheet->setCellValue('E'.$cell, $row->jenjang);
			$sheet->setCellValue('F'.$cell, $row->semester);
			$sheet->setCellValue('G'.$cell, $row->kelas);
			$sheet->setCellValue('H'.$cell, $row->jumlah_mahasiswa);
			$sheet->setCellValue('I'.$cell, $row->status_l);
			$sheet->setCellValue('J'.$cell, $row->status_lp);
			$sheet->setCellValue('K'.$cell, $row->status_ct);
			$sheet->setCellValue('L'.$cell, $row->status_ml);
			$sheet->setCellValue('M'.$cell, $row->status_md);
			$sheet->setCellValue('N'.$cell, $row->status_do);
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Kelulusan.xlsx"');
		$writer->save('php://output');
	}
}
