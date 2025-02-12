<?php

namespace App\Http\Controllers;

use App\Models\ProductName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductNameController extends Controller
{
    function CreateProductName(Request $request){


        $user_id=$request->header('id');

        // Prepare File Name & Path
        $img=$request->file('img');
        // dd($request->all());
        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";
        $img_url="uploads/{$img_name}";


        // Upload File
        $img->move(public_path('uploads'),$img_name);


        // Save To Database
        return ProductName::create([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'img_url'=>$img_url,
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
            'user_id'=>$user_id
        ]);

    }

    function ProductNameList(Request $request){
        $user_id=$request->header('id');
        return ProductName::all();
        // return Brand::where('user_id',$user_id)->get();
    }

    function ProductNameID(Request $request){
        $user_id=$request->header('id');
        $product_name_id=$request->input('id');
        return ProductName::where('id',$product_name_id)->where('user_id',$user_id)->first();
    }




}
