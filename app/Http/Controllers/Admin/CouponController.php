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
            return back()->with('success', 'Coupon added');
        }else{
            return back()->with('error', 'Ops, something went wrong');
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
            return back()->with('success', 'Coupon updated');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
        return back()->with($notification);
    }

    function destroy($id){

        $delete = Coupon::findOrFail($id)->delete();
        if($delete){
            return back()->with('success', 'Coupon deleted');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }
}
