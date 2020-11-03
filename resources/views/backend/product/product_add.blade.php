@extends('backend.admin_layout')

@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">@if(!empty($editProduct)) Edit @else Add @endif Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="@if(!empty($editProduct))  {{route('admin.product.update', $editProduct->id)}} @else  {{route('admin.product.store')}} @endif" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_name">Product name: <span class="text-danger">*</span></label>
                                        <input name="product_name" type="text" class="form-control" id="product_name" value="{{ old('product_name') ?? $editProduct->product_name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_quantity">Quantity: <span class="text-danger">*</span></label>
                                        <input name="product_quantity" type="number" class="form-control" id="product_quantity" value="{{ old('product_quantity') ?? $editProduct->product_quantity ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selling_price">Selling price: <span class="text-danger">*</span></label>
                                        <input name="selling_price" type="number" class="form-control" id="selling_price" placeholder="$" value="{{ old('selling_price') ?? $editProduct->selling_price ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="discount_price">Discount price: </label>
                                        <input name="discount_price" type="number" class="form-control" id="discount_price" placeholder="$" value="{{ old('discount_price') ?? $editProduct->discount_price ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Category: <span class="text-danger">*</span></label>
                                        <select class="form-control select2" name="category_id" id="category_id" style="width: 100%;">
                                            <option value="" selected="selected">Select category</option>
                                            @foreach($categories as $row)
                                                <option value="{{$row->id}}" @if(old('category_id') == $row->id || ((!empty($editProduct)) && $editProduct->category_id == $row->id )) selected @endif >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brand_id">Brand: </label>
                                        <select class="form-control select2" name="brand_id" id="brand_id" style="width: 100%;">
                                            <option value="" selected="selected">Select brand</option>
                                            @foreach($brands as $row)
                                                <option value="{{$row->id}}" @if(old('brand_id') == $row->id || ((!empty($editProduct)) && $editProduct->brand_id == $row->id )) selected @endif>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 multiselect">
                                    <label for="tag">Select Tags:</label>
                                    <select class="form-control" id="tag" name="tag_id[]" multiple>
                                        @foreach($tags as $row)
                                            @php
                                                if(!empty($editProduct) && json_decode($editProduct->tag_id) != null){
                                                    $prevTag = json_decode($editProduct->tag_id) ;
                                                }
                                            @endphp
                                            <option value="{{$row->id}}" @if(in_array($row->id, (old('tag_id') ?? $prevTag ?? []) ))) selected @endif>{{$row->tag_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_size">Product sizes: </label>
                                        <input name="product_size" type="text" class="form-control tags_input d-none" data-role="tagsinput" id="product_size" value="{{old('product_size') ?? $editProduct->product_size ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Product colors: </label>
                                        <input name="product_color" type="text" class="form-control tags_input" data-role="tagsinput" id="product_color" value="{{old('product_color') ?? $editProduct->product_color ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="video_link">Video link: </label>
                                        <input name="video_link" type="text" class="form-control" id="video_link" placeholder="https://youtube.com" value="{{ old('video_link') ?? $editProduct->video_link ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_details">Product details: <span class="text-danger">*</span></label>
                                <textarea class="summernote" name="product_details" id="product_details" placeholder="Place some text here"></textarea>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image_one">Image one (Main Thumbnail) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image_one" type="file" class="custom-file-input" accept="image/*" id="image_one" onchange="document.getElementById('prev_image_one').src = window.URL.createObjectURL(this.files[0]); showPrevImg('image_one')">
                                                <label class="custom-file-label" for="image_one">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image_two">Image two:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image_two" type="file" class="custom-file-input" accept="image/*" id="image_two" onchange="document.getElementById('prev_image_two').src = window.URL.createObjectURL(this.files[0]); showPrevImg('image_two')">
                                                <label class="custom-file-label" for="image_two">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image_three">Image three:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image_three" type="file" class="custom-file-input" accept="image/*" id="image_three" onchange="document.getElementById('prev_image_three').src = window.URL.createObjectURL(this.files[0]); showPrevImg('image_three')">
                                                <label class="custom-file-label" for="image_one">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 position-relative">
                                    <span class="remove_img cancel_img" id="cncl_image_one"  onclick="cancelImage('image_one')"><i class="fas fa-times"></i></span>
                                    <img src="@if(!empty($editProduct)){{asset($editProduct->image_one)}}@endif" alt="" class="prev_img @if(!empty($editProduct->image_one)) d-block @endif" id="prev_image_one">
                                </div>
                                <div class="col-4 position-relative">
                                    @if(!empty($editProduct->image_two))
                                    <span class="remove_img" id="rmv_image_two" onclick="removeImage('{{$editProduct->id}}', 'image_two');"><i class="far fa-trash-alt"></i></span>
                                    @endif
                                    <span class="remove_img cancel_img" id="cncl_image_two" onclick="cancelImage('image_two')"><i class="fas fa-times"></i></span>
                                    <img src="@if(!empty($editProduct)){{asset($editProduct->image_two ?? '')}}@endif" alt="" class="prev_img @if(!empty($editProduct->image_two)) d-block @endif" id="prev_image_two">
                                </div>
                                <div class="col-4 position-relative">
                                    @if(!empty($editProduct->image_three))
                                    <span class="remove_img" id="rmv_image_three" onclick="removeImage('{{$editProduct->id}}', 'image_three');"><i class="far fa-trash-alt"></i></span>
                                    @endif
                                    <span class="remove_img cancel_img" id="cncl_image_three" onclick="cancelImage('image_three')"><i class="fas fa-times"></i></span>
                                    <img src="@if(!empty($editProduct)){{asset($editProduct->image_three ?? '')}}@endif" alt="" class="prev_img @if(!empty($editProduct->image_three)) d-block @endif" id="prev_image_three">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">@if(!empty($editProduct)) Update @else Add @endif Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // summernote
            $('.summernote').summernote('code', '{!! old('product_details') ?? $editProduct->product_details ?? '' !!} ');
        });

        // bootstrap tag input
        $(document).on('keypress', '.bootstrap-tagsinput input', function(e){
            if (e.keyCode == 13){
                e.keyCode = 188;
                e.preventDefault();
            };
        });

        // get subcategory
        $('#category_id').on('change', function(){
            let id = $(this).val();


            $.get( "{{url('admin/get_subcategory_bycategory')}}",{id: id}, function( data ) {
                $('#subcategory_id option:not(".default")').remove();
                $.each(JSON.parse(data), function(key, value){
                    let html = `<option value="${value.id}">${value.name}</option>`;
                    $('#subcategory_id').append(html);
                })
            });
        })

        @if(old('category_id'))
            $('#category_id').trigger('change');
        @endif

        function showPrevImg(img){
            $('#rmv_'+img).remove();
            $('#prev_'+img).removeClass('d-block');

            $('#prev_'+img).show();
            $('#cncl_'+img).css('display', 'flex');

        }


        //remove image
        function removeImage(id,img){
            $.get( "{{url('admin/product/remove_product_image')}}",{id: id, img: img}, function( data ) {
                if(data === 'success'){
                    $('#rmv_'+img).remove();
                    $('#prev_'+img).attr('src','');
                    $('#prev_'+img).removeClass('d-block');
                    toastr.success('Image has removed');
                }else{
                    toastr.error('Something went wrong, please try again');
                }
            });
        }

        //cancel image
        function cancelImage(img){
            $('#cncl_'+img).hide();
            $('#prev_'+img).attr('src','');
            $('#prev_'+img).hide();
            $('#'+img).val('');
        }

        // tag
        $('#tag').selectpicker();
    </script>
@endsection
