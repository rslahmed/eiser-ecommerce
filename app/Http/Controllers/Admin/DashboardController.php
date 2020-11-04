<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        return view('backend.dashboard');
    }

    function homeSetting(){
        $tags = Tags::all();
        return view('backend.pages.home_setting', compact('tags'));
    }
}
