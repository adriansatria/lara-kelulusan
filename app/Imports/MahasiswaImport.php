<?php

namespace App\Imports;

use App\Models\Mahasiswa_Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function headingRow(): int
    // {
    //     return 4;
    // }
    public function headingRow(): int
    {
        return 5;
    }

    public function model(array $row)
    {
        // $spreadsheet = IOFactory::load(request()->file('import_file'));
        // $i = 0;
        // foreach ($spreadsheet->getActiveSheet()->getDrawingCollection() as $drawing) {
        //     if ($drawing instanceof MemoryDrawing) {
        //         ob_start();
        //         call_user_func(
        //             $drawing->getRenderingFunction(),
        //             $drawing->getImageResource()
        //         );
        //         $imageContents = ob_get_contents();
        //         ob_end_clean();
        //         switch ($drawing->getMimeType()) {
        //             case MemoryDrawing::MIMETYPE_PNG :
        //                 $extension = 'png';
        //                 break;
        //             case MemoryDrawing::MIMETYPE_JPEG :
        //                 $extension = 'jpeg';
        //                 break;
        //         }
        //     } else {
        //         $zipReader = fopen($drawing->getPath(), 'r');
        //         $imageContents = '';
        //         while (!feof($zipReader)) {
        //             $imageContents .= fread($zipReader, 1024);
        //         }
        //         fclose($zipReader);
        //         $extension = $drawing->getExtension();
        //     }

        //     $myFileName = time() .++$i. '.' . $extension;
        //     file_put_contents('assets/images/' . $myFileName, $imageContents);
        // }
        return new Mahasiswa_Model([
            '' => $row['NO.'],
            'nim' => $row['NIM'],
            'foto' => $row['Pas foto'],
            'nama' => $row['Nama'],
            'tempat_lahir' => $row['Tempat lahir'],
            'tanggal_lahir' => $row['Tanggal lahir'],
            'agama' => $row['Agama'],
            'asal_sekolah' => $row['Asal sekolah'],
            'jenis_kelamin' => $row['Jenis kelamin'],
            'golongan_darah' => $row['Gol. darah'],
            'alamat' => $row['Alamat'],
            'nama_ortu' => $row['Nama Orangtua/Wali'],
            'pendidikan_terakhir' => $row['Pendidikan Terakhir'],
            'pekerjaan' => $row['Pekerjaan'],
            'keterangan' => $row['Keterangan'],
            'tahun_akademik' => $row['Tahun Akademik']
        ]);
    }
}
