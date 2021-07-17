<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekapipmahasiswa_model;
use App\Models\Mahasiswa_Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekapipmahasiswa extends Controller
{
    public function index(){
		$Rekapipmahasiswa = Rekapipmahasiswa_model::all();
		return view('report_f2.rekapipmahasiswa', ['title' => 'Report F2','detail' => 'Rekapitulasi IP Mahasiswa', 'ipk_max' => '','ipk_min' => '', 'ipk_avg' => '', 'ip1_max' => '','ip1_min' => '', 'ip1_avg' => '', 'ip2_max' => '','ip2_min' => '', 'ip2_avg' => '', 'ip3_max' => '','ip3_min' => '', 'ip3_avg' => '', 'ip4_max' => '','ip4_min' => '', 'ip4_avg' => '', 'ip5_max' => '','ip5_min' => '', 'ip5_avg' => '', 'ip6_max' => '','ip6_min' => '', 'ip6_avg' => '', 'ip7_max' => '','ip7_min' => '', 'ip7_avg' => '', 'ip8_max' => '','ip8_min' => '', 'ip8_avg' => '', 'f2s' => $Rekapipmahasiswa, 'year' => '', 'prodi' => '']);
	}

	public function year(Request $request)
	{
			$year = $request->input('year');
			$yearFix = str_replace("-", "/", $year);
			$prodi = $request->input('prodi');
			$result = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->get();

			$ip1_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s1');
			$ip1_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s1');
			$ip1_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s1'), 2);

			$ip1_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s1');
			$ip1_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s1');
			$ip1_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s1'), 2);

			$ip2_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s2');
			$ip2_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s2');
			$ip2_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s2'), 2);

			$ip3_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s3');
			$ip3_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s3');
			$ip3_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s3'), 2);

			$ip4_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s4');
			$ip4_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s4');
			$ip4_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s4'), 2);

			$ip5_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s5');
			$ip5_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s5');
			$ip5_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s5'), 2);

			$ip6_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s6');
			$ip6_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s6');
			$ip6_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s6'), 2);

			$ip7_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s7');
			$ip7_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s7');
			$ip7_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s7'), 2);

			$ip8_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ip_s8');
			$ip8_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ip_s8');
			$ip8_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ip_s8'), 2);

			$ipk_max = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->max('ipk');
			$ipk_min = Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->min('ipk');
			$ipk_avg = number_format(Rekapipmahasiswa_model::where('tahun', $yearFix)->where('prodi', $prodi)->avg('ipk'), 2);
			return view('report_f2.rekapipmahasiswa', ['title' => 'Report F2 ' . $yearFix. ' - '.$prodi,'detail' => 'Rekapitulasi IP Mahasiswa','f2s' => $result, 'ipk_max' => $ipk_max,'ipk_min' => $ipk_min, 'ipk_avg' => $ipk_avg, 'ip1_max' => $ip1_max,'ip1_min' => $ip1_min, 'ip1_avg' => $ip1_avg, 'ip2_max' => $ip2_max,'ip2_min' => $ip2_min, 'ip2_avg' => $ip2_avg, 'ip3_max' => $ip3_max,'ip3_min' => $ip3_min, 'ip3_avg' => $ip3_avg, 'ip4_max' => $ip4_max,'ip4_min' => $ip4_min, 'ip4_avg' => $ip4_avg, 'ip5_max' => $ip5_max,'ip5_min' => $ip5_min, 'ip5_avg' => $ip5_avg, 'ip6_max' => $ip6_max,'ip6_min' => $ip6_min, 'ip6_avg' => $ip6_avg, 'ip7_max' => $ip7_max,'ip7_min' => $ip7_min, 'ip7_avg' => $ip7_avg, 'ip8_max' => $ip8_max,'ip8_min' => $ip8_min, 'ip8_avg' => $ip8_avg, 'year' => $yearFix, 'prodi' => $prodi, 'yearAwal' => $year]);
	}

	public function create(){
		$mahasiswa = Mahasiswa_Model::all();
		return view('report_f2.create', ['title' => 'Form Add Data Report F2', 'detail' => '', 'mahasiswa' => $mahasiswa]);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'kelas' => 'required',
			'nim' => 'required',
			'nama_mahasiswa' => 'required',
			'ip_s1' => 'required|numeric|between:0,99.99',
			'ip_s2' => 'required|numeric|between:0,99.99',
			'ip_s3' => 'required|numeric|between:0,99.99',
			'ip_s4' => 'required|numeric|between:0,99.99',
			'ip_s5' => 'required|numeric|between:0,99.99',
			'ip_s6' => 'required|numeric|between:0,99.99',
			'ip_s7' => 'required|numeric|between:0,99.99',
			'ip_s8' => 'required|numeric|between:0,99.99',
			'ipk' => 'required|numeric|between:0,99.99',
			'status' => 'required',
			'prodi' => 'required',
			'tahun' => 'required'
		],
		[
			'kelas.required' => 'Data must not be empty!',
			'nim.required' => 'Data must not be empty!',
			'nama_mahasiswa.required' => 'Data must not be empty!',
			'ip_s1.required' => 'Data must not be empty!',
			'ip_s2.required' => 'Data must not be empty!',
			'ip_s3.required' => 'Data must not be empty!',
			'ip_s4.required' => 'Data must not be empty!',
			'ip_s5.required' => 'Data must not be empty!',
			'ip_s6.required' => 'Data must not be empty!',
			'ip_s7.required' => 'Data must not be empty!',
			'ip_s8.required' => 'Data must not be empty!',
			'ipk.required' => 'Data must not be empty!',
			'status.required' => 'Data must not be empty!',
			'prodi.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		$nama_mahasiswa = \DB::table('mahasiswa')
							->select('mahasiswa.nama as nama_mahasiswa')
							->where('mahasiswa.nim', '=', $validateData["nim"])
							->limit(1)
							->get()
                        	->toArray();

        $validateData["nama_mahasiswa"] = $nama_mahasiswa[0]->nama_mahasiswa;

		Rekapipmahasiswa_model::create($validateData);

		return redirect()->route('rekapipmahasiswa')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Rekapipmahasiswa_model::find($id);
		$mahasiswa = Mahasiswa_Model::all();
		return view('report_f2.editrekap', ['title' => 'Edit Data Report F2', 'detail' => '', 'report_f2' => $result, 'mahasiswa' => $mahasiswa]);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'kelas' => 'required',
			'nama_mahasiswa' => 'required',
			'nim' => 'required',
			'ip_s1' => 'required|numeric|between:0,99.99',
			'ip_s2' => 'required|numeric|between:0,99.99',
			'ip_s3' => 'required|numeric|between:0,99.99',
			'ip_s4' => 'required|numeric|between:0,99.99',
			'ip_s5' => 'required|numeric|between:0,99.99',
			'ip_s6' => 'required|numeric|between:0,99.99',
			'ip_s7' => 'required|numeric|between:0,99.99',
			'ip_s8' => 'required|numeric|between:0,99.99',
			'ipk' => 'required|numeric|between:0,99.99',
			'status' => 'required',
			'tahun' => 'required',
			'prodi' => 'required'
		],
		[
			'kelas.required' => 'Data must not be empty!',
			'nama_mahasiswa.required' => 'Data must not be empty!',
			'nim.Dequired' => 'Data must not be empty!',
			'ip_s1.required' => 'Data must not be empty!',
			'ip_s2.required' => 'Data must not be empty!',
			'ip_s3.required' => 'Data must not be empty!',
			'ip_s4.required' => 'Data must not be empty!',
			'ip_s5.required' => 'Data must not be empty!',
			'ip_s6.required' => 'Data must not be empty!',
			'ip_s7.required' => 'Data must not be empty!',
			'ip_s8.required' => 'Data must not be empty!',
			'ipk.required' => 'Data must not be empty!',
			'status.required' => 'Data must not be empty!',
			'prodi.required' => 'Data must not be empty!',
			'tahun.required' => 'Data must not be empty!'

		]);

		$nama_mahasiswa = \DB::table('mahasiswa')
							->select('mahasiswa.nama as nama_mahasiswa')
							->where('mahasiswa.nim', '=', $validateData["nim"])
							->limit(1)
							->get()
                        	->toArray();

        $validateData["nama_mahasiswa"] = $nama_mahasiswa[0]->nama_mahasiswa;

		Rekapipmahasiswa_model::where('id',$id)->update($validateData);

		return redirect()->route('rekapipmahasiswa')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Rekapipmahasiswa_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('rekapipmahasiswa')
		->with('delete','Data deleted successfully');

	}

	public function export($year, $prodi)
	{
		$year = str_replace("-", "/", $year);
		$result = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->get();

		$ip1_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s1');
		$ip1_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s1');
		$ip1_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s1'), 2);

		$ip2_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s2');
		$ip2_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s2');
		$ip2_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s2'), 2);

		$ip3_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s3');
		$ip3_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s3');
		$ip3_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s3'), 2);

		$ip4_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s4');
		$ip4_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s4');
		$ip4_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s4'), 2);

		$ip5_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s5');
		$ip5_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s5');
		$ip5_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s5'), 2);

		$ip6_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s6');
		$ip6_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s6');
		$ip6_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s6'), 2);

		$ip7_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s7');
		$ip7_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s7');
		$ip7_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s7'), 2);

		$ip8_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s8');
		$ip8_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s8');
		$ip8_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s8'), 2);

		$ipk_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ipk');
		$ipk_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ipk');
		$ipk_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ipk'), 2);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Daftar Laporan Akhir Semester');
		$sheet->mergeCells('A1:O1');
		$sheet->setCellValue('A1', 'DAFTAR LAPORAN AKHIR SEMESTER GANJIL');
		$sheet->getStyle('A1:O1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:O1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:O2');
		$sheet->setCellValue('A2', 'PROGRAM KERJASAMA DENGAN STJJ');
		$sheet->getStyle('A2:O2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:O2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:O3');
		$sheet->setCellValue('A3', 'JURUSAN TEKNIK INFORMATIKA DAN KOMPUTER');
		$sheet->getStyle('A3:O3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:O3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:O4');
		$sheet->setCellValue('A4', 'PROGRAM STUDI '. $prodi);
		$sheet->getStyle('A4:O4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:O4')->getFont()->setBold(true);
		$sheet->mergeCells('A5:O5');
		$sheet->setCellValue('A5', 'SEMESTER 1 (SATU)');
		$sheet->getStyle('A5:O5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A5:O5')->getFont()->setBold(true);
		$sheet->mergeCells('A6:O6');
		$sheet->setCellValue('A6', 'TAHUN AKADEMIK ' . $year);
		$sheet->getStyle('A6:O6')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A6:O6')->getFont()->setBold(true);

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

		$sheet->mergeCells('F8:M8');
		$sheet->setCellValue('F8', 'IP SMT');
		$sheet->getStyle('F8:M8')->getAlignment()->setHorizontal('center');

		$sheet->mergeCells('A8:A9');
		$sheet->setCellValue('A8', 'NO.');
		$sheet->getStyle('A8:A9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('B8:B9');
		$sheet->setCellValue('B8', 'KELAS');
		$sheet->getStyle('B8:B9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('C8:C9');
		$sheet->setCellValue('C8', 'NAMA MAHASISWA');
		$sheet->getStyle('C8:C9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('D8:D9');
		$sheet->setCellValue('D8', 'MATA KULIAH');
		$sheet->getStyle('D8:D9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('E8:E9');
		$sheet->setCellValue('E8', 'NIM');
		$sheet->getStyle('E8:E9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('F9', 'IP SMT 1');
		$sheet->setCellValue('G9', 'IP SMT 2');
		$sheet->setCellValue('H9', 'IP SMT 3');
		$sheet->setCellValue('I9', 'IP SMT 4');
		$sheet->setCellValue('J9', 'IP SMT 5');
		$sheet->setCellValue('K9', 'IP SMT 6');
		$sheet->setCellValue('L9', 'IP SMT 7');
		$sheet->setCellValue('M9', 'IP SMT 8');
		$sheet->mergeCells('N8:N9');
		$sheet->setCellValue('N8', 'IPK');
		$sheet->getStyle('N8:N9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('O8:O9');
		$sheet->setCellValue('O8', 'STATUS');
		$sheet->getStyle('O8:O9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A8:O8')->applyFromArray($styleArray);
		$sheet ->getStyle('A9:O9')->applyFromArray($styleArray);
		$no=1;
		$cell = 10;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->kelas);
			$sheet->setCellValue('C'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('D'.$cell, $row->mata_kuliah);
			$sheet->setCellValue('E'.$cell, $row->nim);
			$sheet->setCellValue('F'.$cell, $row->ip_s1);
			$sheet->setCellValue('G'.$cell, $row->ip_s2);
			$sheet->setCellValue('H'.$cell, $row->ip_s3);
			$sheet->setCellValue('I'.$cell, $row->ip_s4);
			$sheet->setCellValue('J'.$cell, $row->ip_s5);
			$sheet->setCellValue('K'.$cell, $row->ip_s6);
			$sheet->setCellValue('L'.$cell, $row->ip_s7);
			$sheet->setCellValue('M'.$cell, $row->ip_s8);
			$sheet->setCellValue('N'.$cell, $row->ipk);
			$sheet->setCellValue('O'.$cell, $row->status);

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'.$cell.':O'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$cellAbove1 = $cell + 1;
		$cellAbove2 = $cell + 2;
		$cellAbove3 = $cell + 3;	

		$sheet->mergeCells('A'.$cellAbove1.':D'.$cellAbove3);
		$sheet->setCellValue('A'.$cellAbove1, 'IP & IPK');
		$sheet->getStyle('A'.$cellAbove1.':D'.$cellAbove3)->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A'.$cellAbove1.':D'.$cellAbove3)->getAlignment()->setVertical('center');

		$sheet->setCellValue('E'.$cellAbove1, 'TERENDAH');
		$sheet->setCellValue('F'.$cellAbove1, $ip1_min);
		$sheet->setCellValue('G'.$cellAbove1, $ip2_min);
		$sheet->setCellValue('H'.$cellAbove1, $ip3_min);
		$sheet->setCellValue('I'.$cellAbove1, $ip4_min);
		$sheet->setCellValue('J'.$cellAbove1, $ip5_min);
		$sheet->setCellValue('K'.$cellAbove1, $ip6_min);
		$sheet->setCellValue('L'.$cellAbove1, $ip7_min);
		$sheet->setCellValue('M'.$cellAbove1, $ip8_min);
		$sheet->setCellValue('N'.$cellAbove1, $ipk_min);

		$sheet->setCellValue('E'.$cellAbove2, 'TERTINGGI');
		$sheet->setCellValue('F'.$cellAbove2, $ip1_max);
		$sheet->setCellValue('G'.$cellAbove2, $ip2_max);
		$sheet->setCellValue('H'.$cellAbove2, $ip3_max);
		$sheet->setCellValue('I'.$cellAbove2, $ip4_max);
		$sheet->setCellValue('J'.$cellAbove2, $ip5_max);
		$sheet->setCellValue('K'.$cellAbove2, $ip6_max);
		$sheet->setCellValue('L'.$cellAbove2, $ip7_max);
		$sheet->setCellValue('M'.$cellAbove2, $ip8_max);
		$sheet->setCellValue('N'.$cellAbove2, $ipk_max);

		$sheet->setCellValue('E'.$cellAbove3, 'RATA-RATA');
		$sheet->setCellValue('F'.$cellAbove3, $ip1_avg);
		$sheet->setCellValue('G'.$cellAbove3, $ip2_avg);
		$sheet->setCellValue('H'.$cellAbove3, $ip3_avg);
		$sheet->setCellValue('I'.$cellAbove3, $ip4_avg);
		$sheet->setCellValue('J'.$cellAbove3, $ip5_avg);
		$sheet->setCellValue('K'.$cellAbove3, $ip6_avg);
		$sheet->setCellValue('L'.$cellAbove3, $ip7_avg);
		$sheet->setCellValue('M'.$cellAbove3, $ip8_avg);
		$sheet->setCellValue('N'.$cellAbove3, $ipk_avg);

		$sheet ->getStyle('A'.$cellAbove1.':N'.$cellAbove3)->applyFromArray($styleArray);

		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Daftar Laporan Akhir Semester.xlsx"');
		$writer->save('php://output');
	}
}