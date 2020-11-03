<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    function index(){
        return view('backend.pages.subscriber',[
            'subscribers' => subscriber::paginate(10),
        ]);
    }

    function store(){
        $data = request()->validate([
            'email' => 'required|email|unique:subscribers'
        ],
            [
                'email.unique' => 'You have already subscribe'
            ]);

        $create = subscriber::create($data);
        if($create){
            return back()->with('success', 'Thank you');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }

    function destroy($id){
        $delete = subscriber::findOrFail($id)->delete();
        if($delete){
            return back()->with('success', 'Subscriber deleted');
        }else{
            return back()->with('success', 'Coupon deleted');
        }
    }

}
