<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F1s_model extends Model
{
    use HasFactory;
    protected $table = 'report_f1s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = [
		'nama_dosen',
		'nip',
		'mata_kuliah',
		'kelas',
		'jpm',
		'kpk',
		'rata_kehadiran',
		'tahun'
	];
}
