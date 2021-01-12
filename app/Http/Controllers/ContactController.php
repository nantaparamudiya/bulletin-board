<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;

class ContactController extends Controller
{
    private $app_email = 'example@example.com';
    private $app_name = 'Bulletin Board';

    public function index()
    {
        return view('contact');
    }

    public function sendMail(ContactUsRequest $request)
    {
        $data = $request->validated();

        unset($data['g-recaptcha-response']);

        $contact = new Contact;

        if (! isset($data['name'])) {
            $contact->setFullNameAttribute($data);

            unset($data['first_name']);
            unset($data['last_name']);
        } else {
            $contact->name = $data['name'];
        }

        $contact->phone = $data['phone'];
        $contact->email = $data['email'];
        $contact->body = $data['body'];
        $contact->save();

        $userContact = Contact::find($contact->id);

        $data['name'] = $userContact->name;

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
