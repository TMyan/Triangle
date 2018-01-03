<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends SiteController
{
    public function index(Request $request, $lang = 'en') {
        if ($request->isMethod('post')) {
            $title = 'title_' . $lang;
            $text = 'text_' . $lang;
            $address = 'address_' . $lang;
            $contactData = Contact::select("$title as title", "$text as text", "$address as address", 'email', 'phone', 'image')->first();
            return response()->json($contactData);
        } else {
            return view('triangle');
        }
    }
}
