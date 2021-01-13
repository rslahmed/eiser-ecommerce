<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="product_top_bar">
                    <div class="left_dorp">
                        <select class="sorting">
                            <option value="default">Default sorting</option>
                            <option value="name-asc">Name A-Z</option>
                            <option value="name-des">Name Z-A</option>
                            <option value="latest">Latest</option>
                            <option value="latest">Price low-high</option>
                            <option value="latest">Price high-low</option>
                        </select>
                        <select class="show">
                            <option value="1">Show 9</option>
                            <option value="2">Show 12</option>
                            <option value="4">Show 15</option>
                        </select>
                    </div>
                </div>

                <div class="latest_product_inner">
                    <div class="row">
                        {{-- product --}}
                        @foreach($products as $row)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.view', $row->slug)}}">
                                            <img class="card-img" src="{{$row->image_one}}" alt="{{$row->product_name}}" />
                                        </a>
                                        <div class="p_icon">
                                            <a href="{{route('product.view', $row->slug)}}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="add_to_cart" data-id="{{$row->id}}">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>{{$row->product_name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">${{$row->selling_price}}</span>
                                            @if(!empty($row->before_price))
                                                <del>${{$row->before_price}}</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($categories as $row)
                                    <li>
                                        <a href="#">{{$row->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Product Brand</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($brands as $row)
                                    <li>
                                        <a href="#">{{$row->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Price Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <div class="">
                                    <label for="amount">Price : </label>
                                    <input type="text" id="amount" readonly />
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
