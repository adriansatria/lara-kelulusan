<?php

namespace App\Imports;

use App\Models\dosen_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class DosenImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new dosen_model([
            'nama_dosen' => $row['Nama'],
            'nip' => $row['NIP'],
            'jabatan_struktural' => $row['Jabatan struktural'],
            'pangkat_golongan' => $row['Pangkat/Golongan'],
            'jabatan_fungsional' => $row['Jabatan Fungsional'],
            'tmt' => $row['tmt'],
            'notelp' => $row['No. telp'],
            'nidn_nidk' => $row['NIDN/NIDK'],
            'homebase_prodi' => $row['Homebase Prodi'],
            'serdos' => $row['Serdos'],
            'keterangan' => $row['Keterangan'],
        ]);
    }
}
