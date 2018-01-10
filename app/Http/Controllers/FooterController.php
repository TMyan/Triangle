<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FooterController extends Controller
{
    public function index($lang) {
        $text = "text_" . $lang;
        $footerData = DB::table('footer')->select('text_'.$lang)->get();
        $footer = [];
        foreach ($footerData as $item) {
            $footer = ["text" => $item->$text];
        }
        return response()->json($footer);
    }
}
