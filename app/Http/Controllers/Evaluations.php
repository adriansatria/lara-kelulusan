<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluations_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Evaluations extends Controller
{
    public function index(){
		$evaluations = Evaluations_model::all();
		return view('evaluation.index', ['title' => 'Evaluasi', 'detail' => 'Rekapitulasi Mahasiswa Bermasalah', 'evaluations' => $evaluations, 'year' => '']);
	}

	public function year(Request $request)
	{
		$year = $request->input('year');
		$evaluations = Evaluations_model::where('tahun', $year)->get();
		return view('evaluation.index', ['title' => 'Evaluasi ' . $year, 'detail' => 'Rekapitulasi Mahasiswa Bermasalah','evaluations' => $evaluations, 'year' => $year]);
	}

	public function create(){
		return view('evaluation.create', ['title' => 'Form Add Data Evaluasi', 'detail' => '']);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'nama_dosen' => 'required',
			'mata_kuliah' => 'required',
			'kelas' => 'required',
			'nama_mahasiswa' => 'required',
			'nim' => 'required',
			'nilai_akhir' => 'required',
			'kemungkinan_perbaikan' => 'required',
			'keterangan' => 'required',
			'tahun' => 'required'
		],
		[
			'nama_dosen.required' => 'Data must not be empty!',
			'mata_kuliah.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'nama_mahasiswa.required' => 'Data must not be empty!',
			'nim.required' => 'Data must not be empty!',
			'nilai_akhir.required' => 'Data must not be empty!',
			'kemungkinan_perbaikan.required' => 'Data must not be empty!',
			'keterangan.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		Evaluations_model::create($validateData);

		return redirect()->route('evaluations')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Evaluations_model::find($id);
		return view('evaluation.edit', ['title' => 'Edit Data Evaluasi','detail' => '','evaluation' => $result]);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'nama_dosen' => 'required',
			'mata_kuliah' => 'required',
			'kelas' => 'required',
			'nama_mahasiswa' => 'required',
			'nim' => 'required',
			'nilai_akhir' => 'required',
			'kemungkinan_perbaikan' => 'required',
			'keterangan' => 'required',
			'tahun' => 'required'
		],
		[
			'nama_dosen.required' => 'Data must not be empty!',
			'mata_kuliah.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'nama_mahasiswa.required' => 'Data must not be empty!',
			'nim.required' => 'Data must not be empty!',
			'nilai_akhir.required' => 'Data must not be empty!',
			'kemungkinan_perbaikan.required' => 'Data must not be empty!',
			'keterangan.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		Evaluations_model::where('id',$id)->update($validateData);

		return redirect()->route('evaluations')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Evaluations_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('evaluations')
		->with('delete','Data deleted successfully');

	}

	public function export($year)
	{
		$result = Evaluations_model::where('tahun', $year)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Data Evaluasi');
		$sheet->mergeCells('A1:I1');
		$sheet->setCellValue('A1', 'RINCIAN DATA AWAL MAHASISWA YANG BERMASALAH');
		$sheet->getStyle('A1:I1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:I1')->getFont()->setBold(true);

		$sheet->setCellValue('A3', 'NO.');
		$sheet->setCellValue('B3', 'NAMA DOSEN');
		$sheet->setCellValue('C3', 'MATA KULIAH');
		$sheet->setCellValue('D3', 'KELAS');
		$sheet->setCellValue('E3', 'NAMA MAHASISWA');
		$sheet->setCellValue('F3', 'NIM');
		$sheet->setCellValue('G3', 'NILAI AKHIR');
		$sheet->setCellValue('H3', 'KEMUNGKINAN PERBAIKAN');
		$sheet->setCellValue('I3', 'KETERANGAN');

		$sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);

		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
        
        $sheet ->getStyle('A3:I3')->applyFromArray($styleArray);

		$no=1;
		$cell = 4;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->nama_dosen);
			$sheet->setCellValue('C'.$cell, $row->mata_kuliah);
			$sheet->setCellValue('D'.$cell, $row->kelas);
			$sheet->setCellValue('E'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('F'.$cell, $row->nim);
			$sheet->setCellValue('G'.$cell, $row->nilai_akhir);
			$sheet->setCellValue('H'.$cell, $row->kemungkinan_perbaikan);
			$sheet->setCellValue('I'.$cell, $row->keterangan);

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
			
			$sheet ->getStyle('A'.$cell.':I'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Evaluasi.xlsx"');
		$writer->save('php://output');
	}
}
