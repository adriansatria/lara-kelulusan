<?php

namespace App\Imports;

use App\Models\Mahasiswa_Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class MahasiswaImport implements ToModel, WithHeadingRow, WithMappedCells
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
    
    public function mapping(): array
    {
        return [
            'NIM' => 'B6',
            'Pas foto' => 'C6',
            'Nama' => 'D6',
            'Tempat lahir' => 'E6',
            'Tanggal lahir' => 'F6',
            'Agama' => 'G6',
            'Asal sekolah' => 'H6',
            'Jenis kelamin' => 'I6',
            'Gol. darah' => 'J6',
            'Alamat' => 'K6',
            'Nama Orangtua/Wali' => 'L6',
            'Pendidikan Terakhir' => 'M6',
            'Pekerjaan' => 'N6',
            'Keterangan' => 'O6'
        ];
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
