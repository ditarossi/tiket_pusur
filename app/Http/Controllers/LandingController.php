<?php

namespace App\Http\Controllers;
use App\Models\Wisata;
use App\Models\Kegiatan;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $datas = Wisata::all();
        $keg = Kegiatan::all();
        return view('landing.isi', compact(
            'datas','keg'
        ));
    }

    public function detail($id)
    {
        $datas = Wisata::all();
        return view('landing.detail', compact(
            'datas'
        ));
    }
}
