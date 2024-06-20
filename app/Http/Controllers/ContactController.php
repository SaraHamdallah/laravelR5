<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|exists:users,name',
            'email' => 'required|email|max:255|exists:users,email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ],[
            'name.exists' => 'The name does not exist in our records.',
            'email.exists' => 'The email does not exist in our records.',
        ]);

        Mail::to('recipient@email.com')->send(new ContactMail(
            fromEmail: $validatedData['email'],
            fromName: $validatedData['name'],
            theSubject: $validatedData['subject'],
            theMessage: $validatedData['message'],
            recipientName: 'John'
        ));

        return redirect()->route('contact.form')->with('success', 'Mail sent!');
    }}
