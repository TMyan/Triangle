<?php

namespace App\Http\Controllers;

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
                return $this->manyProduct($request);
            }
        } else {
            return view('triangle');
        }
    }


    public function firstProduct () {
        $option = 'options_' . $this->language;
        $productData = $this->table->select("$option as option", 'photos')->where('id', $this->product_id)->first();
        return response()->json($productData);
    }


    public function manyProduct($request) {

        $skip = $request->input('options.skip');
        $take = $request->input('options.take');
        $count = null;
        $method = $this->category;
        if ($this->manufacturer) {
            $manufacturer = Manufacturer::where('name', $this->manufacturer)->first();
            if ($request->has('options.filter')){
                $filter = $request->input('options.filter');
                if ($request->has('options.count')){
                    $count = $manufacturer->$method()->where($filter)->count();
                }
                $productsData = $manufacturer->$method()
                    ->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photos')
                    ->where($filter)
                    ->skip($skip)->take($take)->get();
            } else {
                if ($request->has('options.count')) {
                    $count = $manufacturer->$method()->count();
                }
                $productsData = $manufacturer->$method()
                    ->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photos')
                    ->skip($skip)->take($take)->get();
            }

        } else {
            if ($request->has('options.filter')) {
                $filter = $request->input('options.filter');
                if ($request->has('options.count')){
                    $count = $this->table->where($filter)->count();
                }
                $productsData = $this->table->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photos')
                    ->where($filter)
                    ->skip($skip)->take($take)->get();
            } else {
                if ($request->has('options.count')) {
                    $count = $this->table->count();
                }
                $productsData = $this->table->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photos')
                    ->skip($skip)->take($take)->get();
            }
        }

        $filters = $this->filters();
        return response()->json(['data' => $productsData, 'filters' => $filters, 'count' => $count]);
    }

    public function filters () {
        $name = 'name_' . $this->language;
        $data = 'filter_' . $this->language;
        $category = Category::where('name', $this->category)->first();
        $filters = $category->filters()->select("$name as name", "$data as data")->get();
        foreach ($filters as $filter) {
            $filter->data = json_decode($filter->data);
        }
       return $filters;
    }

}
