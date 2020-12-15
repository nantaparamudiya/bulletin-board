<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    private $app_email = 'example@example.com';
    private $app_name = 'Bulletin Board';
    private $rules = [
        'name'     => ['required'],
        'email'    => ['required', 'email:rfc,dns'],
        'text'  => ['required'],
    ];

    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'text' => $request->get('message')
        ];

        $validator = Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Mail::send("emails.mail", $data, function ($message) use ($request){
            $message->to($request->email, $request->name);
        });

        $data['app_email'] = $this->app_email;
        $data['app_name'] = $this->app_name;

        Mail::send("emails.mailtous", $data, function ($message) use ($data){
            $message->to($data['app_email'], $data['app_name']);
        });

        return redirect()->back()->with('success', 'Thank you for contact us!');
    }
}
