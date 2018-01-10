<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;

class ProductController extends Controller
{
    public $table;
    public $category ;
    public $language;
    public $manufacturer;
    public $product_id;

    public function __construct($table, $category)
    {
        $this->table = $table;
        $this->category = $category;
        $this->language = null;
        $this->manufacturer = null;
        $this->product_id = null;
    }



    public function universal ($request, $lang, $manufacturer, $product_id) {

        $this->language = $lang;
        $this->manufacturer = $manufacturer;
        $this->product_id = $product_id ? (explode('_', $product_id))[1] : null;

        if ($request->isMethod('post')) {
            if ($this->product_id) {
                return $this->firstProduct();
            } else {

            }
        } else {
            return view('triangle');
        }
    }


    public function firstProduct () {
        $option = 'options_' . $this->language;
        $productData = $this->table->select("$option as 'option'", 'photos')->where('id', $this->product_id)->first();
        return response()->json($productData);
    }





    public function manyProduct($request) {

        $skip = $request->input('option.skip');
        $take = $request->input('option.take');
        $count = null;
        $method = $this->category;
        if ($this->manufacturer) {
            if ($request->input('option.filter')){


            } else {
                if ($request->input('option.count')) {
                    $count = Manufacturer::where('name', $this->manufacturer)->$method()->count();
                }
                $productsData = Manufacturer::where('name', $this->manufacturer)->$method()
                    ->select('model', 'price', 'are_available', 'status', 'like', 'not_like', 'photos')
                    ->skip($skip)->take($take)->get();
            }

        } else {
            if ($request->input('option.filter')) {

            } else {
                if ($request->input('option.count')) {
                    $count = $this->table->count();
                }
                $productsData = $this->table->select('model', 'price', 'are_available', 'status', 'like', 'not_like', 'photos')
                    ->skip($skip)->take($take)->get();
            }
        }

        $filters = Category::where('name', $this->category)->filters;
        return response()->json(['data' => $productsData, 'filters' => $filters, 'count' => $count]);
    }


    public function filterParse ($filter) {

    }


}
