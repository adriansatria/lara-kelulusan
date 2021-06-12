<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluations_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datamahasiswa extends Controller
{
    public function index() {
        return view('datamahasiswa.datamahasiswa', ['title' => 'Data Mahasiswa', 'detail' => 'Rekapitulasi data mahasiswa']);
    }
}
