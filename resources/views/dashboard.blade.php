@extends('app')

@section('content')
<div class="container-fluid overflow-x-hidden border-top">
    <main class="w-100 flex-grow-1 p-6">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card text-center border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
                    <div class="card-body">
                        <h5 class="card-title mb-2 text-2xl font-bold tracking-tight text-gray-900">Alternatif</h5>
                        <p class="card-text font-normal text-gray-700">{{$karyawan}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card text-center border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
                    <div class="card-body">
                        <h5 class="card-title mb-2 text-2xl font-bold tracking-tight text-gray-900">Kriteria</h5>
                        <p class="card-text font-normal text-gray-700">{{$kriteria}}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-12 mb-4">
                <div class="card text-center border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
                    <div class="card-body">
                        <h5 class="card-title mb-2 text-2xl font-bold tracking-tight text-gray-900">Ranking Kinerja Karyawan</h5>
                        <div>
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var data = @json($hasil);
            var labels = data.map(item => item.nama_karyawan);
            var values = data.map(item => item.hasil);

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Performa Karyawan',
                        data: values,
                        backgroundColor: '#69b3a2',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', 
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
@endsection
