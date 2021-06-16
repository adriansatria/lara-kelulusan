<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F3s_model extends Model
{
    use HasFactory;
    protected $table = 'report_f3s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = [
		'prodi',
		'jenjang',
		'semester',
		'kelas',
		'jumlah_mahasiswa',
		'status_l',
		'status_lp',
		'status_ct',
		'status_ml',
		'status_md',
		'status_do',
		'nama_mahasiswa',
		'nim',
		'tahun'
	];
}
