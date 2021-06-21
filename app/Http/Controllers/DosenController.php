<?php

namespace App\Http\Controllers;

use App\Models\dosen_model;
use Illuminate\Http\Request;
use App\imports\DosenImport;
use \PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Session;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = dosen_model::all();
        return view('menudosen.menudosen', ['title' => 'Data Dosen', 'detail' => 'Rekapitulasi data dosen', 'dosen' => $dosen]);
    }

    public function importdosen(Request $request) {
        \Excel::import(new DosenImport, $request->import_file);
        Session::flash('sukses','Data Imported Successfully');

        return back();
    }

    public function export() {
        $result = dosen_model::all();
        // return \Excel::download(new MahasiswaExport, 'Menu Data Mahasiswa.xlsx');
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle('Laporan Data Dosen');
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
        $styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000'),
				),
			),
		);
        
        $sheet ->getStyle('A1:L1')->applyFromArray($styleArray);
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
		$sheet->setCellValue('A1', 'No');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
		$sheet->setCellValue('B1', 'Nama Dosen');
        $sheet->setCellValue('C1', 'NIP');
		$sheet->setCellValue('D1', 'Jabatan Struktural');
		$sheet->setCellValue('E1', 'Pangkat/Gol.');
        $sheet->setCellValue('F1', 'Jabatan Fungsional');
        $sheet->setCellValue('G1', 'tmt.');
        $sheet->setCellValue('H1', 'Telp./HP');
        $sheet->setCellValue('I1', 'NIDN/NIDK');
        $sheet->setCellValue('J1', 'Homebase Prodi');
        $sheet->setCellValue('K1', 'Serdos');
        $sheet->setCellValue('L1', 'Ket.');
		$no=1;
		$cell = 2;
		foreach($result as $row){
			$sheet->setCellValue('A'.$cell, $no++);
            $sheet->getStyle('A'. $cell)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('B'.$cell, $row->nama_dosen);
			$sheet->setCellValue('C'.$cell, $row->nip);
            $sheet->getStyle('C'.$cell)->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT );
			$sheet->setCellValue('D'.$cell, $row->jabatan_struktural);
            $sheet->setCellValue('E'.$cell, $row->pangkat_golongan);
            $sheet->setCellValue('F'.$cell, $row->jabatan_fungsional);
            $sheet->setCellValue('G'.$cell, $row->tmt);
            $sheet->getStyle('G'.$cell)->getNumberFormat()
            ->setFormatCode( \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT );
            $sheet->setCellValue('H'.$cell, $row->notelp);
            $sheet->setCellValue('I'.$cell, $row->nidn_nidk);
            $sheet->setCellValue('J'.$cell, $row->homebase_prodi);
            $sheet->setCellValue('K'.$cell, $row->serdos);
            $sheet->setCellValue('L'.$cell, $row->keterangan);

            $styleArray = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => '000'),
                    ),
                ),
            );
            
            $sheet ->getStyle('A'.$cell. ':L'.$cell)->applyFromArray($styleArray);

			$cell++;
		}
		$writer = new Xlsx($spreadsheet);        
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Menu Data Dosen.xlsx"');
		$writer->save('php://output');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nip' => 'required',
            'nama_dosen' => 'required',
            'jabatan_struktural' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan_fungsional' => 'required',
            'tmt' => 'required',
            'notelp' => 'required',
            'nidn_nidk' => 'required',
            'homebase_prodi' => 'required',
            'serdos' => 'required',
            'keterangan' => 'required'
        ],
        [
            'nip.required' => 'Data must not be empty!',
            'nama_dosen.required' => 'Data must not be empty!',
            'jabatan_struktural.required' => 'Data must not be empty!',
            'pangkat_golongan.required' => 'Data must not be empty!',
            'jabatan_fungsional.required' => 'Data must not be empty!',
            'tmt.required' => 'Data must not be empty!',
            'notelp.required' => 'Data must not be empty!',
            'nidn_nidk.required' => 'Data must not be empty!',
            'homebase_prodi.required' => 'Data must not be empty!',
            'serdos.required' => 'Data must not be empty!',
            'keterangan.required' => 'Data must not be empty!'

        ]);

        DB::table('dosen')->where('id', $id)
            ->update([
                'nama_dosen' => $request->nama_dosen,
                'jabatan_struktural' => $request->jabatan_struktural,
                'pangkat_golongan' => $request->pangkat_golongan,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'tmt' => $request->tmt,
                'notelp' => $request->notelp,
                'nidn_nidk' => $request->nidn_nidk,
                'homebase_prodi' => $request->homebase_prodi,
                'serdos' => $request->serdos,
                'keterangan' => $request->keterangan
            ]);

        return redirect()->route('dosen')->with('update', 'Data updated successfully');
    }

    public function edit($id) {
        $result = dosen_model::find($id);
        return view('menudosen.form', ['title' => 'Edit Data Dosen', 'detail' => '', 'dosen' => $result]);
    }

    public function destroy(Request $request, $id) {
        $dosen = dosen_model::find($id);
        $status = $dosen->delete();

        return redirect()->route('dosen')->with('delete','Data deleted successfully');
    }
}
