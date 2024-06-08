<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function SendEmail(Request $request)
    {
        $details = [
            'title' => $request->subject,
            'body' => $request->msj,
            'name' => $request->name,
            'email' => $request->email,
        ];
        Mail::to("skinsense1213@gmail.com")->send(new TestMail($details));
        return redirect()->route('home')->with([
            'success-mail' => 'Email Sent'
        ]);
    }
}