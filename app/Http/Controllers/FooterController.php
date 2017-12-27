<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FooterController extends Controller
{
    public function index($lang = 'en') {
        $footer = DB::table('footer')->select('text_'.$lang)->get();
        return response()->json($footer);
    }
}
