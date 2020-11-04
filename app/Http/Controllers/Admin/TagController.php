<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index(){
        return view('backend.pages.tags',[
            'tags' => Tags::paginate(10)
        ]);
    }

    function store(Request $request){
        $request->validate([
            'tag_name' => 'required|string',
        ]);

        $create = Tags::create([
            'tag_name' => $request->tag_name,
            'status' => 1
        ]);

        if($create){
            return back()->with('success', 'Tag added');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }

    function update(Request $request, $id){
        request()->validate([
            'tag_name' => 'required|string'
        ]);

        $create = Tags::findOrFail($id)->update([
            'tag_name' => $request->tag_name,
        ]);
        if($create){
            return back()->with('success', 'Tag updated');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }

    function destroy($id){

        $delete = Tags::findOrFail($id)->delete();
        if($delete){
            return back()->with('success', 'Tag deleted');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }
    }

    function changeStatus(Request $request){
        $update = Tags::findOrFail($request->id)->update([
            'status' => $request->status
        ]);
        if($update){
            return response('ok');
        }
    }
}
