@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">All Offer Tags</h4>
                        <button class="btn btn-sm btn-primary add_btn ml-auto">Add Tag+</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover mb-3" id="sortableTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tag name</th>
                                <th scope="col" class="text-right no-sorting">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($tags->count() > 0)
                                @foreach($tags as $row)
                                    <tr>
                                        <th scope="row">{{$row->id}}</th>
                                        <td>{{$row->tag_name}}</td>
                                        <td class="text-right">
                                            <button class="btn btn-secondary btn-sm edit_btn" data-tags="{{$row->tag_name}}" data-id="{{$row->id}}">Edit</button>
                                            <a href="{{route('admin.coupon.destroy', $row->id)}}" class="btn btn-danger btn-sm delete_btn">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">no data available</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $tags->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="modalForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Coupon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="tag_name" id="tagName" type="text" class="form-control" placeholder="Tag name">
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
            let tags = $(this).attr('data-tags');
            let id = $(this).attr('data-id');
            $('#createCat').modal('show');
            $('#tagName').val(tags);
            $('#modalForm').attr('action', '{{url('admin/tags/update')}}'+'/'+id);
            $('#modalTitle').text('Edit Tags');
        })

        $('.add_btn').click(function(){
            $('#createCat').modal('show');
            $('#catName').val('');
            $('#modalForm').attr('action', '{{route('admin.tags.store')}}');
            $('#modalTitle').text('Add Tags');
        })
    </script>
@endsection

