<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return response()->json([ 
            "contacts" => $contacts
        ]);

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250',
            'email' => 'required|max:120',
            'subject' => 'required|max:350',
            'message' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;

            $contact->save();

            return response()->json([
                'status' => 200,
                'contact' => $contact,
                'message' => 'Tu mensaje se ha registrado correctamente. Nos pondremos en contacto contigo muy pronto.',
            ]);
        }
    }
}
