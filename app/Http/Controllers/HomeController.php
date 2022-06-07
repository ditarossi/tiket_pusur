<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
// use App\Models\Detail;
// use App\Models\Resi;
use App\Models\Fasilitas;
use App\Models\Pemesanan;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Wisata::all();
        $f = Fasilitas::all();
        return view('user_view.isi', compact(
            'datas', 'f'
        ));
    }

    public function download()
    {
        // $datas = Pemesanan::all();
        // $f = Fasilitas::all();
        // $pdf = PDF::loadView('user_view.isi', [
        //     'datas'=>$datas,
        //     'f' =>$f,
        // ]);

        // return $pdf->download('tiket.pdf');
        $user = request()->user();

        $datas = Pemesanan::where('users_id', $user->id)->get();
        view()->share('datas', $datas);
        $pdf = PDF::loadView('user_view.tiket-pdf');
        return $pdf->download('tiket-pusur.pdf');

    }

    public function tiket()
    {
        $user = request()->user();

        $tiket = Pemesanan::where('users_id', $user->id)->get();
        return view('user_view.tiket', compact(
            'tiket'
        ));
    }

}
