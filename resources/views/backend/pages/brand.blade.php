@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">All Brands</h4>
                        <button class="btn btn-sm btn-primary add_btn ml-auto">Create Brand+</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover mb-3" id="sortableTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Logo</th>
                                <th scope="col" class="text-right no-sorting">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($brands->count() > 0)
                                @foreach($brands as $row)
                                    <tr>
                                        <th scope="row">{{$row->id}}</th>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            <img src="{{asset($row->image)}}" style="height: 30px">
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-primary btn-sm edit_btn" data-name="{{$row->name}}" data-id="{{$row->id}}">Edit</button>
                                            <a href="{{route('admin.brand.destroy', $row->id)}}" class="btn btn-primary btn-sm delete_btn">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">no data avilable</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $brands->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="modalForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="name" id="catName" type="text" class="form-control" placeholder="Brand Name">
                        </div>
                        <div class="form-group">
                            <input name="image" id="catBrand" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script !src="">
        $('.edit_btn').click(function(){
            let name = $(this).attr('data-name');
            let id = $(this).attr('data-id');
            $('#createCat').modal('show');
            $('#catName').val(name);
            $('#modalForm').attr('action', '{{url('admin/brand/update')}}'+'/'+id);
            $('#modalTitle').text('Edit Brand');
        })

        $('.add_btn').click(function(){
            $('#createCat').modal('show');
            $('#catName').val('');
            $('#modalForm').attr('action', '{{route('admin.brand.store')}}');
            $('#modalTitle').text('Add Brand');
        })
    </script>
@endsection

