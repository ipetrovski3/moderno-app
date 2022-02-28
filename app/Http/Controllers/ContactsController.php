<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function new()
    {
        return view('public.contact-us');
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->title = $request->title;
        $contact->name = $request->name;
        $contact->save();

        return 'success';
    }
}
