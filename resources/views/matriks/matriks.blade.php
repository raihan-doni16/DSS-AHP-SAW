@extends('app')

@section('content')
<div class="page-wrapper overflow-y-auto h-screen px-12 py-4">
    <h1 class="text-3xl font-bold text-black">Matriks</h1>
    <h2 class="text-2xl text-black">Tabel Normalisasi Kriteria AHP</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kriteria</th>
                    @foreach ($matriks['kriteria'] as $kriteria)
                        <th scope="col">{{ $kriteria }}</th>
                    @endforeach
                    <th scope="col">Jumlah</th>
                    <th scope="col">Rata Rata</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matriks['data'] as $key => $row)
                    <tr>
                        <td>{{ $matriks['kriteria'][$key] }}</td>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        <td>{{ array_sum($row) }}</td>
                        <td>{{ number_format(array_sum($row) / count($row), 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h2 class="text-2xl text-black">Tabel Normalisasi Alternatif</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Karyawan</th>
                    <th class="py-2 px-4">Bobot 1</th>
                    <th class="py-2 px-4">Bobot 2</th>
                    <th class="py-2 px-4">Bobot 3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilNormalisasi['karyawan'] as $index => $namaKaryawan)
                    <tr>
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $namaKaryawan }}</td>
                        <td class="py-2 px-4">{{ $hasilNormalisasi['bobot1'][$index] }}</td>
                        <td class="py-2 px-4">{{ $hasilNormalisasi['bobot2'][$index] }}</td>
                        <td class="py-2 px-4">{{ $hasilNormalisasi['bobot3'][$index] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h2 class="text-2xl text-black">Tabel Perankingan</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Karyawan</th>
                    <th class="py-2 px-4">Bobot 1</th>
                    <th class="py-2 px-4">Bobot 2</th>
                    <th class="py-2 px-4">Bobot 3</th>
                    <th class="py-2 px-4">Sum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankfinal as $index => $data)
                    <tr>
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $data['karyawan'] }}</td>
                        <td class="py-2 px-4">{{ $data['bobot1'] }}</td>
                        <td class="py-2 px-4">{{ $data['bobot2'] }}</td>
                        <td class="py-2 px-4">{{ $data['bobot3'] }}</td>
                        <td class="py-2 px-4">{{ $data['sum'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>


@endsection
