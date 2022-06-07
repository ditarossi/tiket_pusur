<?php

namespace App\Http\Controllers;
use App\Models\Wisata;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $datas = Wisata::all();
        return view('landing.isi', compact(
            'datas'
        ));
    }
}
