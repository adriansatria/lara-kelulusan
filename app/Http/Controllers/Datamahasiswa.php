<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluations_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa_Model;
use Illuminate\Support\Facades\DB;

use Session;

class Datamahasiswa extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa_Model::all();
        return view('datamahasiswa.datamahasiswa', ['title' => 'Data Mahasiswa', 'detail' => 'Rekapitulasi data mahasiswa', 'mahasiswa' => $mahasiswa, 'year' => '']);
    }

    public function year(Request $request) {
        $year = $request->input('year');
        $yearFix = str_replace("-", "/", $year);
		$mahasiswa = Mahasiswa_Model::where('tahun_akademik', $yearFix)->get();
		return view('datamahasiswa.datamahasiswa', ['title' => 'Data mahasiswa ' . $yearFix, 'detail' => 'Rekapitulasi data mahasiswa', 'mahasiswa' => $mahasiswa, 'year' => $yearFix, 'yearAwal' => $year]);

    }

    public function import(Request $request) {
        try {
            \Excel::import(new MahasiswaImport, $request->import_file);
            Session::flash('sukses','Data Imported Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        
        return back();
    }

    public function export($year) {
        $year = str_replace("-", "/", $year);
        $result = Mahasiswa_Model::where('tahun_akademik', $year)->get();
        // return \Excel::download(new MahasiswaExport, 'Menu Data Mahasiswa.xlsx');
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
        // $sheet->setAutoSize(true);
		$sheet->setTitle('Laporan Data Mahasiswa');
		$sheet->mergeCells('A1:O1');
		$sheet->setCellValue('A1', 'BUKU INDUK MAHASISWA');
		$sheet->getStyle('A1:O1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:O1')->getFont()->setBold(true)->setSize(18);
        $sheet->mergeCells('A2:O2');
        $sheet->setCellValue('A2', 'POLITEKNIK NEGERI JAKARTA');
		$sheet->getStyle('A2:O2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2:O2')->getFont()->setBold(true)->setSize(18);
        $sheet->mergeCells('A3:D3');
        $sheet->setCellValue('A3', 'ANGKATAN : '.$year);
        $sheet->getStyle('A3')->getFont()->setBold(true);
        $sheet->getStyle('A4:O4')->getFont()->setBold(true);
        $sheet->getStyle('A5:O5')->getFont()->setBold(true);
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

        $styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
        
        $sheet ->getStyle('A4:N4')->applyFromArray($styleArray);
		$sheet ->getStyle('A5:N5')->applyFromArray($styleArray);

		// $sheet->mergeCells('A4:A5');
		$sheet->setCellValue('A5', 'NO.');
		$sheet->getStyle('A5')->getAlignment()->setHorizontal('center')->setVertical('center');
		// $sheet->mergeCells('B4:B5');
		$sheet->setCellValue('B5', 'NIM');
		$sheet->getStyle('B5')->getAlignment()->setHorizontal('center')->setVertical('center');
		// $sheet->mergeCells('C4:C5');
		$sheet->mergeCells('C4:G4');
        $sheet->setCellValue('C4', 'Detail');
		$sheet->getStyle('C4:G4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('C5', 'Nama');
        $sheet->setCellValue('D5', 'Tempat lahir');
        $sheet->setCellValue('E5', 'Tanggal lahir');
        $sheet->setCellValue('F5', 'Agama');
        $sheet->setCellValue('G5', 'Asal sekolah');
        // $sheet->mergeCells('H4:H5');
		$sheet->setCellValue('H5', 'Jenis kelamin');
		$sheet->getStyle('H5')->getAlignment()->setHorizontal('center')->setVertical('center');
        // $sheet->mergeCells('I4:I5');
		$sheet->setCellValue('I5', 'Gol. darah');
		$sheet->getStyle('I5')->getAlignment()->setHorizontal('center')->setVertical('center');
        // $sheet->mergeCells('J4:J5');
		$sheet->setCellValue('J5', 'Alamat');
		$sheet->getStyle('J5')->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->mergeCells('K4:M4');
        $sheet->setCellValue('K4', 'Detail Wali');
		$sheet->getStyle('K4:M4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('K5', 'Nama Orangtua/Wali');
        $sheet->setCellValue('L5', 'Pendidikan Terakhir');
        $sheet->setCellValue('L5', 'Pekerjaan');
        // $sheet->mergeCells('M4:M5');
		$sheet->setCellValue('M5', 'Keterangan');
		$sheet->getStyle('M5')->getAlignment()->setHorizontal('center')->setVertical('center');
        $sheet->setCellValue('N5', 'Tahun Akademik');
		$sheet->getStyle('N5')->getAlignment()->setHorizontal('center')->setVertical('center');

		$no=1;
		$cell = 6;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
            $sheet->getStyle('A'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('B'.$cell, $row->nim);
			$sheet->setCellValue('C'.$cell, $row->nama);
            $sheet->setCellValue('D'.$cell, $row->tempat_lahir);
            $sheet->setCellValue('E'.$cell, $row->tanggal_lahir);
            $sheet->setCellValue('F'.$cell, $row->agama);
            $sheet->getStyle('F'. $cell)->getAlignment()->setHorizontal('center');
            $sheet->setCellValue('G'.$cell, $row->asal_sekolah);
            $sheet->setCellValue('H'.$cell, $row->jenis_kelamin);
            $sheet->getStyle('H'. $cell)->getAlignment()->setHorizontal('center');
            $sheet->setCellValue('I'.$cell, $row->golongan_darah);
            $sheet->getStyle('I'. $cell)->getAlignment()->setHorizontal('center');
            $sheet->setCellValue('J'.$cell, $row->alamat);
            $sheet->setCellValue('K'.$cell, $row->nama_ortu);
            $sheet->setCellValue('L'.$cell, $row->pendidikan_terakhir);
            $sheet->setCellValue('L'.$cell, $row->pekerjaan);
            $sheet->setCellValue('M'.$cell, $row->keterangan);
            $sheet->setCellValue('N'.$cell, $row->tahun_akademik);
            $sheet->getStyle('N'. $cell)->getAlignment()->setHorizontal('center');

            $styleArray = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000'),
                    ),
                ),
            );
        
            $sheet ->getStyle('A'.$cell.':N'.$cell)->applyFromArray($styleArray);

            // $sheet->setBorder('A4:N'.$cell, 'thin');
			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Menu Data Mahasiswa.xlsx"');
		$writer->save('php://output');
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'required',
            'tahun_akademik' => 'required'
        ],
        [
            'nim.required' => 'Data must not be empty!',
            'nama.required' => 'Data must not be empty!',
            'tempat_lahir.required' => 'Data must not be empty!',
            'tanggal_lahir.required' => 'Data must not be empty!',
            'agama.required' => 'Data must not be empty!',
            'asal_sekolah.required' => 'Data must not be empty!',
            'jenis_kelamin.required' => 'Data must not be empty!',
            'golongan_darah.required' => 'Data must not be empty!',
            'alamat.required' => 'Data must not be empty!',
            'nama_ortu.required' => 'Data must not be empty!',
            'pendidikan_terakhir.required' => 'Data must not be empty!',
            'pekerjaan.required' => 'Data must not be empty!',
            'keterangan.required' => 'Data must not be empty!',
            'tahun_akademik.required' => 'Data must not be empty!'
        ]);

        DB::table('mahasiswa')->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'asal_sekolah' => $request->asal_sekolah,
                'jenis_kelamin' => $request->jenis_kelamin,
                'golongan_darah' => $request->golongan_darah,
                'alamat' => $request->alamat,
                'nama_ortu' => $request->nama_ortu,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'keterangan' => $request->keterangan,
                'tahun_akademik' => $request->tahun_akademik
            ]);

        return redirect()->route('mahasiswa')->with('update', 'Data updated successfully');
    }

    public function edit($id) {
        $result = Mahasiswa_Model::find($id);
        return view('datamahasiswa.form', ['title' => 'Edit Data Mahasiswa', 'detail' => '', 'mahasiswa' => $result]);
    }

    public function destroy(Request $request, $id) {
        $mahasiswa = Mahasiswa_Model::find($id);
        $status = $mahasiswa->delete();

        return redirect()->route('mahasiswa')->with('delete','Data deleted successfully');
    }
}
