<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F1s_model extends Model
{
    use HasFactory;
    protected $table = 'reportf1s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = [
		'nama_dosen',
		'nip',
		'mata_kuliah',
		'p1',
		'p2',
		'p3',
		'p4',
		'p5',
		'p6',
		'p7',
		'p8',
		'p9',
		'p10',
		'p11',
		'p12',
		'p13',
		'p14',
		'p15',
		'p16',
		'p17',
		'p18',
		'p19',
		'prosentase_hadir',
		'prosentase_tidakhadir',
		'hadir',
		'izin',
		'keluar_dinas',
		'mangkir',
		'sakit',
		'tahun'
	];
}
