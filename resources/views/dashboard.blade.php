@extends('layouts.app')

@section('content')

<head>
    <style>
        .sm-box-footer {
            background-color: rgba($black, .1);
            color: rgba($white, .8);
            display: block;
            padding: 3px 0;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }

    </style>
    <div class="m-4 font-weight-bold">
        <h1><strong>{{ $title }}</strong></h1>
    </div>

</head>

<div class="container">
    <div class="row">
        <!-- small box -->
        <div class="col-lg-6">
            <div class="small-box bg border border-secondary">
                <div class="inner">
                    <h3>{{ $f2s_lulus }}</h3>

                    <p>Jumlah Mahasiswa Lulus</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="{{ route('f2s_lulus') }}" class="sm-box-footer bg bg-info">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-6">
            <div class="small-box bg border border-secondary">
                <div class="inner">
                    <h3>{{ $f2s_tidaklulus }}</h3>

                    <p>Jumlah Mahasiswa Tidak/Belum Lulus</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>
                <a href="{{ route('f2s_tidaklulus') }}" class="sm-box-footer bg bg-danger">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row p-4">
    <div class="col-lg border p-2">
        <h5 style="text-align: center">Tahun</h5>
        <canvas id="Tahun"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("Tahun").getContext('2d');
        var Tahun = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["2017/2018", "2018/2019", "2019/2020", "2020/2021"],
                datasets: [{
                        label: 'DATA MAHASISWA LULUS',
                        data: [{{ $jml_lulus[0] }}, {{ $jml_lulus[1] }}, {{ $jml_lulus[2] }}, {{ $jml_lulus[3] }}, {{ $jml_lulus[4] }}, {{ $jml_lulus[5] }}],
                        backgroundColor: [
                            'rgba(51, 166, 204, 0.7)',
                        ],
                        borderColor: [
                            'rgba(51, 166, 204)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'DATA MAHASISWA TIDAK LULUS',
                        data: [{{ $jml_tlulus[0] }}, {{ $jml_tlulus[1] }}, {{ $jml_tlulus[2] }}, {{ $jml_tlulus[3] }}, {{ $jml_tlulus[4] }}, {{ $jml_tlulus[5] }}],
                        backgroundColor: [
                            'rgba(204, 51, 51, 0.7)',
                        ],
                        borderColor: [
                            'rgba(204, 51, 51)',
                        ],
                        borderWidth: 1
                    }
                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 20,
                            max: 100
                        }
                    }]
                }
            }
        });

    </script>

</div>


<div class="row p-4">
    <div class="col-lg border p-2">
    <h5 style="text-align: center">Study Program</h5>
        <canvas id="Studi"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("Studi").getContext('2d');
        var Studi = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["TI", "TI CBD", "TI MSU", "TMD", "TMD MSU", "TMD Aeu", "TMJ", "CCIT"],
                datasets: [{
                        label: 'DATA MAHASISWA LULUS',
                        data: [{{ $jml_lulus_prodi[0] }}, {{ $jml_lulus_prodi[1] }}, {{ $jml_lulus_prodi[2] }}, {{ $jml_lulus_prodi[3] }}, {{ $jml_lulus_prodi[4] }}, {{ $jml_lulus_prodi[5] }}, {{ $jml_lulus_prodi[6] }}, {{ $jml_lulus_prodi[7] }}],
                        backgroundColor: [
                            'rgba(51, 166, 204, 0.7)',
                        ],
                        borderColor: [
                            'rgba(51, 166, 204)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'DATA MAHASISWA TIDAK LULUS',
                        data: [{{ $jml_tlulus_prodi[0] }}, {{ $jml_tlulus_prodi[1] }}, {{ $jml_tlulus_prodi[2] }}, {{ $jml_tlulus_prodi[3] }}, {{ $jml_tlulus_prodi[4] }}, {{ $jml_tlulus_prodi[5] }}, {{ $jml_tlulus_prodi[6] }}, {{ $jml_tlulus_prodi[7] }}],
                        backgroundColor: [
                            'rgba(204, 51, 51, 0.7)',
                        ],
                        borderColor: [
                            'rgba(204, 51, 51)',
                        ],
                        borderWidth: 1
                    }
                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 20,
                            max: 100
                        }
                    }]
                }
            }
        });

    </script>
</div>


<div class="row p-4">
    <div class="col-lg border p-2">
    <h5 style="text-align: center">Semester</h5>
        <canvas id="Semester"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("Semester").getContext('2d');
        var Semester = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4"],
                datasets: [{
                        label: 'DATA MAHASISWA LULUS',
                        data: [{{ $jml_lulus[0] }}, {{ $jml_lulus[1] }}, {{ $jml_lulus[2] }}, {{ $jml_lulus[3] }}, {{ $jml_lulus[4] }}, {{ $jml_lulus[5] }}],
                        backgroundColor: [
                            'rgba(51, 166, 204, 0.7)',
                        ],
                        borderColor: [
                            'rgba(51, 166, 204)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'DATA MAHASISWA TIDAK LULUS',
                        data: [{{ $jml_tlulus[0] }}, {{ $jml_tlulus[1] }}, {{ $jml_tlulus[2] }}, {{ $jml_tlulus[3] }}, {{ $jml_tlulus[4] }}, {{ $jml_tlulus[5] }}],
                        backgroundColor: [
                            'rgba(204, 51, 51, 0.7)',
                        ],
                        borderColor: [
                            'rgba(204, 51, 51)',
                        ],
                        borderWidth: 1
                    }
                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 20,
                            max: 100
                        }
                    }]
                }
            }
        });

    </script>
</div>




@endsection