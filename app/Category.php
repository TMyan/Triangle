<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function filters() {
       return $this->belongsToMany('App\Filter', 'filter_category');
    }
}
