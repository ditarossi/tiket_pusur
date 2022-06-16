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
        $join = join(',',$request->input('fasilitas_id'));
        
        $product_attribute = Pemesanan::where([
            'users_id' => $model['users_id'], 
            'wisata_id' => $model['wisata_id'],
            'fasilitas_id' => $model['fasilitas_id'],
            'Tanggal_Kunjungan' => $model['Tanggal_Kunjungan'],
            'jumlah' => $model['jumlah'],
            'tagihan' => $model['tagihan'],
            'status_pembayaran' => $model['status_pembayaran']
            ])->first();
        if($product_attribute){
            $kuota = $product_attribute->kuota - (int) $request->jumlah;
            $product_attribute->update(['kuota' => $kuota]);
        }

        $model->nama_wisata = $request->nama_wisata;
        $model->fasilitas_id = $join;
        $model->deskripsi = $request->deskripsi;
        //$model->kuota = $request->kuota;
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
