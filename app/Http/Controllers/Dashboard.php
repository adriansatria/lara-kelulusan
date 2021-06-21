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
		$mahasiswa = new MahasiswaChart;
        $mahasiswa->labels(['Jan', 'Feb', 'Mar']);
        $mahasiswa->dataset('Users by trimester', 'line', [10, 25, 13]);
    	return view('dashboard', ['title' => 'Dashboard', 'detail' => '', 'f2s_lulus' => $f2s_lulus, 'f2s_tidaklulus' => $f2s_tidaklulus, 'mahasiswa' => $mahasiswa]);
    }
}
