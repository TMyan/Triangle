<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mockery\Exception;

class ContactController extends Controller
{
    public function index(Request $request, $lang = 'en') {
        if ($request->isMethod('post')) {
            if (! $request->has('data')){
                $title = 'title_' . $lang;
                $text = 'text_' . $lang;
                $address = 'address_' . $lang;
                $contactData = Contact::select("$title as title", "$text as text", "$address as address", 'email', 'phone', 'image', 'latitude', 'longitude')->first();
                return response()->json($contactData);
            } else {
                $this->validate($request, [
                    'name' => 'required',
                    'phone' => 'required|integer|min:10',
                    'email' => 'required|email',
                    'subject' => 'required',
                    'message' => 'required',
                ]);
                return response()->json(["message" => "success"]);
            }
        } else {
            return view('triangle');
        }
    }
}
