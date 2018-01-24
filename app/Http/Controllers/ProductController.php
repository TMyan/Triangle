<?php

namespace App\Http\Controllers;

use App\Category;


class ProductController extends Controller
{
    public $table;
    public $category;
    public $language;
    public $product_id;

    public function __construct($table, $category)
    {
        $this->table = $table;
        $this->category = $category;
        $this->language = null;
        $this->product_id = null;
    }


    public function universal ($request, $lang, $product_id) {

        $this->language = $lang;
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
        $optionsAll = 'options_all_' . $this->language;
        $optionsBasic = 'options_basic_' . $this->language;
        $productData = $this->table->select("$optionsBasic as optionsBasic", "$optionsAll as optionsAll", 'photos')->where('id', $this->product_id)->first();
        $optionsBasic = json_decode($productData->optionsBasic);
        $optionsAll = json_decode($productData->optionsAll);
        $photos = json_decode($productData->photos);
        return response()->json(['basic' => $optionsBasic, 'more' => $optionsAll, 'photos' => $photos]);
    }


    public function manyProduct($request) {

        $skip = config('product.skip');
        $take = config('product.take');
        $page = $request->has('options.page') ? $request->input('options.page') : 1;
        $count = null;

        if (! $request->has('options')) {
            $count = $this->table->count();
            $productsData = $this->table->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photo')
                                        ->take($take)->get();
            $filters = $this->filters();
            return response()->json(['data' => $productsData, 'filters' => $filters, 'count' => $count]);
        } else {
            if ($request->has('options.filter')) {
                $filter = $request->input('options.filter');
                $whereIn = $filter[0];
                $where = $filter[1];
                $query = $this->table;
                foreach ($whereIn as $item) {
                    $query = $query->whereIn($item[0], $item[1]);
                }
                if (count($where)) {
                   $query = $query->where($where);
                }
                $productsData = $query->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photo')
                                      ->skip($skip * ($page - 1))->take($take)->get();
                if ($request->has('options.count')){
                    $count = $query->count();
                }
            } else {
                if ($request->has('options.count')) {
                    $count = $this->table->count();
                }
                $productsData = $this->table->select('id', 'model', 'price', 'are_available', 'status', 'likes', 'dislikes', 'photo')
                                            ->skip($skip * ($page - 1))->take($take)->get();
            }

            return response()->json(['data' => $productsData, 'count' => $count]);
        }

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
