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

        // Jumlah Lulus
        $jml_lulus_2017 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2017')->count();
        $jml_lulus_2018 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2018')->count();
        $jml_lulus_2019 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2019')->count();
        $jml_lulus_2020 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2020')->count();
        $jml_lulus_2021 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2021')->count();
        $jml_lulus_2022 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2022')->count();

        $jml_lulus = [];
        array_push($jml_lulus, $jml_lulus_2017);
        array_push($jml_lulus, $jml_lulus_2018);
        array_push($jml_lulus, $jml_lulus_2019);
        array_push($jml_lulus, $jml_lulus_2020);
        array_push($jml_lulus, $jml_lulus_2021);
        array_push($jml_lulus, $jml_lulus_2022);
		
        // Jumlah Tidak Lulus
        $jml_tlulus_2017 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2017')->count();
        $jml_tlulus_2018 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2018')->count();
        $jml_tlulus_2019 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2019')->count();
        $jml_tlulus_2020 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2020')->count();
        $jml_tlulus_2021 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2021')->count();
        $jml_tlulus_2022 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2022')->count();

        $jml_tlulus = [];
        array_push($jml_tlulus, $jml_tlulus_2017);
        array_push($jml_tlulus, $jml_tlulus_2018);
        array_push($jml_tlulus, $jml_tlulus_2019);
        array_push($jml_tlulus, $jml_tlulus_2020);
        array_push($jml_tlulus, $jml_tlulus_2021);
        array_push($jml_tlulus, $jml_tlulus_2022);

    	return view('dashboard', ['title' => 'Dashboard', 'detail' => '', 'f2s_lulus' => $f2s_lulus, 'f2s_tidaklulus' => $f2s_tidaklulus, 'mahasiswa' => $mahasiswa, 'jml_tlulus' => $jml_tlulus, 'jml_lulus' => $jml_lulus]);
    }
}
