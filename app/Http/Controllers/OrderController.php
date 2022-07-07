<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FasilitasWisata;
use App\Models\DaftarWisata;

class OrderController extends Controller
{
    public function index()
    {
        $wisata_list = FasilitasWisata::
        groupBy('wisata_id')
        ->get();
        $datas = DaftarWisata::all();
        return view('user_view.form_order', compact(
            'wisata_list', 'datas'
        ));
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = FasilitasWisata::where($select, $value)
        ->groupBy($dependent)
        ->get(); 
        $output = '<option value = "">Select '.($dependent).'</option>'; 
        foreach($data as $row)
        {
            $output = $output.'<option value = "'.$row->$dependent.'">'.$row->fasilitas->fasilitas.'</option>';
        }
        echo($output);
    }
}
