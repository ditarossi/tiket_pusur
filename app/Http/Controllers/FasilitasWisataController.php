<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasWisata;
use App\Models\Wisata;
use App\Models\Fasilitas;

class FasilitasWisataController extends Controller
{
    public function index()
    {
        $datas = FasilitasWisata::all();
        return view('admin2.fasilitasWisata.tabel_fasilitasWisata', compact(
            'datas'
        ));
    }

    public function create()
    {
        $model = new FasilitasWisata;
        $wisata = Wisata::all();
        $fasi = Fasilitas::all();
        return view('admin2.fasilitasWisata.create_fasilitasWisata', compact(
            'model', 'wisata', 'fasi'
        ));
    }

    public function store(Request $request)
    {
        $model = new FasilitasWisata;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->save();

        return redirect('tbl_fasilitasWisata');
    }

    public function destroy($id)
    {
        $model = FasilitasWisata::find($id);
        $model->delete();
        return redirect('tbl_fasilitasWisata');
    }
}
