<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FasilitasWisata;
use App\Models\DaftarWisata;
use App\Models\Wisata;
use App\Models\Transaksi;
use Fasilitas;

class OrderController extends Controller
{
    public function index(DaftarWisata $daftarWisata, Request $request)
    {
         return view ('user_view.form_order',[
                'wisata_list' => FasilitasWisata::groupBy('wisata_id')->get(),
                'datas' => DaftarWisata::orderBy('created_at', 'desc')->first(), 
                ]);
    }

    public function con_order(Request $request)
    {
        $data_tr = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('status_pemesanan', 'Berhasil Pesan') ->orWhere('status_pemesanan', 'Pending') -> orWhere('status_pemesanan', 'Menunggu Verifikasi')
            ->where('wisata_id', $request->wisata_id)
            ->where('jam', $request->cek_jam)
            ->get();
        
        $wisata_list = FasilitasWisata::groupBy('wisata_id')->get();

        // dd($data_tr);

        return view('user_view.con_order', compact(
            'data_tr', 'wisata_list'
        ));
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = FasilitasWisata::where($select, $value)
        ->groupBy($dependent)
        ->get(); 
        $output = '<option value = "">Select '.($dependent).'</option>'; 
        foreach($data as $row)
        {
            $output = $output.'<option value = "'.$row->$dependent.'">'.$row->fasilitas->fasilitas.'</option>';
        }
        echo($output);
    }

    public function detail(Request $request)
    {
        $value = $request->get('value');

        $data = DaftarWisata::where('id', $value)->first();
        echo($data->harga);
        //dd($data);
    }

    public function fasilitas(Request $request)
    {
        $value = $request->get('value');

        $size = count($value);
        $total = 0;
        // for($i=0; $i<$size; $i++){
        //     $data = DB::table('fasilitas')->where('id', $value)->first();
        //     // echo($data->harga);
        //     $total += $data->harga;
        // }
        $users = DB::table('fasilitas')
                    ->whereIn('id', $value)
                    ->get();
        return($users);
    }

    public function check(Request $request)
    {
        $tgl_kunjungan = $request->cek;
        $wisata = Wisata::where('id',$request->wisata_id)->first();
        $jam_kunjungan = $request->cek_jam;

        $data_tr = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('wisata_id', $request->wisata_id)
            ->where('jam', $request->cek_jam)
            ->whereIn('status_pemesanan', ['Pending', 'Menunggu Verifikasi', 'Berhasil Pesan'])
            ->get();

        $terpesan = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('jam', $request->cek_jam)
            ->where('wisata_id', $request->wisata_id)
            ->whereIn('status_pemesanan', ['Pending', 'Menunggu Verifikasi', 'Berhasil Pesan'])
            ->sum('jumlah');

        $kuota_awal = DB::table('daftar_wisata')->select('*')->where('id', $request->wisata_id)->first();
        $sisa = $kuota_awal->kuota - $terpesan;

        return view('user_view.ketersediaan', compact(
            'data_tr', 'terpesan', 'sisa', 'kuota_awal', 'tgl_kunjungan', 'wisata', 'jam_kunjungan'
        ));
    }

    public function checkreschedule(Request $request, $id)
    {
        $model = Transaksi::find($id);
        $data_tr = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('status_pemesanan', 'Berhasil Pesan')
            ->where('wisata_id', $model->wisata->id)
            ->where('jam', $request->cek_jam)
            ->get();
        
        $terpesan = Transaksi::where('Tanggal_Kunjungan', $request->cek)
            ->where('status_pemesanan', 'Berhasil Pesan')
            ->where('wisata_id', $model->wisata->id)
            ->where('jam', $request->cek_jam)
            ->sum('jumlah');

        $kuota_awal = DB::table('daftar_wisata')->select('*')->where('id', $model->wisata_id)->first();
        $sisa = $kuota_awal->kuota - $terpesan;

        // dd($sisa);

        return view('user_view.ketersediaan-reschedule', compact(
            'data_tr', 'terpesan', 'sisa', 'kuota_awal'
        ));
    }
}
