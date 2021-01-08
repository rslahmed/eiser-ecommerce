@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">View Product</h4>
                        <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-sm btn-primary add_btn ml-auto">Edit Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mb-3" id="sortableTable">
                            <tr>
                                <th class="w-25">Images:</th>
                                <td>
                                    <div class="d-flex">
                                        @if($product->image_one)
                                            <img class="prod_view_img" src="{{asset($product->image_one)}}" alt="">
                                        @endif
                                        @if($product->image_two)
                                            <img class="prod_view_img" src="{{asset($product->image_two)}}" alt="">
                                        @endif
                                        @if($product->image_three)
                                            <img class="prod_view_img" src="{{asset($product->image_three)}}" alt="">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Product Name:</th>
                                <td>{{$product->product_name}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Product Code:</th>
                                <td>{{$product->product_code ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Quantity:</th>
                                <td>{{$product->product_quantity}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Category:</th>
                                <td>{{$product->category->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Brand:</th>
                                <td>{{$product->brand->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Sizes:</th>
                                <td>{{$product->product_size ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Colors:</th>
                                <td>{{$product->product_color ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Before price:</th>
                                <td>{{$product->before_price ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Selling price:</th>
                                <td>{{$product->selling_price ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Product details:</th>
                                <td>{!! $product->product_details ?? 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Video link:</th>
                                <td>{{$product->video_link ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Offer Tags:</th>
                                <td>
                                    @if(!empty($tags) && $tags != null)
                                        @foreach($tags as $tag)
                                            {{$tag->tag_name}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

