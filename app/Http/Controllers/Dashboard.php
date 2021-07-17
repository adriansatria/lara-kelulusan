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

        /**
         * 
         * Berdasarkan Tahun
         *
         **/

        // Jumlah Lulus
        $jml_lulus_2017 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2017/2018')->count();
        $jml_lulus_2018 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2018/2019')->count();
        $jml_lulus_2019 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2019/2020')->count();
        $jml_lulus_2020 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2020/2021')->count();
        $jml_lulus_2021 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2021/2022')->count();
        $jml_lulus_2022 = Rekapipmahasiswa_model::where('status', 'L')->where('tahun', '2022/2023')->count();

        $jml_lulus = [];
        array_push($jml_lulus, $jml_lulus_2017);
        array_push($jml_lulus, $jml_lulus_2018);
        array_push($jml_lulus, $jml_lulus_2019);
        array_push($jml_lulus, $jml_lulus_2020);
        array_push($jml_lulus, $jml_lulus_2021);
        array_push($jml_lulus, $jml_lulus_2022);
		
        // Jumlah Tidak Lulus
        $jml_tlulus_2017 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2017/2018')->count();
        $jml_tlulus_2018 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2018/2019')->count();
        $jml_tlulus_2019 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2019/2020')->count();
        $jml_tlulus_2020 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2020/2021')->count();
        $jml_tlulus_2021 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2021/2022')->count();
        $jml_tlulus_2022 = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('tahun', '2022/2023')->count();

        $jml_tlulus = [];
        array_push($jml_tlulus, $jml_tlulus_2017);
        array_push($jml_tlulus, $jml_tlulus_2018);
        array_push($jml_tlulus, $jml_tlulus_2019);
        array_push($jml_tlulus, $jml_tlulus_2020);
        array_push($jml_tlulus, $jml_tlulus_2021);
        array_push($jml_tlulus, $jml_tlulus_2022);

        /**
         * 
         * Berdasarkan Prodi
         *
         **/
        
        // Jumlah Lulus
        $jml_lulus_ti = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TI')->count();
        $jml_lulus_ti_cbd = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TI CBD')->count();
        $jml_lulus_ti_msu = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TI MSU')->count();
        $jml_lulus_tmd = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TMD')->count();
        $jml_lulus_tmd_msu = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TMD MSU')->count();
        $jml_lulus_tmd_aeu = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TMD Aeu')->count();
        $jml_lulus_tmd_tmj = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'TMJ')->count();
        $jml_lulus_tmd_ccit = Rekapipmahasiswa_model::where('status', 'L')->where('prodi', 'CCIT')->count();

        $jml_lulus_prodi = [];
        array_push($jml_lulus_prodi, $jml_lulus_ti);
        array_push($jml_lulus_prodi, $jml_lulus_ti_cbd);
        array_push($jml_lulus_prodi, $jml_lulus_ti_msu);
        array_push($jml_lulus_prodi, $jml_lulus_tmd);
        array_push($jml_lulus_prodi, $jml_lulus_tmd_msu);
        array_push($jml_lulus_prodi, $jml_lulus_tmd_aeu);
        array_push($jml_lulus_prodi, $jml_lulus_tmd_tmj);
        array_push($jml_lulus_prodi, $jml_lulus_tmd_ccit);
        
        // Jumlah Tidak Lulus
        $jml_tlulus_ti = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TI')->count();
        $jml_tlulus_ti_cbd = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TI CBD')->count();
        $jml_tlulus_ti_msu = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TI MSU')->count();
        $jml_tlulus_tmd = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TMD')->count();
        $jml_tlulus_tmd_msu = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TMD MSU')->count();
        $jml_tlulus_tmd_aeu = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TMD Aeu')->count();
        $jml_tlulus_tmd_tmj = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'TMJ')->count();
        $jml_tlulus_tmd_ccit = Rekapipmahasiswa_model::where('status', '!=', 'L')->where('prodi', 'CCIT')->count();

        $jml_tlulus_prodi = [];
        array_push($jml_tlulus_prodi, $jml_tlulus_ti);
        array_push($jml_tlulus_prodi, $jml_tlulus_ti_cbd);
        array_push($jml_tlulus_prodi, $jml_tlulus_ti_msu);
        array_push($jml_tlulus_prodi, $jml_tlulus_tmd);
        array_push($jml_tlulus_prodi, $jml_tlulus_tmd_msu);
        array_push($jml_tlulus_prodi, $jml_tlulus_tmd_aeu);
        array_push($jml_tlulus_prodi, $jml_tlulus_tmd_tmj);
        array_push($jml_tlulus_prodi, $jml_tlulus_tmd_ccit);

    	return view('dashboard', ['title' => 'Dashboard', 'detail' => '', 'f2s_lulus' => $f2s_lulus, 'f2s_tidaklulus' => $f2s_tidaklulus, 'mahasiswa' => $mahasiswa, 'jml_tlulus' => $jml_tlulus, 'jml_lulus' => $jml_lulus, 'jml_tlulus_prodi' => $jml_tlulus_prodi, 'jml_lulus_prodi' => $jml_lulus_prodi]);
    }
}
