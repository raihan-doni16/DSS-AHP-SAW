@extends('app')

@section('content')

    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Dashboard</h1>


            <div class="flex justify-between">
                <div class="w-1/2 max-w-sm p-6 bg-white text-center border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Alternatif</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">20</p>
                </div>
                <div class="w-1/2 max-w-sm p-6 bg-white text-center border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Alternatif</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">20</p>
                </div>
                <div class="w-1/2 max-w-sm p-6 bg-white text-center border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nilai Prefresnsi</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">20</p>
                </div>
            </div>
        </main>

    </div>


@endsection

