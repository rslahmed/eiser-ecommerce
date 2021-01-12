<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(){
        if(Auth::check() && auth()->user()->role === 1){
            return view('backend.dashboard');
        }
        return redirect(route('home'));

    }

    function homeSetting(){
        $tags = Tags::all();
        return view('backend.pages.home_setting', compact('tags'));
    }
}
