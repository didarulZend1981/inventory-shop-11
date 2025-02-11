<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function SupplierCreate(Request $request){

        try {
            $user_id=$request->header('id');

            Supplier::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'address'=>$request->input('address'),
                'companyName'=>$request->input('companyName'),
                'mobile'=>$request->input('mobile'),
                'user_id'=>$user_id
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Supplier create Successfully'
            ],200);
        }

        catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()],201);
        }



    }


















}
