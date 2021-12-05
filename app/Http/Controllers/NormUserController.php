<?php

namespace App\Http\Controllers;

use App\NormUser;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class NormUserController extends Controller
{
    public function index(){
        return view('norm.index');
    }
    
    public function contact(){
        return view('norm.contact');
    }
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        
        // save the data 

        $save = new NormUser();
        $save -> name = request()->input('name');
        $save -> email = request()->input('email');
        $save -> message = request()->input('message');
        $save -> save();

        $data = array(

            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message

        );

        Mail::to($data['email'])->send(new WelcomeMail($data));

        return redirect('contact')->with('success', 'Message sent successfully');

    }
}
