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
    <div class="m-4">
        <h4>{{ $title }}</h4>
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
				labels: ["2020", "2021", "2022", "2023", "2024", "2025"],
				datasets: [{
					label: 'DATA MAHASISWA LULUS',
					data: [12, 19, 3, 18, 2, 3],
					backgroundColor: [
					'rgba(65, 105, 225, 0.7)',
					],
					borderColor: [
                    'rgba(65, 105, 225, 1)',
					],
					borderWidth: 1
				},
                {
					label: 'DATA MAHASISWA TIDAK LULUS',
					data: [10, 10, 3, 23, 2, 3],
					backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
					],
					borderColor: [
                    'rgba(255, 99, 132, 1)',
					],
					borderWidth: 1
				}],
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
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
            <a href="{{ route('f2s_lulus') }}" class="sm-box-footer bg bg-secondary">More info <i
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
            <a href="{{ route('f2s_tidaklulus') }}" class="sm-box-footer bg bg-secondary">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection