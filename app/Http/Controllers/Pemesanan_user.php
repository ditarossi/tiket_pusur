<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Wisata;
use App\Models\Transaksi;
use App\Models\TransaksiWisata;
use App\Models\TransaksiFasilitas;
use App\Models\FasilitasWisata;

// use Auth;
use App\Models\DaftarWisata;

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

    public function checkout()
    {
        $transaksi = TransaksiFasilitas::all();
        return view('user_view.checkout', compact(
            'transaksi'
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
        $model = new Transaksi;
        // $data = DB::table('daftar_wisata')->where('id', $request->wisata_id)->first();

        $terpesan = Transaksi::where('Tanggal_Kunjungan', $request->Tanggal_Kunjungan)
            ->where('status_pemesanan', 'Berhasil Pesan')
            ->where('wisata_id', $request->wisata_id)
            ->sum('jumlah');

        $sisa = 50 - $terpesan;

        if($request->jumlah > $sisa){
            return redirect('order')->with('warning', 'Melebihi Kuota!');
        } else {
            $model->users_id = Auth::user()->id;
            $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
            $model->tagihan = $request->tagihan;
            $model->jumlah = $request->jumlah;
            $model->wisata_id = $request->wisata_id;
            $model->status_pemesanan = 'Menunggu Verifikasi';
            $model->reschedule = '-';
            $model->refund = '-';
            $model->bukti_transaksi = "Belum Melakukan Transaksi";
            $model->save();

            $size = count(collect($request)->get('fasilitas_id'));
            for ($i = 0; $i < $size; $i++)
            {
                $TFasilitas = new TransaksiFasilitas;

                $TFasilitas->trx_id = $model->id;
                $TFasilitas->fasilitas_id = $request->get('fasilitas_id')[$i];
                $TFasilitas->save();
            } 
            return redirect('/user_view')->with('success', 'Berhasil Pesan!');
        }
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
        $model = Transaksi::find($id);
        return view('user_view.reschedule', compact(
            'model'
        ));
    }

    public function foto ($id)
    {
        $model = Transaksi::find($id);
        return view('user_view.foto', compact(
            'model'
        ));
    }

    public function informasi_pembayaran ($id)
    {
        $model = Transaksi::find($id);
        return view('user_view.informasi_pembayaran', compact(
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
        $model = Transaksi::find($id);

        $terpesan = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('status_pemesanan', 'Berhasil Pesan')
            ->where('wisata_id', $model->wisata->id)
            ->sum('jumlah');

        $sisa = 50 - $terpesan;
        
        if($request->file('bukti_transaksi'))
        {
            $path = $request->file('bukti_transaksi')->move('fotowisata', $request->file('bukti_transaksi')->getClientOriginalName());
            $model['bukti_transaksi'] = $path;
        } else if($model->jumlah < $sisa) {
            $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
            $model->reschedule = 'Berhasil Reschedule';
        } else{
            return redirect('riwayat_pemesanan')->with('warning', 'Melebihi Kuota!');
        }
        // $model->update($data);
        $model->save();
        return redirect('riwayat_pemesanan')->with('success', 'Berhasl Reschedule');
    }

    public function refund($id)
    {
        $datawisata = Pemesanan::find($id);
        $datawisata->refund = 'Menunggu Persetujuan';
        $datawisata->save();

        return redirect('riwayat_pemesanan');
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
