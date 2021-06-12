<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\F2s_model;

class Dashboard extends Controller
{
    public function index(){
    	$f2s_lulus = F2s_model::where('status', 'L')->count();
    	$f2s_tidaklulus = F2s_model::where('status', '!=', 'L')->count();

    	return view('dashboard', ['title' => 'Dashboard', 'detail' => '', 'f2s_lulus' => $f2s_lulus, 'f2s_tidaklulus' => $f2s_tidaklulus]);
    }
}
