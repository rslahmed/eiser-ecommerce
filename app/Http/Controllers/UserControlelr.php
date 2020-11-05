<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControlelr extends Controller
{
    function index(){

        return view('users.view-user', compact('user'));
    }

    function editPassword(){
        return view('auth.change_password');
    }

    function profile(){
        $user = User::select('name', 'email')->where('id', auth()->id())->first();
        return view('frontend.users.profile', compact('user'));
    }

    function updatePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $hashPdw = auth()->user()->password;
        if(Hash::check($request->oldpassword, $hashPdw)){
            User::where('id', auth()->id())->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect(route('user.profile'))->with('success', 'Password updated');
        }else{
            return back()->with('error', 'Invalid credential');
        }
    }
}
