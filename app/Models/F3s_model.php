<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F3s_model extends Model
{
    use HasFactory;
    protected $table = 'reportf3s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = [
		'nim',
		'nama_mahasiswa',
		'izin',
		'tidak_izin',
		'jumlah',
		'kelakuan',
		'status_lulus_lalu',
		'status_lulus_baru',
		'amxsks',
		'ip',
		'kapita_selekta2',
		'k3',
		'metodologi_penelitian2',
		'k2',
		'bahasa_inggris_komunikasi3',
		'k2_2',
		'tugas_akhir',
		'k6'
	];
}
