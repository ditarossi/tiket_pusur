<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Fasilitas;
use App\Models\Pemesanan;

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
        return view('admin2.wisata.tabel_wisata', compact(
            'datas'
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
        return view('admin2.wisata.create_wisata', compact(
            'model'
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
        $model = new Wisata;
        $model->nama_wisata = $request->nama_wisata;
        $model->deskripsi = $request->deskripsi;
        $model->kuota = $request->kuota;
        $model->harga = $request->harga;
        // $model->keterangan = $request->keterangan;
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
        return view('admin2.wisata.update_wisata', compact(
            'model'
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
        $data = $request->all();
        if($request->file('foto'))
        {
            $path = $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
            $data['foto'] = $path;
        }
        $model->update($data);

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
