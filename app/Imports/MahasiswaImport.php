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
    public function model(array $row)
    {
        return new Mahasiswa_Model([
            'nim' => $row['nim'],
            'foto' => $row['foto'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'asal_sekolah' => $row['asal_sekolah'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'golongan_darah' => $row['golongan_darah'],
            'alamat' => $row['alamat'],
            'nama_ortu' => $row['nama_ortu'],
            'pendidikan_terakhir' => $row['pendidikan_terakhir'],
            'pekerjaan' => $row['pekerjaan'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
