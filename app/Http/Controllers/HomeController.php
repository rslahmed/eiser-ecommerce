<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('frontend.home', compact('products'));
    }

    public function shop()
    {
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('frontend.shop', compact('products'));
    }
}
