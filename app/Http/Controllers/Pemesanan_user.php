<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pemesanan;
use App\Models\Wisata;

use Auth;

class Pemesanan_user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/user_view.isi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pemesanan;
        return view('user_view.isi', compact(
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
        $join = join(',',$request->input('fasilitas'));
        $model = new Pemesanan;
        $model->users_id = Auth::user()->id;
        $model->wisata_id = $request->nama_wisata;
        $model->fasilitas_id = $join;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->tagihan = $request->tagihan;
        $model->status_pemesanan = 'Menunggu Verifikasi';
        $model->reschedule = '-';
        $model->refund = '-';
        $model->save();

        return redirect('user_view');
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
        return view('user_view.reschedule', compact(
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
        
        $join = join(',',$request->input('fasilitas_id'));
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->reschedule = 'Berhasil Reschedule';
        // $model->refund = '-';
        $model->save();

        return redirect('tiket');
    }

    public function refund($id)
    {
        $datawisata = Pemesanan::find($id);
        $datawisata->refund = 'Menunggu Persetujuan';
        $datawisata->save();

        return redirect('tiket');
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
        return redirect('tiket');
    }

    public function coba(Request $request)
    {
        $value = $request->wisata_id;
        //dd($request);
        //$datas = Wisata::find($value);
        $datas = DB::table('wisata')
            ->join('fasilitas', 'wisata.id', '=', 'fasilitas.id')
            ->where('fasilitas_id')
            ->get();
        //dd($datas);
        return view('user_view.pemesanan', compact(
            'datas', 'value'
        ));
    }
}
