<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Start;

class StartController extends SiteController
{
    public function index(Request $request, $lang = 'en') {
        return $this->dataPage($request, $lang);
    }
}
