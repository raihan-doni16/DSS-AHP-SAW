@extends('app')
@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md m-10" style="width: 500px">
    <div class="px-6 py-4">
        <h2 class="text-lg font-bold mb-2">Edit Informasi Karyawan</h2>
        <form action="{{route('alternative.post')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                <select id="divisi" name="divisi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-10">
                    <option value="" >Select Option</option>
                    <option value="IT" >IT</option>
                    <option value="HR">HR</option>
                    <option value="Finance">Finance</option>
                    <option value="Operations">Operations</option>
                </select>
            </div>
           
            <div class="mb-4">
                <label for="bobot" class="block text-sm font-medium text-gray-700">bobot 1</label>
                <input type="text" id="bobot" name="bobot1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="bobot" class="block text-sm font-medium text-gray-700">bobot 2</label>
                <input type="text" id="bobot" name="bobot2" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="bobot" class="block text-sm font-medium text-gray-700">bobot 3</label>
                <input type="text" id="bobot" name="bobot3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
