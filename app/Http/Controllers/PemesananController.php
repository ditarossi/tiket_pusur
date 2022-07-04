<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Fasilitas;
use App\Models\Wisata;
use App\Models\User;
use App\Models\DaftarWisata;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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
        $dfas = Fasilitas::all();
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
        $join = join(',',$request->input('fasilitas_id'));
        $model = new Pemesanan;
        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $join;
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
        $model = Pemesanan::find($id);
        $fas = Fasilitas::all();
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
        $join = join(',',$request->input('fasilitas_id'));
        $model = Pemesanan::find($id);

        $model->users_id = $request->users_id;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $join;
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
        $model = Pemesanan::find($id);
        $model->delete();
        return redirect('tbl_pemesanan');
    }
    
    public function gantistatus($id)
    {
        $datawisata = Pemesanan::find($id);
        $datawisata->status_pemesanan = 'Berhasil Pesan';
        $datawisata->save();
        $dw = DaftarWisata::where('nama_wisata', $datawisata->wisata_id)
            ->first();
        // dd($dw);
        $dw->kuota -=(int)$datawisata->jumlah;
        // dd($dw);
        $dw->save();

        return redirect('tbl_pemesanan');
    }
    
    public function gantirefund($id)
    {
        $datawisata = Pemesanan::find($id);
        $datawisata->refund = 'Pemesanan Berhasil Dibatalkan';
        $datawisata->save();
        $dw = DaftarWisata::where('nama_wisata', $datawisata->wisata_id)
            ->first();
        $dw->kuota +=(int)$datawisata->jumlah;
        $dw->save();

        return redirect('tbl_pemesanan');
    }

    public function selesai($id)
    {
        $datawisata = Pemesanan::find($id);
        $datawisata->status_pemesanan = 'Pemesanan Selesai';
        $datawisata->save();
        $dw = Wisata::where('nama_wisata', $datawisata->wisata_id)
            ->first();
        $dw->kuota +=(int)$datawisata->jumlah;
        $dw->save();

        return redirect('tbl_pemesanan');
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

                $data = Pemesanan::all()
                    ->whereBetween('Tanggal_Kunjungan', [$startDate, $endDate]);
             
                return view('admin2.pemesanan.cetak', compact( 'data', 'startDate', 'endDate'));
                break;
        }
    }

    public function cetakLaporanPemesanan($start, $end)
    {
        $startDate = $start;
        $endDate = $end;
        $data = Pemesanan::get()->whereBetween('Tanggal_Kunjungan', [$startDate, $endDate]);
        // // dd($datas);
        // // view()->share('datas', $datas);
        $pdf = PDF::loadview('admin2.pemesanan.cetak-pertanggal', ['data'=>$data]);
        return $pdf->download('laporan.pdf');

        //return view('admin2.pemesanan.cetak-pertanggal', compact('data'));
    }

}
