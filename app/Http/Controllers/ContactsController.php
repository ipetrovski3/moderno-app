<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function new()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'title' => 'required',
                'message' => 'required'
            ],
            [
                'name.required' => 'Полето Име неможе да биде празно',
                'email.required' => 'Полето Емаил неможе да биде празно',
                'email.email' => 'Полето Емаил мора да биде во форма на правилен емаил',
                'title.required' => 'Полето Наслов неможе да биде празно',
                'message.required' => 'Полето Порака неможе да биде празно',
            ]
        );


        $contact = new Contact;
        $contact->fill($request->all());
        $contact->save();

        return redirect()->route('homepage')->with(['success' => 'Ви благодариме за Вашиот интерес, ќе Ве контактираме за најкус можен рок.']);
    }
}
