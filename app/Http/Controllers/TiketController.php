<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Resi;
use App\Models\BuktiTf;
use App\Models\Wisata;
use App\Models\Fasilitas;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Tiket::all();
        return view('admin2.tiket.tabel_tiket', compact(
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
        $model = new Tiket;
        return view('admin2.tiket.create_tiket', compact(
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
        $model = new Tiket;
        $model->pemesanan_id = $request->pemesanan_id;
        $model->users_id = $request->users_id;
        $model->resi_id = $request->resi_id;
        $model->bukti_transaksi_id = $request->bukti_transaksi_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->status_pembayaran = $request->status_pembayaran;
        $model->save();

        return redirect('tbl_tiket');
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
        $model = Tiket::find($id);
        return view('admin2.tiket.update_tiket', compact(
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
        $model = Tiket::find($id);

        $model->pemesanan_id = $request->pemesanan_id;
        $model->users_id = $request->users_id;
        $model->resi_id = $request->resi_id;
        $model->bukti_transaksi_id = $request->bukti_transaksi_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->status_pembayaran = $request->status_pembayaran;
        $model->save();

        return redirect('tbl_tiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Tiket::find($id);
        $model->delete();
        return redirect('tbl_tiket');
    }
}
