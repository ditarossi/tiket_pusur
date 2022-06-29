<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Fasilitas;
use App\Models\Pemesanan;
use App\Models\Kegiatan;
use App\Models\Contact;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;

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
        $datas = Wisata::all();
        $f = Fasilitas::all();
        $keg = Kegiatan::all();
        return view('user_view.isi', compact(
            'datas', 'f', 'keg'
        ));
    }

    public function download($id)
    {

        $user = request()->user();

        $datas = Pemesanan::where('id', $id)->where('users_id', $user->id)->get();
        //view()->share('datas', $datas);
        $pdf = PDF::loadView('user_view.tiket-pdf',['datas'=>$datas]);
        return $pdf->download('tiket-pusur.pdf');

    }

    public function tiket()
    {
        $user = request()->user();

        $tiket = Pemesanan::where('users_id', $user->id)->get();
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
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|digits:10|numeric',
        //     'subject' => 'required',
        //     'message' => 'required',
        // ]);

        // //$input = $request->all();
        // $input = new Contact($request->all());
        // $input->save();

        $input = new Contact;
        $input->name = $request->name;
        $input->email = $request->email;
        $input->phone = $request->phone;
        $input->subject = $request->subject;
        $input->message = $request->message;
        $input->save();

        //  Send mail to admin
        // Mail::send('emails.contactMail', array(
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'phone' => $input['phone'],
        //     'subject' => $input['subject'],
        //     'message' => $input['message'],
        // ), function($message) use ($request){
        //     $message->from($request->email);
        //     $message->to('admin@admin.com', 'Admin')->subject($request->get('subject'));
        // });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }

}
