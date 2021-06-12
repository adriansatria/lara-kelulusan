<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';
    protected $guarded = array();
    protected $fillable = [
        'nim',
        'foto',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'asal_sekolah',
        'jenis_kelamin',
        'golongan_darah',
        'alamat',
        'nama_ortu',
        'pendidikan_terakhir',
        'pekerjaan',
        'keterangan',
    ];
}
