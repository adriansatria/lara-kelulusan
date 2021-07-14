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
		return view('report_f2.index', ['title' => 'Report F2','detail' => 'Master Data Report F2', 'f2s' => $f2s]);
	}

	public function import(Request $request) {
        try {
			\Excel::import(new ImportReportF2S, $request->import_file);
			Session::flash('sukses','Data Imported Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }

		return Back();
	}

	public function year(Request $request)
	{
		if($request->input('year') == ''){
			$f2s = F2s_model::all();
			return view('report_f2.index', ['title' => 'Report F2','detail' => 'Master Data Report F2', 'f2s' => $f2s]);

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

	public function export()
	{
		$result = F2s_model::all();

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
		$sheet->getColumnDimension('O')->setAutoSize(true);
		$sheet->getColumnDimension('P')->setAutoSize(true);
		$sheet->getColumnDimension('Q')->setAutoSize(true);
		$sheet->getColumnDimension('R')->setAutoSize(true);
		$sheet->getColumnDimension('S')->setAutoSize(true);

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
		$sheet->setCellValue('P6', 'BAHASA INGGRIS KOMUNIKASI 3');
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
			$sheet->setCellValue('P'.$cell, $row->bahasa_inggris_komunikasi3);
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
		header('Content-Disposition: attachment;filename="Master Data F2.xlsx"');
		$writer->save('php://output');
	}
}