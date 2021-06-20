<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekapstatuskelulusan_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class rekapstatuskelulusan extends Controller
{
    public function index(){
		$rekapstatuskelulusan = Rekapstatuskelulusan_model::all();
		return view('report_f3.rekapstatuskelulusan', ['title' => 'Rekap F3','detail' => 'Rekapitulasi Status Kelulusan', 'f3s' => $rekapstatuskelulusan, 'year' => '', 'prodi' => '', 'semester' => '']);
	}

	public function year(Request $request)
	{
		$year = $request->input('year');
		$prodi = $request->input('prodi');
		$semester = $request->input('semester');
		$result = Rekapstatuskelulusan_model::where('tahun', $year)->where('prodi', $prodi)->where('semester', $semester)->get();
		return view('report_f3.rekapstatuskelulusan', ['title' => 'Rekap F3 ' . $year. ' - '.$prodi. ' - '.$semester,'detail' => 'Rekapitulasi Status Kelulusan','f3s' => $result, 'year' => $year, 'prodi' => $prodi, 'semester' => $semester]);

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
			'tahun' => 'required',
			'keterangan' => 'required'
		],
		[
			'prodi.required' => 'Data must not be empty!',
			'jenjang.required' => 'Data must not be empty!',
			'semester.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'jumlah_mahasiswa.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!',
			'keterangan.required' => 'Data must not be empty!'

		]);

		Rekapstatuskelulusan_model::create($validateData);

		return redirect()->route('rekapstatuskelulusan')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Rekapstatuskelulusan_model::find($id);
		return view('report_f3.editrekap', ['title' => 'Edit Data Report F3', 'detail' => '', 'report_f3' => $result]);
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
			'tahun' => 'required',
			'prodi' => 'required',
			'keterangan' => 'required'
		],
		[
			'prodi.required' => 'Data must not be empty!',
			'jenjang.required' => 'Data must not be empty!',
			'semester.required' => 'Data must not be empty!',
			'kelas.required' => 'Data must not be empty!',
			'jumlah_mahasiswa.required' => 'Data must not be empty!',
			'status.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!',
			'keterangan.required' => 'Data must not be empty!'

		]);

		Rekapstatuskelulusan_model::where('id',$id)->update($validateData);

		return redirect()->route('rekapstatuskelulusan')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Rekapstatuskelulusan_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('rekapstatuskelulusan')
		->with('delete','Data deleted successfully');

	}

	public function export($year, $prodi, $semester)
	{
		$result = Rekapstatuskelulusan_model::where('tahun', $year)->where('prodi', $prodi)->where('semester', $semester)->get();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Kelulusan');
		$sheet->mergeCells('A1:P1');
		$sheet->setCellValue('A1', 'JUMLAH MAHASISWA LULUS, LULUS PERCOBAAN, CUTI');
		$sheet->getStyle('A1:P1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:P1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:P2');
		$sheet->setCellValue('A2', 'MENGULANG, MENGUNDURKAN DIRI & DROP OUT');
		$sheet->getStyle('A2:P2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:P2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:P3');
		$sheet->setCellValue('A3', 'JURUSAN TEKNIK INFORMATIKA DAN KUMPUTER POLITEKNIK NEGERI JAKARTA');
		$sheet->getStyle('A3:P3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:P3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:P4');
		$sheet->setCellValue('A4', 'SEMESTER GANJIL TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A4:P4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:P4')->getFont()->setBold(true);

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

		$sheet->mergeCells('I6:N6');
		$sheet->setCellValue('I6', 'STATUS');
		$sheet->getStyle('I6:N6')->getAlignment()->setHorizontal('center');

		$sheet->setCellValue('A7', 'NO.');
		$sheet->setCellValue('B7', 'PRODI');
		$sheet->setCellValue('C7', 'JENJANG');
		$sheet->setCellValue('D7', 'SEMESTER');
		$sheet->setCellValue('E7', 'KELAS');
		$sheet->setCellValue('F7', 'JML. MAHASISWA');
		$sheet->setCellValue('G7', 'L');
		$sheet->setCellValue('H7', 'LP');
		$sheet->setCellValue('I7', 'CT');
		$sheet->setCellValue('J7', 'ML');
		$sheet->setCellValue('K7', 'MD');
		$sheet->setCellValue('L7', 'DO');
		$sheet->setCellValue('M7', 'NAMA MAHASISWA');
		$sheet->setCellValue('N7', 'NIM');
		$sheet->setCellValue('O7', 'TAHUN');
		$sheet->getStyle('N7:O7')->getAlignment()->setHorizontal('center');
		$sheet->setCellValue('P7', 'KET.');

		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A6:P6')->applyFromArray($styleArray);
		$sheet ->getStyle('A7:P7')->applyFromArray($styleArray);

		$no=1;
		$cell = 8;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->getStyle('A'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('B'.$cell, $row->prodi);
			$sheet->setCellValue('C'.$cell, $row->jenjang);
			$sheet->getStyle('C'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('D'.$cell, $row->semester);
			$sheet->getStyle('D'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('E'.$cell, $row->kelas);
			$sheet->setCellValue('F'.$cell, $row->jumlah_mahasiswa);
			$sheet->getStyle('F'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('G'.$cell, $row->status_l);
			$sheet->setCellValue('H'.$cell, $row->status_lp);
			$sheet->setCellValue('I'.$cell, $row->status_ct);
			$sheet->setCellValue('J'.$cell, $row->status_ml);
			$sheet->setCellValue('K'.$cell, $row->status_md);
			$sheet->setCellValue('L'.$cell, $row->status_do);
			$sheet->setCellValue('M'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('N'.$cell, $row->nim);
			$sheet->getStyle('N'.$cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$cell, $row->tahun);
			$sheet->getStyle('O'.$cell)->getAlignment()->setHorizontal('center');

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'.$cell.':P'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Rekapitulasi Menu F3.xlsx"');
		$writer->save('php://output');
	}
}
