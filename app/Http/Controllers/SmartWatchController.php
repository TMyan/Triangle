<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmartWatch;

class SmartWatchController extends ProductController
{
    public function __construct()
    {
        parent::__construct(new SmartWatch() , 'smartWatches');
    }

    public function index(Request $request, $lang, $manufacturer = null, $product_id = null) {
        return $this->universal ($request, $lang, $manufacturer, $product_id);
    }
}
