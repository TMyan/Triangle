<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NavigationController extends Controller
{
    public function index($lang) {
         $name = 'name_'.$lang;
         $navData = DB::table('navigation')
                   ->select('id', 'name_'.$lang, 'alias', 'sub_id')->get();


         $level1 = [];
         foreach ($navData as $item1) {
             $alias1 = '/' . $lang . $item1->alias;
             if ($item1->sub_id === 0) {
                 $level2 = [];
                foreach ($navData as $item2) {
                    $alias2 = $alias1 . $item2->alias;
                    if ($item1->id === $item2->sub_id) {
                        $level2[] = ["name" => $item2->$name, "alias" => $alias2];
                    }
                }
                $level1[] = ["name" => $item1->$name, "alias" => $alias1, "sub" => $level2];
             }
         }

         return response()->json($level1);
    }
}
