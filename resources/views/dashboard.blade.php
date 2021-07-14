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
<div class="row p-2">
    <div class="col-lg-8 border">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
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
                            stepSize: 50,
                            max: 350
                        }
                    }]
                }
            }
        });

    </script>

    <div class="col-lg">
        <!-- small box -->
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
        <!-- small box -->
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
@endsection