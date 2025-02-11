<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    function CreateBrand(Request $request){
        $user_id=$request->header('id');

        // Prepare File Name & Path
        $img=$request->file('img');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";
        $img_url="uploads/{$img_name}";


        // Upload File
        $img->move(public_path('uploads'),$img_name);


        // Save To Database
        return Brand::create([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'img_url'=>$img_url,
            'user_id'=>$user_id
        ]);
    }


    function BrandList(Request $request){
        $user_id=$request->header('id');
        return Brand::all();
        // return Brand::where('user_id',$user_id)->get();
    }










}


