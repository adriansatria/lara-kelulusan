<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F4s_model extends Model
{
    use HasFactory;
    protected $table = 'report_f4s';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
}
