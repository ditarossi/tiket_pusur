<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $wisata_list = DB::table('fasilitaswisata')
        ->groupBy('nama_wisata')
        ->get();
        return view('user_view.form_order', compact(
            'wisata_list'
        ));
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('fasilitaswisata')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get(); 
        $output = '<option value = "">Select '.($dependent).'</option>'; 
        foreach($data as $row)
        {
            $output = $output.'<option value = "'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo($output);
    }
}
