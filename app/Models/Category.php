<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'user_id'];
    public function productNames(){
        return $this->hasMany('App\Models\ProductName');
    }

}
