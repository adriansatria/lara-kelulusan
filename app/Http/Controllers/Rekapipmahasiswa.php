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

		$ip1_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s1'), 2);
		$ip1_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s1');
		$ip1_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s1');
		$ip1_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s1'), 2);

		$ip2_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s2'), 2);
		$ip2_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s2');
		$ip2_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s2');
		$ip2_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s2'), 2);

		$ip3_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s3'), 2);
		$ip3_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s3');
		$ip3_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s3');
		$ip3_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s3'), 2);

		$ip4_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s4'), 2);
		$ip4_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s4');
		$ip4_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s4');
		$ip4_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s4'), 2);

		$ip5_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s5'), 2);
		$ip5_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s5');
		$ip5_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s5');
		$ip5_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s5'), 2);

		$ip6_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s6'), 2);
		$ip6_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s6');
		$ip6_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s6');
		$ip6_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s6'), 2);

		$ip7_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s7'), 2);
		$ip7_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s7');
		$ip7_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s7');
		$ip7_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s7'), 2);

		$ip8_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ip_s8'), 2);
		$ip8_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ip_s8');
		$ip8_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ip_s8');
		$ip8_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ip_s8'), 2);

		$ipk_sum = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->sum('ipk'), 2);
		$ipk_max = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->max('ipk');
		$ipk_min = Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->min('ipk');
		$ipk_avg = number_format(Rekapipmahasiswa_model::where('tahun', $year)->where('prodi', $prodi)->avg('ipk'), 2);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Daftar Laporan Akhir Semester');
		$sheet->mergeCells('A1:R1');
		$sheet->setCellValue('A1', 'DAFTAR LAPORAN AKHIR SEMESTER GANJIL');
		$sheet->getStyle('A1:R1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A1:R1')->getFont()->setBold(true);
		$sheet->mergeCells('A2:R2');
		$sheet->setCellValue('A2', 'PROGRAM: REGULAR PAGI');
		$sheet->getStyle('A2:R2')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A2:R2')->getFont()->setBold(true);
		$sheet->mergeCells('A3:R3');
		$sheet->setCellValue('A3', 'JURUSAN TEKNIK TEKNIK INFORMATIKA DAN KOMPUTER');
		$sheet->getStyle('A3:R3')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A3:R3')->getFont()->setBold(true);
		$sheet->mergeCells('A4:R4');
		$sheet->setCellValue('A4', 'PROGRAM STUDI '. $prodi);
		$sheet->getStyle('A4:R4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:R4')->getFont()->setBold(true);
		$sheet->mergeCells('A5:R5');
		$sheet->setCellValue('A5', 'SEMESTER 1 (SATU)');
		$sheet->getStyle('A5:R5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A5:R5')->getFont()->setBold(true);
		$sheet->mergeCells('A6:R6');
		$sheet->setCellValue('A6', 'TAHUN AKADEMIK ' . $year);
		$sheet->getStyle('A6:R6')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A6:R6')->getFont()->setBold(true);

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

		$sheet->mergeCells('F8:L8');
		$sheet->setCellValue('F8', 'IP SMT');
		$sheet->getStyle('F8:L8')->getAlignment()->setHorizontal('center');

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
		$sheet->setCellValue('D8', 'NIM');
		$sheet->getStyle('D8:D9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('E9', 'IP SMT 1');
		$sheet->setCellValue('F9', 'IP SMT 2');
		$sheet->setCellValue('G9', 'IP SMT 3');
		$sheet->setCellValue('H9', 'IP SMT 4');
		$sheet->setCellValue('I9', 'IP SMT 5');
		$sheet->setCellValue('J9', 'IP SMT 6');
		$sheet->setCellValue('K9', 'IP SMT 7');
		$sheet->setCellValue('L9', 'IP SMT 8');
		$sheet->mergeCells('M8:M9');
		$sheet->setCellValue('M8', 'IPK');
		$sheet->getStyle('M8:M9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->mergeCells('N8:R8');
		$sheet->setCellValue('N8', 'STATUS');
		$sheet->getStyle('N8:R8')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('N9', ' L ');
		$sheet->getStyle('N9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('O9', ' LP ');
		$sheet->getStyle('O9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('P9', ' DO ');
		$sheet->getStyle('P9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('Q9', ' CA ');
		$sheet->getStyle('Q9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->setCellValue('R9', ' MD ');
		$sheet->getStyle('R9')->getAlignment()->setHorizontal('center')->setVertical('center');
		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
	
		$sheet ->getStyle('A8:R8')->applyFromArray($styleArray);
		$sheet ->getStyle('A9:R9')->applyFromArray($styleArray);
		$no=1;
		$cell = 10;
		$jml_L = 0;
		$jml_LP = 0;
		$jml_DO = 0;
		$jml_CA = 0;
		$jml_MD = 0;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
			$sheet->setCellValue('B'.$cell, $row->kelas);
			$sheet->setCellValue('C'.$cell, $row->nama_mahasiswa);
			$sheet->setCellValue('D'.$cell, $row->nim);
			$sheet->setCellValue('E'.$cell, $row->ip_s1);
			$sheet->setCellValue('F'.$cell, $row->ip_s2);
			$sheet->setCellValue('G'.$cell, $row->ip_s3);
			$sheet->setCellValue('H'.$cell, $row->ip_s4);
			$sheet->setCellValue('I'.$cell, $row->ip_s5);
			$sheet->setCellValue('J'.$cell, $row->ip_s6);
			$sheet->setCellValue('K'.$cell, $row->ip_s7);
			$sheet->setCellValue('L'.$cell, $row->ip_s8);
			$sheet->setCellValue('M'.$cell, $row->ipk);

			if($row->status == 'L') {
				$sheet->setCellValue('N'.$cell, '1');
				$jml_L++;
			}
			if($row->status == 'LP') {
				$sheet->setCellValue('O'.$cell, '1');
				$jml_LP++;
			}
			if($row->status == 'DO') {
				$sheet->setCellValue('P'.$cell, '1');
				$jml_DO++;
			}
			if($row->status == 'CA') {
				$sheet->setCellValue('Q'.$cell, '1');
				$jml_CA++;
			}
			if($row->status == 'MD') {
				$sheet->setCellValue('R'.$cell, '1');
				$jml_MD++;
			}

			$styleArray = array(
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => array('argb' => '000'),
					),
				),
			);
		
			$sheet ->getStyle('A'.$cell.':R'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$cellAbove1 = $cell + 2;
		$cellAbove2 = $cell + 3;
		$cellAbove3 = $cell + 4;
		$cellAbove4 = $cell + 5;
		$cellAbove5 = $cell + 6;
		$cellAbove6 = $cell + 7;
		$cellAbove7 = $cell + 8;
		$cellAbove8 = $cell + 9;
		$cellAbove9 = $cell + 10;
		$cellAbove10 = $cell + 11;

		$sheet->mergeCells('A'.$cell.':D'.$cell);
		$sheet->setCellValue('A'.$cell, 'JUMLAH');
		$sheet->getStyle('A'.$cell.':D'.$cell)->getAlignment()->setHorizontal('center')->setVertical('center');

		$sheet->setCellValue('E'.$cell, $ip1_sum);
		$sheet->setCellValue('F'.$cell, $ip2_sum);
		$sheet->setCellValue('G'.$cell, $ip3_sum);
		$sheet->setCellValue('H'.$cell, $ip4_sum);
		$sheet->setCellValue('I'.$cell, $ip5_sum);
		$sheet->setCellValue('J'.$cell, $ip6_sum);
		$sheet->setCellValue('K'.$cell, $ip7_sum);
		$sheet->setCellValue('L'.$cell, $ip8_sum);
		$sheet->setCellValue('M'.$cell, $ipk_sum);
		$sheet->setCellValue('N'.$cell, $jml_L);
		$sheet->setCellValue('O'.$cell, $jml_LP);
		$sheet->setCellValue('P'.$cell, $jml_DO);
		$sheet->setCellValue('Q'.$cell, $jml_CA);
		$sheet->setCellValue('R'.$cell, $jml_MD);
		$sheet ->getStyle('A'.$cell.':R'.$cell)->applyFromArray($styleArray);

		$sheet->mergeCells('A'.$cellAbove1.':C'.$cellAbove3);
		$sheet->setCellValue('A'.$cellAbove1, 'IP & IPK');
		$sheet->getStyle('A'.$cellAbove1.':C'.$cellAbove3)->getAlignment()->setHorizontal('center')->setVertical('center');

		$sheet->setCellValue('D'.$cellAbove1, 'TERENDAH');
		$sheet->setCellValue('E'.$cellAbove1, $ip1_min);
		$sheet->setCellValue('F'.$cellAbove1, $ip2_min);
		$sheet->setCellValue('G'.$cellAbove1, $ip3_min);
		$sheet->setCellValue('H'.$cellAbove1, $ip4_min);
		$sheet->setCellValue('I'.$cellAbove1, $ip5_min);
		$sheet->setCellValue('J'.$cellAbove1, $ip6_min);
		$sheet->setCellValue('K'.$cellAbove1, $ip7_min);
		$sheet->setCellValue('L'.$cellAbove1, $ip8_min);
		$sheet->setCellValue('M'.$cellAbove1, $ipk_min);

		$sheet->setCellValue('D'.$cellAbove2, 'TERTINGGI');
		$sheet->setCellValue('E'.$cellAbove2, $ip1_max);
		$sheet->setCellValue('F'.$cellAbove2, $ip2_max);
		$sheet->setCellValue('G'.$cellAbove2, $ip3_max);
		$sheet->setCellValue('H'.$cellAbove2, $ip4_max);
		$sheet->setCellValue('I'.$cellAbove2, $ip5_max);
		$sheet->setCellValue('J'.$cellAbove2, $ip6_max);
		$sheet->setCellValue('K'.$cellAbove2, $ip7_max);
		$sheet->setCellValue('L'.$cellAbove2, $ip8_max);
		$sheet->setCellValue('M'.$cellAbove2, $ipk_max);

		$sheet->setCellValue('D'.$cellAbove3, 'RATA-RATA');
		$sheet->setCellValue('E'.$cellAbove3, $ip1_avg);
		$sheet->setCellValue('F'.$cellAbove3, $ip2_avg);
		$sheet->setCellValue('G'.$cellAbove3, $ip3_avg);
		$sheet->setCellValue('H'.$cellAbove3, $ip4_avg);
		$sheet->setCellValue('I'.$cellAbove3, $ip5_avg);
		$sheet->setCellValue('J'.$cellAbove3, $ip6_avg);
		$sheet->setCellValue('K'.$cellAbove3, $ip7_avg);
		$sheet->setCellValue('L'.$cellAbove3, $ip8_avg);
		$sheet->setCellValue('M'.$cellAbove3, $ipk_avg);

		$sheet->setCellValue('A'.$cellAbove4, 'L');
		$sheet->getStyle('A'.$cellAbove4)->getAlignment()->setHorizontal('right');
		$sheet->setCellValue('A'.$cellAbove5, 'LP');
		$sheet->getStyle('A'.$cellAbove5)->getAlignment()->setHorizontal('right');
		$sheet->setCellValue('A'.$cellAbove6, 'CT');
		$sheet->getStyle('A'.$cellAbove6)->getAlignment()->setHorizontal('right');
		$sheet->setCellValue('A'.$cellAbove7, 'ML');
		$sheet->getStyle('A'.$cellAbove7)->getAlignment()->setHorizontal('right');
		$sheet->setCellValue('A'.$cellAbove8, 'MD');
		$sheet->getStyle('A'.$cellAbove8)->getAlignment()->setHorizontal('right');
		$sheet->setCellValue('A'.$cellAbove9, 'DO');
		$sheet->getStyle('A'.$cellAbove9)->getAlignment()->setHorizontal('right');

		$sheet->setCellValue('B'.$cellAbove4, ': Lulus');
		$sheet->setCellValue('B'.$cellAbove5, ': Lulus Percobaan');
		$sheet->setCellValue('B'.$cellAbove6, ': Cuti');
		$sheet->setCellValue('B'.$cellAbove7, ': Mengulang');
		$sheet->setCellValue('B'.$cellAbove8, ': Mengundurkan Diri');
		$sheet->setCellValue('B'.$cellAbove9, ': Drop Out');

		$sheet->mergeCells('J'.$cellAbove5.':L'.$cellAbove5);
		$sheet->mergeCells('J'.$cellAbove6.':L'.$cellAbove6);
		$sheet->mergeCells('J'.$cellAbove9.':L'.$cellAbove9);
		$sheet->mergeCells('J'.$cellAbove10.':L'.$cellAbove10);
		$sheet->setCellValue('J'.$cellAbove5, 'Depok, ');
		$sheet->setCellValue('J'.$cellAbove6, 'Ketua Jurusan TIK');
		$sheet->setCellValue('J'.$cellAbove9, 'Mauldy Laya, S.Kom., M.Kom');
		$sheet->setCellValue('J'.$cellAbove10, 'NIP. 19780211 200912 1 003');

		$sheet ->getStyle('A'.$cellAbove1.':M'.$cellAbove3)->applyFromArray($styleArray);

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Daftar Laporan Akhir Semester.xlsx"');
		$writer->save('php://output');
	}
}