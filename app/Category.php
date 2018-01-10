<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function filters() {
        $this->belongsToMany('App\Filter');
    }
}
