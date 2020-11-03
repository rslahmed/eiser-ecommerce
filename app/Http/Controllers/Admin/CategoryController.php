<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.pages.category',[
            'categories' => Category::paginate(10),
        ]);
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required|string|max:25|min:3|unique:categories'
        ]);

        $create = Category::create($data);
        if($create){
            return back()->with('success', 'Category added');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }


    public function update($id){
        $data = request()->validate([
            'name' => 'required|string|max:25|min:3|unique:categories'
        ]);

        $update = Category::findOrFail($id)->update($data);
        $notification = [];
        if($update){
            return back()->with('success', 'Category updated');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }
    public function destroy($id){
        $delete = Category::findOrFail($id)->delete();
        if($delete){
            return back()->with('success', 'Category deleted');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }
}
