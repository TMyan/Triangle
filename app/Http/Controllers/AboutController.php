<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends SiteController
{
    public function index(Request $request, $lang = 'en') {
        if ($request->isMethod('post')) {
            $title = 'title_' . $lang;
            $text = 'text_' . $lang;
            $aboutData = About::select("$title as title", "$text as text", 'image')->first();
            return response()->json($aboutData);
        } else {
            return view('triangle');
        }
    }
}
