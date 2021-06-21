<?php

namespace App\Http\Controllers;
use App\Charts\MahasiswaChart;
use Illuminate\Http\Request;
use App\Models\Rekapipmahasiswa_model;

class Dashboard extends Controller
{
    public function index(){
    	$f2s_lulus = Rekapipmahasiswa_model::where('status', 'L')->count();
    	$f2s_tidaklulus = Rekapipmahasiswa_model::where('status', '!=', 'L')->count();
		$mahasiswa = Rekapipmahasiswa_model::where('status', 'L')->groupBy('tahun')->count();
		
    	return view('dashboard', ['title' => 'Dashboard', 'detail' => '', 'f2s_lulus' => $f2s_lulus, 'f2s_tidaklulus' => $f2s_tidaklulus, 'mahasiswa' => $mahasiswa]);
    }
}
