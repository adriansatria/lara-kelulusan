<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F2s_model extends Model
{
    use HasFactory;
    protected $table = 'report_f2s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = [
		'nama_mahasiswa',
		'kelas',
		'nim',
		'ip_s1',
		'ip_s2',
		'ip_s3',
		'ip_s4',
		'ip_s5',
		'ip_s6',
		'ip_s7',
		'ip_s8',
		'ipk',
		'status',
		'tahun',
	];
}
