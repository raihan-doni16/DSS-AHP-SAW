<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //


    public function index()
    {
        return view('dashboard');
    }

    public function kriteria()
    {
        return view('kriteria.kriteria');
    }
    public function alternative()
    {
        return view('alternative.alternative');
    }
    public function matriks()
    {
        return view('matriks.matriks');
    }
    public function nilai()
    {
        return view('nilai.nilai');
    }
    
}
