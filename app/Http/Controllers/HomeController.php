<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        if(Auth::check() && auth()->user()->role === 1){
            return redirect(route('admin.home'));
        }

        $products = Product::orderBy('created_at', 'desc')->limit(5)->get();
        return view('frontend.home', compact('products'));
    }
}
