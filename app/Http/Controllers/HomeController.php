<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        if(auth()->user()->role === 1){
            return redirect(route('admin.home'));
        }
        $username = User::findOrFail(auth()->id())->name;
        return view('frontend.home', compact('username'));
    }
}
