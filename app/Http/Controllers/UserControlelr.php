<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;

class UserControlelr extends Controller
{
    function index(){
        $user = User::select('name', 'email')->where('id', auth()->id())->first();
        return view('users.view-user', compact('user'));
    }

    function editPassword(){
        return view('auth.change-password');
    }

    function updatePassword(Request $request){

    }
}
