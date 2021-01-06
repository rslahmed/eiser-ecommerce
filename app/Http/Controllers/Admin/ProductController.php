<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tags;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $path = '/upload/products/';
    function index(){
        return view('backend.product.product_index',[
            'products' => Product::paginate(10),

        ]);
    }

    function view($slug){
        $product = Product::where('slug', $slug)->first();
        if($product){
            return view('frontend.product.view_product', compact('product'));
        }else{
            $error = 'Product not found';
            return view('frontend.404', compact('error'));
        }
    }

    function add(){
        return view('backend.product.product_add',[
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'tags' => Tags::all()
        ]);
    }

    function show($id){
        $product = Product::findOrFail($id);
        $tags = null;
        if(!empty($product->tag_id)){
            $tags = Tags::whereIn('id', json_decode($product->tag_id))->get();
        }
        return view('backend.product.product_view', compact('product', 'tags'));
    }

    function store(){
        //validation
        $data = $this->productValidate();
        $data['tag_id'] = json_encode(request()->tag_id);

        //primary image
        $primaryImage = request()->image_one;
        if($primaryImage){

            $imageOne = $this->path.uniqid().time().'.'.$primaryImage->getClientOriginalExtension();
            $primaryImage->move(public_path().($this->path), $imageOne);
            $data['image_one'] = $imageOne;
        }

        //second image
        $secondImage = request()->image_two;
        if($secondImage){
            request()->validate([
                'image_two' => 'image',
            ]);
            $imageTwo = $this->path.uniqid().time().'.'.$secondImage->getClientOriginalExtension();
            $secondImage->move(public_path().($this->path), $imageTwo);
            $data['image_two'] = $imageTwo;
        }

        //third image
        $thirdImage = request()->image_three;
        if($thirdImage){
            request()->validate([
                'image_three' => 'image',
            ]);
            $imageThree = $this->path.uniqid().time().'.'.$thirdImage->getClientOriginalExtension();
            $thirdImage->move(public_path().($this->path), $imageThree);
            $data['image_three'] = $imageThree;
        }

        //slug creating
        $slug = implode('_',explode(' ',request()->product_name)).'_'.uniqid();
        $data['slug'] = $slug;

        //status on
        $data['status'] = 1;

        $create = Product::create($data);
        if($create){
            return redirect(route('admin.product.show', $create->id))->with('success', 'Product Added');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }

    }

    function edit($id){
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tags::all();
        $editProduct = Product::findOrFail($id);
//        return $editProduct;
        return view('backend.product.product_add',compact('categories','brands','editProduct', 'tags'));
    }

    function update($id){
        $data = $this->productValidate();

        //update primary image
        $image_one = request()->image_one;
        if ($image_one){
            request()->validate([
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);
            $oldImage = Product::find($id)->image_one;
            if ($oldImage){
                unlink(public_path().$oldImage);
            }
            $image = $this->path.uniqid().time().'.'.$image_one->getClientOriginalExtension();
            $image_one->move(public_path().($this->path), $image);
            $data['image_one'] = $image;
        }

        //update second image
        $image_two = request()->image_two;
        if ($image_two){
            request()->validate([
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);
            $oldImageTwo = Product::find($id)->image_two;
            if ($oldImageTwo){
                unlink(public_path().$oldImageTwo);
            }
            $imageTwo = $this->path.uniqid().time().'.'.$image_two->getClientOriginalExtension();
            $image_two->move(public_path().($this->path), $imageTwo);
            $data['image_two'] = $imageTwo;
        }

        //update third image
        $image_three = request()->image_three;
        if ($image_three){
            request()->validate([
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);
            $oldImageThree = Product::find($id)->image_three;
            if ($oldImageThree){
                unlink(public_path().$oldImageThree);
            }
            $imageThree = $this->path.uniqid().time().'.'.$image_three->getClientOriginalExtension();
            $image_three->move(public_path().($this->path), $imageThree);
            $data['image_three'] = $imageThree;
        }

        $create = Product::where('id', $id)->update($data);
        if($create){
            return redirect(route('admin.product.show', $id))->with('success', 'Product updated');
        }else{
            return back()->with('error', 'Ops, something went wrong');
        }

    }

    function destroy($id){
        $product = Product::findOrFail($id)->get();
        $image_one = Product::findOrFail($id)->image_one;
        $image_two = Product::findOrFail($id)->image_two;
        $image_three = Product::findOrFail($id)->image_three;
        if($image_one){
            unlink(public_path().$image_one);
        }
        if($image_two){
            unlink(public_path().$image_two);
        }
        if($image_three){
            unlink(public_path().$image_three);
        }

        $delete = Product::where('id', $id)->delete();
        if($delete){
            return back()->with('success', 'Product deleted');
        }else{
            return back()->with('error', 'Something went wrong, please try again');
        }

    }

    function removeImage(){
        $id = request()->id;
        $img = request()->img;
        $image = Product::find($id)->$img;
        unlink(public_path().$image);
        $update = Product::where('id', $id)->update([
            $img => ''
        ]);
        if($update){
            return 'success';
        }else{
            return 'failed';
        }
    }

    function productValidate(){
        return request()->validate([
           'product_name' => 'required|string',
           'product_code' => 'nullable|string',
           'product_quantity' => 'required|string',
           'category_id' => 'required|string',
           'brand_id' => 'nullable|string',
           'product_size' => 'nullable|string',
           'product_color' => 'nullable|string',
           'selling_price' => 'required|integer',
           'discount_price' => 'nullable|string',
           'product_details' => 'required|string',
           'tag_id' => 'nullable|array',
           'video_link' => 'nullable|string',
           'image_one' => 'image',
           'image_two' => 'nullable|image',
           'image_three' => 'nullable|image'
        ]);
    }
}
