<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;
class AlternativeController extends Controller
{
    //


    public function index()
    {
        $karyawan = DB::table('karyawan')->get()->count();
        $kriteria = DB::table('kriteria')->get()->count();
        $hasil = DB::table('hasil')->orderBy('hasil', 'desc')->get();
        return view('dashboard',compact('karyawan','kriteria','hasil'));
    }


    public function alternative()
    {
        $alternative = DB::table('karyawan')->get();
        return view('alternative.alternative', compact('alternative'));
    }


    public function addalternative()
    {
        return view('alternative.add-alternative');
    }

    public function postalternative(Request $request)
    {
        $request->validate([

            'nama_karyawan' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'bobot1' => 'required|integer',
            'bobot2' => 'required|integer',
            'bobot3' => 'required|integer',
        ]);
        $data = [
            'nama_karyawan' => $request->input('nama_karyawan'),
            'divisi' => $request->input('divisi'),
            'bobot1' => $request->input('bobot1'),
            'bobot2' => $request->input('bobot2'),
            'bobot3' => $request->input('bobot3'),
        ];

        $insert = Karyawan::create($data);
        return redirect()->route('alternative')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function editalternative($id)
    {
        $alter = Karyawan::find($id);
        return view('alternative.edit-alternative', compact('alter'));
    }
    public function updatealternative(Request $request)
    {
        $request->validate([

            'nama_karyawan' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'bobot1' => 'required|integer',
            'bobot2' => 'required|integer',
            'bobot3' => 'required|integer',
        ]);
        $data = [
            'nama_karyawan' => $request->input('nama_karyawan'),
            'divisi' => $request->input('divisi'),
            'bobot1' => $request->input('bobot1'),
            'bobot2' => $request->input('bobot2'),
            'bobot3' => $request->input('bobot3'),
        ];

        $update = Karyawan::where($request->id_karyawan)->update($data);
        return redirect()->route('alternative')->with('success', 'Kriteria berhasil diubah');
    }
    public function deletealternative($id)
    {
        $delete = Karyawan::where('id_karyawan', $id)->delete();
        return redirect()->route('alternative')->with('success', 'Kriteria berhasil dihapus');
    }

}
