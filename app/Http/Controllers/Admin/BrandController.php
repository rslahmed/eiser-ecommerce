<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public $postImgPath = 'backend/upload/brand_logo/';
    public function index (){
        return view('backend.pages.brand', [
            'brands' => Brand::paginate(10),
        ]);
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
        ]);
        $file = request()->image;
        $image = $this->postImgPath.uniqid().time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/'.($this->postImgPath), $image);
        $data['image'] = $image;

        $create = Brand::create($data);
        if($create){
            return back()->with('success', 'Brand added');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }


    public function update($id){
        $data = request()->validate([
           'name' => 'required|string'
        ]);

        $file = request()->image;
        if ($file){
            request()->validate([
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);
            $oldImage = Brand::find($id)->image;
            if ($oldImage != ''){
                @unlink(public_path().'/'.$oldImage);
            }

            $image = $this->postImgPath.uniqid().time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.($this->postImgPath), $image);
            $data['image'] = $image;
        }

        $update = Brand::findOrFail($id)->update($data);
        if($update){
            return back()->with('success', 'Brand updated');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }

    public function destroy($id){
        $imgpath = Brand::findOrFail($id)->image;
        $delete = Brand::where('id',$id)->delete();
        if($delete){
            @unlink(public_path().'/'.$imgpath);
            return back()->with('success', 'Brand deleted');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }

    }
}
