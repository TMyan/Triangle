<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Start;

class StartController extends Controller
{
    public function index(Request $request, $lang = 'en') {
        if ($request->ajax()) {
           $title = 'title_' . $lang;
           $text = 'text_' . $lang;
           $homeData = Start::select($title, $text, 'image')->get();
           return response()->json($homeData);
        } else {
            return view('triangle');
        }
    }
}
