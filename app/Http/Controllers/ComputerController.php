<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;

class ComputerController extends ProductController
{
    public function __construct()
    {
        parent::__construct(new Computer() , 'computers');
    }

    public function index(Request $request, $lang, $product_id = null) {
        return $this->universal ($request, $lang, $product_id);
    }
}
