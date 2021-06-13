<?php

namespace App\Imports;

use App\Models\dosen_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

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
            'nama_dosen' => $row['nama'],
            'nip' => $row['nip'],
            'jabatan_struktural' => $row['jabatan_struktural'],
            'pangkat_golongan' => $row['pangkat_golongan'],
            'jabatan_fungsional' => $row['jabatan_fungsional'],
            'tmt' => $row['tmt'],
            'notelp' => $row['notelp'],
            'nidn_nidk' => $row['nidn_nidk'],
            'homebase_prodi' => $row['homebase_prodi'],
            'serdos' => $row['serdos'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
