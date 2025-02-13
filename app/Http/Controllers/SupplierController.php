<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    function SupplierPage(){
        return view('pages.dashboard.supplier-page');
    }


    function SupplierCreate(Request $request){
        // dd($request->all());

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


    function SupplierList(Request $request){
        $user_id=$request->header('id');
        // return Supplier::where('user_id',$user_id)->get();
        return Supplier::all();
    }

    function SupplierByID(Request $request){
        $Supplier_id=$request->input('id');
        $user_id=$request->header('id');
        return Supplier::where('id',$Supplier_id)->where('user_id',$user_id)->first();
    }

    function SupplierUpdate(Request $request){
        $supplier_id=$request->input('id');
        $user_id=$request->header('id');
        return Supplier::where('id',$supplier_id)->where('user_id',$user_id)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'companyName'=>$request->input('companyName'),


        ]);
    }


    function SupplierDelete(Request $request){
        $supplier_id=$request->input('id');
        $user_id=$request->header('id');
        return Supplier::where('id',$supplier_id)->where('user_id',$user_id)->delete();
    }




















}
