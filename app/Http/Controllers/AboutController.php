<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends SiteController
{
    public function index(Request $request, $lang = 'en') {
        if ($request->ajax()) {
            $title = 'title_' . $lang;
            $text = 'text_' . $lang;
            $aboutData = About::select($title, $text, 'image')->first();
            $about = ['title' => $aboutData->$title, 'text' => $aboutData->$text, 'image' => $aboutData->image];
            return response()->json($about);
        } else {
            return view('triangle');
        }
    }
}
