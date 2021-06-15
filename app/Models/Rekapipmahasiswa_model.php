<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapipmahasiswa_model extends Model
{
    use HasFactory;
    protected $table = 'report_f2s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
}
