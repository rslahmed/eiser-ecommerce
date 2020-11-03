<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index(){
        return view('backend.pages.coupon',[
            'coupons' => Coupon::paginate(10)
        ]);
    }

    function store(){
        $data = request()->validate([
            'coupon' => 'required|string',
            'discount' => 'required|string'
        ]);

        $create = Coupon::create($data);
        if($create){
            $notification = [
                'message'=>'Coupon added',
                'alert-type'=>'success'
            ];
        }else{
            $notification = [
                'message'=>'Something went wrong, please try again',
                'alert-type'=>'error'
            ];
        }
        return back()->with($notification);
    }

    function update($id){
        $data = request()->validate([
            'coupon' => 'required|string',
            'discount' => 'required|string'
        ]);

        $create = Coupon::findOrFail($id)->update($data);
        if($create){
            $notification = [
                'message'=>'Coupon updated',
                'alert-type'=>'success'
            ];
        }else{
            $notification = [
                'message'=>'Something went wrong, please try again',
                'alert-type'=>'error'
            ];
        }
        return back()->with($notification);
    }

    function destroy($id){

        $delete = Coupon::findOrFail($id)->delete();
        if($delete){
            $notification = [
                'message'=>'Coupon deleted',
                'alert-type'=>'success'
            ];
        }else{
            $notification = [
                'message'=>'Something went wrong, please try again',
                'alert-type'=>'error'
            ];
        }
        return back()->with($notification);
    }
}
