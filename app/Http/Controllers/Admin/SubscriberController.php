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
            $notification = [
                'message'=>'Thank you',
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
        $delete = subscriber::findOrFail($id)->delete();
        if($delete){
            $notification = [
                'message'=>'Subscriber deleted',
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
