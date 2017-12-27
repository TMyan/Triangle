<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SiteController extends Controller
{

    public function dataPage(Request $request, $lang) {
        if ($request->ajax()) {

        } else {
            return view('triangle');
        }
    }
}
