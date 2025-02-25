<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $fillable = [
        'name','status','img_url','user_id'
    ];

    public function productNames(){
        return $this->hasMany('App\Models\ProductName');
    }


}
