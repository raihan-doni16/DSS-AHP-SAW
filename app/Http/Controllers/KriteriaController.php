<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function kriteria()
    {
        $kriteria= DB::table('kriteria')->get();
        return view('kriteria.kriteria',compact('kriteria'));
    }
    public function addkriteria()
    {
        return view('kriteria.add-kriteria');
    }
    public function postkriteria(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'tipe' => 'required',
            'bobot' => 'required',
        ]);
        Kriteria::create($request->all());
        return redirect()->route('kriteria');
    }
    public function editkriteria($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit-kriteria',compact('kriteria'));
    }
    public function updatekriteria(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'tipe' => 'required',
            'bobot' => 'required',
        ]);
        $data = [
            'nama_kriteria' => $request->input('nama_kriteria'),
            'tipe' => $request->input('tipe'),
            'bobot' => $request->input('bobot'),
        ];
        $update = Kriteria::where($request->id_kriteria)->update($data);
        return redirect()->route('kriteria');
    }

    public function deletekriteria($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria');
    }
    public function bobot()
    {
        $kriteria= DB::table('kriteria')->get();
        return view('bobot-nilai.bobot-kriteria',compact('kriteria'));
    }

 
}
