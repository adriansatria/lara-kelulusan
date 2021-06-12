<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations_model extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
	protected $primaryKey = 'id';
	protected $guarded = [];
	public $timestamps = false;
}
