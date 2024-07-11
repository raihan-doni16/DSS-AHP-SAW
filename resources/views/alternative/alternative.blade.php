@extends('app')

@section('content')

<div class="page-wrapper overflow-y-auto h-screen p-2 w-full mt-12">
    <h1 class="text-3xl text-black pb-6 m-2">Alternative</h1>
    <a href="{{route('alternative.add')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-3 px-4 rounded">
    Tambah Karyawan
    </a>
    <div class="bg-white overflow-auto m-2 mt-5 ">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Karyawan</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Divisi</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Bobot1</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Bobot2</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Bobot3</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($alternative as $data)
                <tr>
                    <td class="text-left py-3 px-4">{{$data->id_karyawan}}</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{$data->nama_karyawan}}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{$data->divisi}}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{$data->bobot1}}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{$data->bobot2}}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{$data->bobot3}}</a></td>
                    <td class="text-left py-3 px-4">
                        <div class="flex">
                          <a href="{{route('alternative.delete', ['id'=> $data->id_karyawan])}}">
                            <svg class="w-6 h-6 text-gray-800 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                            </svg>
                           </a>
                           <a  href="{{ route('alternative.edit', ['id' => $data->id_karyawan])}}">
                            <svg class="w-6 h-6 text-gray-800 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                        </a>


                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
