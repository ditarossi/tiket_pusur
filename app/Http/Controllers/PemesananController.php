<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Fasilitas;
use App\Models\Wisata;
use App\Models\User;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pemesanan::all();
        return view('admin2.pemesanan.tabel_pemesanan', compact(
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
        $model = new Pemesanan;
        return view('admin2.pemesanan.create_pemesanan', compact(
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
        $model = new Pemesanan;
        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->tagihan = $request->tagihan;
        $model->status_pembayaran = $request->status_pembayaran;
        $model->save();

        return redirect('tbl_pemesanan');
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
        $model = Pemesanan::find($id);
        return view('admin2.pemesanan.update_pemesanan', compact(
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
        $model = Pemesanan::find($id);

        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->tagihan = $request->tagihan;
        $model->status_pembayaran = $request->status_pembayaran;
        $model->save();

        return redirect('tbl_pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pemesanan::find($id);
        $model->delete();
        return redirect('tbl_pemesanan');
    }
}
