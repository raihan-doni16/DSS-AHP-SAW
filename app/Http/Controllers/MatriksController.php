<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Karyawan;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;
class MatriksController extends Controller
{
    public function matriks()
    {
        // kriteria
        $kriteria = DB::table('kriteria')->get();


        if ($kriteria->count() < 3) {
            return "Data kriteria kurang dari 3";
        }

        $bobot1 = $kriteria[0]->bobot;
        $bobot2 = $kriteria[1]->bobot;
        $bobot3 = $kriteria[2]->bobot;

        $matriks = [
            'kriteria' => ['k1', 'k2', 'k3'],
            'data' => [
                ['k1' => 1,   'k2' => $bobot1,   'k3' => 1/$bobot3],
                ['k1' => 1/$bobot1, 'k2' => 1,   'k3' => $bobot2],
                ['k1' => $bobot3,   'k2' => 1/$bobot2, 'k3' => 1],
            ]
        ];
        // dd($matriks);


        $totals = [
            'k1' => array_sum(array_column($matriks['data'], 'k1')),
            'k2' => array_sum(array_column($matriks['data'], 'k2')),
            'k3' => array_sum(array_column($matriks['data'], 'k3')),
        ];



        foreach ($matriks['data'] as &$ahp) {
            $ahp['k1'] /= $totals['k1'];
            $ahp['k2'] /= $totals['k2'];
            $ahp['k3'] /= $totals['k3'];
        }

        $k1= $matriks['data'][0]['k1'] + $matriks['data'][0]['k2'] + $matriks['data'][0]['k3'];
        $k2 = $matriks['data'][1]['k1'] + $matriks['data'][1]['k2'] + $matriks['data'][1]['k3'];
        $k3 = $matriks['data'][2]['k1'] + $matriks['data'][2]['k2'] + $matriks['data'][2]['k3'];
        $jumlah = [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
        ];


             $rataK1= $k1 / 3;
             $rataK2= $k2 / 3;
             $rataK3= $k3 / 3;

             $hasil= [
                'k1' => [
                    'total' => $k1,
                    'rata_rata' => $rataK1,
                ],
                'k2' => [
                    'total' => $k2,
                    'rata_rata' => $rataK2,
                ],
                'k3' => [
                    'total' => $k3,
                    'rata_rata' => $rataK3,
                ],
            ];

// dd($matriks,$hasil);
//     // dd($hasil);
    // // alternative

    $karyawan = DB::table('karyawan')->select('nama_karyawan','bobot1', 'bobot2', 'bobot3')->get();


    $maxBobot1 = null;
    $minBobot1 = null;
    $maxBobot2 = null;
    $minBobot2 = null;
    $maxBobot3 = null;
    $minBobot3 = null;

    foreach ($karyawan as $Item) {
        // Untuk bobot1
        if ($maxBobot1 === null || $Item->bobot1 > $maxBobot1) {
            $maxBobot1 = $Item->bobot1;
        }
        if ($minBobot1 === null || $Item->bobot1 < $minBobot1) {
            $minBobot1 = $Item->bobot1;
        }

        // Untuk bobot2
        if ($maxBobot2 === null || $Item->bobot2 > $maxBobot2) {
            $maxBobot2 = $Item->bobot2;
        }
        if ($minBobot2 === null || $Item->bobot2 < $minBobot2) {
            $minBobot2 = $Item->bobot2;
        }

        // Untuk bobot3
        if ($maxBobot3 === null || $Item->bobot3 > $maxBobot3) {
            $maxBobot3 = $Item->bobot3;
        }
        if ($minBobot3 === null || $Item->bobot3 < $minBobot3) {
            $minBobot3 = $Item->bobot3;
        }
    }

    $hasilNormalisasi = [
        'bobot1' => [],
        'bobot2' => [],
        'bobot3' => [],
        'karyawan' => [],
    ];

    foreach ($karyawan as $Item) {
        // Bagi bobot1 dengan maxBobot1 (pastikan maxBobot1 tidak nol)
        $bobot1_normalized = ($maxBobot1 != 0) ? $Item->bobot1 / $maxBobot1 : 0;
        // Bagi bobot2 dengan maxBobot2 (pastikan maxBobot2 tidak nol)
        $bobot2_normalized = ($maxBobot2 != 0) ? $Item->bobot2 / $maxBobot2 : 0;
        // Bagi bobot3 dengan maxBobot3 (pastikan maxBobot3 tidak nol)
        $bobot3_normalized = ($maxBobot3 != 0) ? $Item->bobot3 / $maxBobot3 : 0;

        // Simpan hasil normalisasi bobot
        $hasilNormalisasi['bobot1'][] = $bobot1_normalized;
        $hasilNormalisasi['bobot2'][] = $bobot2_normalized;
        $hasilNormalisasi['bobot3'][] = $bobot3_normalized;

        // Simpan nama karyawan
        $hasilNormalisasi['karyawan'][] = $Item->nama_karyawan;
    }

    $hasilNormalisasiBaru = [
        'bobot1' => [],
        'bobot2' => [],
        'bobot3' => [],
        'karyawan' => [],
    ];

    foreach ($hasilNormalisasi as $key => $values) {
        foreach ($values as $index => $value) {
            if ($key === 'bobot1') {
                $hasilNormalisasiBaru[$key][$index] = $value * $rataK1;
            } elseif ($key === 'bobot2') {
                $hasilNormalisasiBaru[$key][$index] = $value * $rataK2;
            } elseif ($key === 'bobot3') {
                $hasilNormalisasiBaru[$key][$index] = $value * $rataK3;
            }else if ($key === 'karyawan') {
                $hasilNormalisasiBaru[$key][$index] = $value;
            }
        }
    }
    $hasilNormalisasiBaruFlat = [];
    $rankfinal = [];

    foreach ($hasilNormalisasi as $key => $values) {
        foreach ($values as $index => $value) {
            if (!isset($hasilNormalisasiBaruFlat[$index])) {
                $hasilNormalisasiBaruFlat[$index] = [
                    'bobot1' => 0,
                    'bobot2' => 0,
                    'bobot3' => 0,
                    'karyawan' => null, // Ubah jika ada nilai default untuk 'karyawan'
                    'sum' => 0,
                ];
            }

            if ($key === 'bobot1') {
                $hasilNormalisasiBaruFlat[$index]['bobot1'] = $value * $rataK1;
            } elseif ($key === 'bobot2') {
                $hasilNormalisasiBaruFlat[$index]['bobot2'] = $value * $rataK2;
            } elseif ($key === 'bobot3') {
                $hasilNormalisasiBaruFlat[$index]['bobot3'] = $value * $rataK3;
            } elseif ($key === 'karyawan') {
                $hasilNormalisasiBaruFlat[$index]['karyawan'] = $value;
            }

            // Menghitung sum
            $hasilNormalisasiBaruFlat[$index]['sum'] = $hasilNormalisasiBaruFlat[$index]['bobot1'] +
                                                      $hasilNormalisasiBaruFlat[$index]['bobot2'] +
                                                      $hasilNormalisasiBaruFlat[$index]['bobot3'];
        }
    }
    $rankfinal = $hasilNormalisasiBaruFlat;
    usort($rankfinal, function($a, $b) {
        return $b['sum'] <=> $a['sum'];
    });

    foreach ($hasilNormalisasiBaruFlat as $hasil) {
        // Cek apakah sudah ada data untuk karyawan ini
        $existingData = Hasil::where('nama_karyawan', $hasil['karyawan'])->first();

        if ($existingData) {
            // Update data jika sudah ada
            if ($existingData->hasil != $hasil['sum']) {
                $existingData->update([
                    'hasil' => $hasil['sum'],
                ]);
            }
        } else {
            // Simpan data baru jika belum ada
            Hasil::create([
                'nama_karyawan' => $hasil['karyawan'],
                'hasil' => $hasil['sum'],
            ]);
        }
    }
        return view('matriks.matriks', compact('kriteria','matriks','hasil','hasilNormalisasi','hasilNormalisasiBaruFlat','rankfinal'));
    }

   
}
