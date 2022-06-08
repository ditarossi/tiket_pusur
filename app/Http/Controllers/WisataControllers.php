<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Fasilitas;

class WisataControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Wisata::all();
        $dfas = Fasilitas::all();
        return view('admin2.wisata.tabel_wisata', compact(
            'datas','dfas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Wisata;
        $dfas = Fasilitas::all();
        // $data_fas = $fas->keyBy('id')->toArray();
        return view('admin2.wisata.create_wisata', compact(
            'model','dfas'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
        $join = join(',',$request->input('fasilitas_id'));
        //$hasil_split = explode(',', $value->fasilitas_id);
        // $data_fas = $fas->keyBy('id')->toArray();
        //$a = implode(",",$request->$join);
        $model = new Wisata;
        $model->nama_wisata = $request->nama_wisata;
        $model->fasilitas_id = $join;
        $model->deskripsi = $request->deskripsi;
        $model->kuota = $request->kuota;
        $model->harga = $request->harga;
        $model->keterangan = $request->keterangan;
        $model->foto = $path;
        $model->save();
        
        return redirect('tbl_wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($requst);
        $model = Wisata::find($id);
        $fas = Fasilitas::all();
        return view('admin2.wisata.update_wisata', compact(
            'model', 'fas'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Wisata::find($id);
        //NOT YET
        // if($request->hasFile('foto'))
        // {
        //      $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
        //      $model->foto = $request->file('foto')->getClientOriginalName();
        //      $model->save();
        // }
        if($request->hasFile('foto')){
            $path = $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
            $model->foto = $path;
        }
        $model->nama_wisata = $request->nama_wisata;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->deskripsi = $request->deskripsi;
        $model->kuota = $request->kuota;
        $model->harga = $request->harga;
        $model->keterangan = $request->keterangan;

        $model->save();

        return redirect('tbl_wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Wisata::find($id);
        $model->delete();
        return redirect('tbl_wisata');
    }
}
