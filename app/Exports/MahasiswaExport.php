<?php

namespace App\Exports;

use App\Models\Mahasiswa_Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MahasiswaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa_Model::all();
    }

    public function headings(): array
    {
        return [
            'NO',
            'NIM',
            'Pas foto',
            'Nama',
            'Tempat lahir',
            'Tanggal lahir',
            'Agama',
            'Asal sekolah',
            'Jenis kelamin',
            'Gol. darah',
            'Alamat',
            'Nama orangtua/wali',
            'Pendidikan terakhir',
            'Pekerjaan',
            'Keterangan'
        ];
    }

    public function map($mahasiswa): array
    {
        return [
            $mahasiswa->no,
            $mahasiswa->nim,
            $mahasiswa->foto,
            $mahasiswa->nama,
            $mahasiswa->tempat_lahir,
            $mahasiswa->tanggal_lahir,
            $mahasiswa->agama,
            $mahasiswa->asal_sekolah,
            $mahasiswa->jenis_kelamin,
            $mahasiswa->golongan_darah,
            $mahasiswa->alamat,
            $mahasiswa->nama_ortu,
            $mahasiswa->pendidikan_terakhir,
            $mahasiswa->pekerjaan,
            $mahasiswa->keterangan,
        ];
    }
}
