<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NavigationController extends Controller
{
    public function index($lang = 'en') {
         $name = 'name_'.$lang;
         $navData = DB::table('navigation')
                   ->select('id', 'name_'.$lang, 'alias', 'sub_level_one_id', 'sub_level_two_id')->get();


         $level1 = [];
         foreach ($navData as $item1) {
             $alias1 = '/' . $lang . $item1->alias;
             if ($item1->sub_level_one_id === 0 && $item1->sub_level_two_id === 0) {
                 $level2 = [];
                foreach ($navData as $item2) {
                    $alias2 = $alias1 . $item2->alias;
                    if ($item1->id === $item2->sub_level_one_id) {
                        $level3 = [];
                        foreach ($navData as $item3) {
                            $alias3 = $alias2 . $item3->alias;
                            if ($item2->id === $item3->sub_level_two_id) {
                               $level3[] = ["name" => $item3->$name, "alias" => $alias3];
                            }
                        }
                        $level2[] = ["name" => $item2->$name, "alias" => $alias2, "sub" => $level3];
                    }

                }
                $level1[] = ["name" => $item1->$name, "alias" => $alias1, "sub" => $level2];
             }
         }

         return response()->json($level1);
    }
}
