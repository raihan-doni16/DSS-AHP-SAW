@extends('app')
@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md m-10" style="width: 500px">
    <div class="px-6 py-4">
        <h2 class="text-lg font-bold mb-2">Edit Informasi Karyawan</h2>
        <form action="{{route('kriteria.update')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_kriteria" class="block text-sm font-medium text-gray-700">Kriteria</label>
                <input type="text" id="nama_kriteria" name="nama_kriteria" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$kriteria->nama_kriteria}}">
            </div>
            <div class="mb-4">
                <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
                <select id="tipe" name="tipe" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-10">
                    <option value="Cost" {{ $kriteria->tipe == 'Cost' ? 'selected' : '' }}>Cost</option>
                    <option value="Benefit"{{ $kriteria->tipe == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                <input type="text" id="bobot" name="bobot" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
