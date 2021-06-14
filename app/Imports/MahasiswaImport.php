<?php

namespace App\Imports;

use App\Models\Mahasiswa_Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 4;
    }

    public function model(array $row)
    {
        return new Mahasiswa_Model([
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
        ]);
    }
}
