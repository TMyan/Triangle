<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index(Request $request, $lang = 'en') {
        if ($request->isMethod('post')) {
            if (! $request->has('data')){
                $title = 'title_' . $lang;
                $text = 'text_' . $lang;
                $address = 'address_' . $lang;
                $serviceData = Service::select("$title as title", "$text as text", "$address as address", 'email', 'phone', 'image')->first();
                return response()->json($serviceData);
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
