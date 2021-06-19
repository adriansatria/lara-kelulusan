<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F2s_model;
use App\imports\ImportReportF2S;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Session;

class F2s extends Controller
{
    public function index(){
		$f2s = F2s_model::all();
		return view('report_f2.index', ['title' => 'Report F2','detail' => 'Rekapitulasi IP Mahasiswa', 'f2s' => $f2s]);
	}

	public function import(Request $request) {
		\Excel::import(new ImportReportF2S, $request->import_file);
		Session::flash('sukses','Data Siswa Berhasil Diimport!');

		return Back();
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$f2s = F2s_model::all();
			return view('report_f2.index', ['title' => 'Report F2','detail' => 'Rekapitulasi IP Mahasiswa', 'f2s' => $f2s]);

		} else{
			$year = $request->input('year');
			$result = F2s_model::where('tahun', $year)->get();

			$ip1_max = F2s_model::where('tahun', $year)->max('ip_s1');
			$ip1_min = F2s_model::where('tahun', $year)->min('ip_s1');
			$ip1_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s1'), 2);

			$ip1_max = F2s_model::where('tahun', $year)->max('ip_s1');
			$ip1_min = F2s_model::where('tahun', $year)->min('ip_s1');
			$ip1_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s1'), 2);

			$ip2_max = F2s_model::where('tahun', $year)->max('ip_s2');
			$ip2_min = F2s_model::where('tahun', $year)->min('ip_s2');
			$ip2_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s2'), 2);

			$ip3_max = F2s_model::where('tahun', $year)->max('ip_s3');
			$ip3_min = F2s_model::where('tahun', $year)->min('ip_s3');
			$ip3_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s3'), 2);

			$ip4_max = F2s_model::where('tahun', $year)->max('ip_s4');
			$ip4_min = F2s_model::where('tahun', $year)->min('ip_s4');
			$ip4_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s4'), 2);

			$ip5_max = F2s_model::where('tahun', $year)->max('ip_s5');
			$ip5_min = F2s_model::where('tahun', $year)->min('ip_s5');
			$ip5_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s5'), 2);

			$ip6_max = F2s_model::where('tahun', $year)->max('ip_s6');
			$ip6_min = F2s_model::where('tahun', $year)->min('ip_s6');
			$ip6_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s6'), 2);

			$ip7_max = F2s_model::where('tahun', $year)->max('ip_s7');
			$ip7_min = F2s_model::where('tahun', $year)->min('ip_s7');
			$ip7_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s7'), 2);

			$ip8_max = F2s_model::where('tahun', $year)->max('ip_s8');
			$ip8_min = F2s_model::where('tahun', $year)->min('ip_s8');
			$ip8_avg = number_format(F2s_model::where('tahun', $year)->avg('ip_s8'), 2);

			$ipk_max = F2s_model::where('tahun', $year)->max('ipk');
			$ipk_min = F2s_model::where('tahun', $year)->min('ipk');
			$ipk_avg = number_format(F2s_model::where('tahun', $year)->avg('ipk'), 2);
			return view('report_f2.year', ['title' => 'Report F2 ' . $year,'detail' => 'Rekapitulasi IP Mahasiswa','report_f2' => $result, 'ipk_max' => $ipk_max,'ipk_min' => $ipk_min, 'ipk_avg' => $ipk_avg, 'ip1_max' => $ip1_max,'ip1_min' => $ip1_min, 'ip1_avg' => $ip1_avg, 'ip2_max' => $ip2_max,'ip2_min' => $ip2_min, 'ip2_avg' => $ip2_avg, 'ip3_max' => $ip3_max,'ip3_min' => $ip3_min, 'ip3_avg' => $ip3_avg, 'ip4_max' => $ip4_max,'ip4_min' => $ip4_min, 'ip4_avg' => $ip4_avg, 'ip5_max' => $ip5_max,'ip5_min' => $ip5_min, 'ip5_avg' => $ip5_avg, 'ip6_max' => $ip6_max,'ip6_min' => $ip6_min, 'ip6_avg' => $ip6_avg, 'ip7_max' => $ip7_max,'ip7_min' => $ip7_min, 'ip7_avg' => $ip7_avg, 'ip8_max' => $ip8_max,'ip8_min' => $ip8_min, 'ip8_avg' => $ip8_avg]);
		}
	}

	public function create(){
		return view('report_f2.create', ['title' => 'Form Add Data Report F2', 'detail' => '']);
	}

	public function store(Request $request){

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
			'tahun' => 'required'
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
			'tahun.required' => 'Data must not be empty!'

		]);

		F2s_model::create($validateData);

		return redirect()->route('f2s')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = F2s_model::find($id);
		return view('report_f2.edit', ['title' => 'Edit Data Report F2', 'detail' => '', 'report_f2' => $result]);
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
			'bahasa_inggris_komunikasi3' => 'required',
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
			'bahasa_inggris_komunikasi3.required' => 'Data must not be empty!',
			'k2_2.required' => 'Data must not be empty!',
			'tugas_akhir.required' => 'Data must not be empty!',
			'k6.required' => 'Data must not be empty!'
		]);

		F2s_model::where('id',$id)->update($validateData);

		return redirect()->route('f2s')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = F2s_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('f2s')
		->with('delete','Data deleted successfully');

	}

	public function export(Request $request)
	{
		$year = $request->input('year');
		$result = F2s_model::where('tahun', $year)->get();

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
		$sheet->setCellValue('A4', 'PROGRAM STUDI TEKNIK INFORMATIKA');
		$sheet->getStyle('A4:O4')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A4:O4')->getFont()->setBold(true);
		$sheet->mergeCells('A5:O5');
		$sheet->setCellValue('A5', 'SEMESTER 1 (SATU)');
		$sheet->getStyle('A5:O5')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A5:O5')->getFont()->setBold(true);
		$sheet->mergeCells('A6:O6');
		$sheet->setCellValue('A6', 'TAHUN AKADEMIK ' . $year . '/' . ($year+1));
		$sheet->getStyle('A6:O6')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A6:O6')->getFont()->setBold(true);

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
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Daftar Laporan Akhir Semester.xlsx"');
		$writer->save('php://output');
	}
}