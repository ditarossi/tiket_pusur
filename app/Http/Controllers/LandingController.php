<?php

namespace App\Http\Controllers;
use App\Models\Wisata;
use App\Models\Kegiatan;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $datas = Wisata::all();
        $keg = Kegiatan::all();
        
        return view('landing.isi', compact(
            'datas','keg'
        ));
    }

    public function detail($id)
    {
        $datas = Wisata::all();
        return view('landing.detail', compact(
            'datas'
        ));
    }

    public function halo(Request $request)
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

        // Send mail to admin
        Mail::send('emails.contactMail', array(
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

}
