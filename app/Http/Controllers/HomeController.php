<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Fasilitas;
use App\Models\Pemesanan;
use App\Models\Kegiatan;
use App\Models\Contact;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiFasilitas;
use App\Models\DaftarWisata;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('user_view.isi', [
            'datas' => Wisata::groupBy('nama_wisata')->get(),
            'keg' => Kegiatan::all(),
            'f' => Fasilitas::all()
        ]);
    }

    public function download($id)
    {

        $user = request()->user();

        $datas = Transaksi::where('id', $id)->get();
        //view()->share('datas', $datas);
        $pdf = PDF::loadView('user_view.tiket-pdf',['datas'=>$datas])->setPaper('a6', 'landscape');;
        return $pdf->download('tiket-pusur.pdf');

    }

    public function lihat($id)
    {
        $datas = Transaksi::where('id', $id)->get();
        return view('user_view.tiket-pdf', compact(
            'datas'
        ));
    }

    public function tiket()
    {
        $user = request()->user();

        $tiket = Transaksi::select('*')
            ->join('transaksifasilitas', 'transaksi.id', '=', 'transaksifasilitas.trx_id')
            ->where('users_id', $user->id)
            ->where('status_pemesanan', 'Berhasil Pesan')
            ->orWhere('status_pemesanan', 'Menunggu Verifikasi')
            ->get();
        // dd($tiket);
        return view('user_view.tiket', compact(
            'tiket'
        ));

    }

    public function detail()
    {
        return view('user_view.detail');
    }

    public function storeContactForm(Request $request) 

    { 

        $request->validate([ 

            'name' => 'required', 

            'email' => 'required|email', 

            'phone' => 'required|digits:10|numeric', 

            'subject' => 'required', 

            'message' => 'required', 

        ]); 

 

        $input = $request->all(); 

 

        Contact::create($input); 

 

        //  Send mail to admin 

        Mail::send('landing.email-template', array( 

            'name' => $input['name'], 

            'email' => $input['email'], 

            'phone' => $input['phone'], 

            'subject' => $input['subject'], 

            'message' => $input['message'], 

        ), function($message) use ($request){ 

            $message->from($request->email); 

            $message->to('ditarossiyana12@gmail.com', 'Admin')->subject($request->get('subject')); 

        }); 

 

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']); 

    }

    public function riwayat()
    {
        $user = request()->user();

        $riwayat = Transaksi::select('*')
            
            ->where('users_id', $user->id)
            ->where('status_pemesanan', '=', 'Pemesanan Selesai')
            ->get();
        //dd($riwayat);
        return view('user_view.riwayat', compact(
            'riwayat'
        ));
    }

    public function riwayat_pemesanan()
    {
        // dd($id);
        $user = request()->user();
        $user_login = Transaksi::where('users_id', $user->id);

        $daf_wisata = DaftarWisata::first();

        $pending = Transaksi::select('*')
            ->where('users_id', $user->id)
            ->Where('status_pemesanan', 'Pending')
            ->get();

        $verif = Transaksi::select('*')
            ->where('users_id', $user->id)
            ->Where('status_pemesanan', 'Menunggu Verifikasi')
            ->get();
        
        // $terpesan = Transaksi::where('Tanggal_Kunjungan', $user->id)
        //     ->where('status_pemesanan', 'Berhasil Pesan')
        //     ->where('wisata_id', $user->id)
        //     ->sum('jumlah');

        // $kuota_awal = DB::table('daftar_wisata')->where('kuota', $user->wisata_id)->first();
        // $sisa = $kuota_awal - $terpesan;

        $proses = Transaksi::select('*')
            ->where('users_id', $user->id)
            ->Where('status_pemesanan', 'Berhasil Pesan')
            // ->orWhere('status_pemesanan', 'Berhasil Pesan')
            ->get();

        $riwayat = Transaksi::select('*')
            ->where('users_id', $user->id)
            ->where('status_pemesanan', '=', 'Pemesanan Selesai')
            ->get();
            
        return view('user_view.riwayat_pemesanan', compact(
            'pending', 'verif', 'proses', 'riwayat', 'daf_wisata'
        ));
    }
}
