<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use App\Models\FasilitasWisata;
use App\Models\Wisata;
use App\Models\User;
use App\Models\DaftarWisata;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Transaksi::all();
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
        $dfas = Transaksi::all();
        return view('admin2.pemesanan.create_pemesanan', compact(
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
        $model = new Transaksi;
        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->tagihan = $request->tagihan;
        $model->status_pemesanan = $request->status_pemesanan;
        $model->reschedule = $request->reschedule;
        $model->refund = $request->refund;
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
        $model = Transaksi::find($id);
        $fas = FasilitasWisata::all();
        return view('admin2.pemesanan.update_pemesanan', compact(
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
        $model = Transaksi::find($id);

        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->Tanggal_Kunjungan = $request->Tanggal_Kunjungan;
        $model->jumlah = $request->jumlah;
        $model->tagihan = $request->tagihan;
        $model->status_pemesanan = $request->status_pemesanan;
        $model->reschedule = $request->reschedule;
        $model->refund = $request->refund;
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
        $model = Transaksi::find($id);
        $model->delete();
        return redirect('tbl_pemesanan');
    }

    public function detail($id)
    {
        $datas = Transaksi::where('id',$id)->get();
        // dd($datas);
        return view('admin2.pemesanan.detail', compact(
            'datas'
        ));
    }
    
    public function gantistatus($id)
    {
        $datawisata = Transaksi::find($id);
        $datawisata->status_pemesanan = 'Berhasil Pesan';
        $datawisata->save();
        $dw = DaftarWisata::where('id', $datawisata->wisata_id)
            ->first();
        $dw->kuota -=(int)$datawisata->jumlah;
        if($dw->kuota == 0)
        {
            $dw->keterangan = "Kuota Penuh";
        }
        $dw->save();

        return redirect('/reschedule');
    }
    
    public function gantirefund($id)
    {
        $datawisata = Transaksi::find($id);
        $datawisata->refund = 'Pemesanan Berhasil Dibatalkan';
        $datawisata->save();
        $dw = DaftarWisata::where('id', $datawisata->wisata_id)
            ->first();
        $dw->kuota +=(int)$datawisata->jumlah;
        if($dw->kuota > 0)
        {
            $dw->keterangan = "Tersedia";
        }
        $dw->save();

        return redirect('tbl_pemesanan');
    }

    public function selesai($id)
    {
        $datawisata = Transaksi::find($id);
        $datawisata->status_pemesanan = 'Pemesanan Selesai';
        $datawisata->save();
        $dw = Wisata::where('id', $datawisata->wisata_id)
            ->first();
        $dw->kuota +=(int)$datawisata->jumlah;
        if($dw->kuota > 0)
        {
            $dw->keterangan = "Tersedia";
        }
        $dw->save();

        return redirect('/pemesananselesai');
    }

    public function cetakLaporan()
    {
        return view('admin2.pemesanan.cetak');
    }

    public function sortir(Request $request)
    {
        $startDate = Str::before($request->tanggal_awal, ' -');
        $endDate = Str::after($request->tanggal_akhir, '- ');
        switch ($request->submit) {
            case 'table':

                $data = Transaksi::all()
                    ->whereBetween('Tanggal_Kunjungan', [$startDate, $endDate]);
             
                return view('admin2.pemesanan.cetak', compact( 'data', 'startDate', 'endDate'));
                break;
        }
    }

    public function cetakLaporanPemesanan($start, $end)
    {
        $startDate = $start;
        $endDate = $end;
        $data = Transaksi::get()->whereBetween('Tanggal_Kunjungan', [$startDate, $endDate]);
        // // dd($datas);
        // // view()->share('datas', $datas);
        $pdf = PDF::loadview('admin2.pemesanan.cetak-pertanggal', ['data'=>$data]);
        return $pdf->download('laporan.pdf');

        //return view('admin2.pemesanan.cetak-pertanggal', compact('data'));
    }

    public function verifikasi(){
        $datas = Transaksi::where('status_pemesanan', 'Menunggu Verifikasi')->get();
        return view('admin2.pemesanan.verifikasi', compact(
            'datas'
        ));
    }
    public function reschedule(){
        $datas = Transaksi::where('status_pemesanan', 'Berhasil Pesan')
        ->get();
        return view('admin2.pemesanan.reschedule', compact(
            'datas'
        ));
    }
    public function pemesananselesai(){
        $datas = Transaksi::where('status_pemesanan', 'Pemesanan Selesai')->get();
        return view('admin2.pemesanan.selesai', compact(
            'datas'
        ));
    }


}
