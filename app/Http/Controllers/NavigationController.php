<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NavigationController extends Controller
{
    public function index($lang = 'en') {
         $header = DB::table('navigation')
                   ->select('id', 'name_'.$lang, 'alias', 'sub_level_one_id', 'sub_level_two_id')->get();
         return response()->json($header);
    }
}
