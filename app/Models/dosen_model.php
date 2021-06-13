<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen_model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dosen';
    protected $guarded = array();
    protected $fillable = [
        'nama_dosen',
        'nip',
        'jabatan_struktural',
        'pangkat_golongan',
        'jabatan_fungsional',
        'tmt',
        'notelp',
        'nidn_nidk',
        'homebase_prodi',
        'serdos',
        'keterangan'
    ];
    
}
