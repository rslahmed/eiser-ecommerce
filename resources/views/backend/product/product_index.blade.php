@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">All Products</h4>
                        <a href="{{route('admin.product.add')}}" class="btn btn-sm btn-primary add_btn ml-auto">Add Product+</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover mb-3" id="sortableTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col" class="text-right no-sorting">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products->count() > 0)
                                @foreach($products as $row)
                                    <tr>
                                        <th scope="row">{{$row->id}}</th>
                                        <td>{{$row->product_name}}</td>
                                        <td>
                                            <img src="{{asset($row->image_one)}}" style="height: 30px">
                                        </td>
                                        <td>{{$row->category->name ?? 'N/A'}}</td>
                                        <td>{{$row->brand->name ?? 'N/A'}}</td>
                                        <td class="text-right">
                                            <a href="{{route('admin.product.show', $row->id)}}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{route('admin.product.edit', $row->id)}}" class="btn btn-secondary btn-sm edit_btn">Edit</a>
                                            <a href="{{route('admin.product.destroy', $row->id)}}" class="btn btn-danger btn-sm delete_btn">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">no data avilable</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $products->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection

