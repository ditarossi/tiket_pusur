<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaksi;

class AdminControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin2.dashboard');
    }

    public function DashboardAdminController()
    {
        // $status = Status::whereBetween('id',['1' , '4'])->pluck('nama_status');

    $thn_sekarang = Carbon::now()->isoFormat('YYYY');
            $total_jan= 0;
            $total_feb= 0;
            $total_mar= 0;
            $total_apr= 0;
            $total_mei= 0;
            $total_jun= 0;
            $total_juli= 0;
            $total_agus= 0;
            $total_sept= 0;
            $total_okto= 0;
            $total_nove= 0;
            $total_dese= 0;
    foreach(Transaksi::get() as $ff){
        $k= date('m', strtotime($ff->Tanggal_Kunjungan));
        $y= date('Y', strtotime($ff->Tanggal_Kunjungan));

        if($y == $thn_sekarang){
        if($k == '07'){
            $total_juli += 1;

        }elseif ($k == '01'){
        $total_jan += 1;
        }elseif ($k == '02'){
            $total_feb += 1;
        }elseif ($k == '03'){
            $total_mar += 1;
        }elseif ($k == '04'){
            $total_apr += 1;
        }elseif ($k == '05'){
            $total_mei += 1;
        }elseif ($k == '06'){
            $total_jun += 1;
        }elseif ($k == '08'){
            $total_agus += 1;
        }
        elseif ($k == '09'){
            $total_sept += 1;
            }
            elseif ($k == '10'){
                $total_okto += 1;
                }elseif ($k == '11'){
                    $total_nove += 1;
                    }elseif ($k == '12'){
                        $total_dese += 1;
                        }}

    }
        return view('admin2.isi', compact( 'total_juli', 'total_agus', 'total_sept', 'total_okto', 'total_nove', 'total_dese', 'total_jan', 'total_feb', 'total_mar', 'total_apr', 'total_mei', 'total_jun', 'thn_sekarang'));
    }
    
}
