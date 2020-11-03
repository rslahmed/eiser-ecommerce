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
        $notification = [];
        if($create){
            $notification = [
                'message'=>'Category added',
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


    public function update($id){
        $data = request()->validate([
            'name' => 'required|string|max:25|min:3|unique:categories'
        ]);

        $update = Category::findOrFail($id)->update($data);
        $notification = [];
        if($update){
            $notification = [
                'message'=>'Category updated',
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
    public function destroy($id){
        $delete = Category::findOrFail($id)->delete();
        if($delete){
            $notification = [
                'message'=>'Category deleted',
                'alert-type'=>'error'
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
