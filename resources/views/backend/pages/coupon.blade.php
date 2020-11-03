@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="m-0">All coupons</h4>
                        <button class="btn btn-sm btn-primary add_btn ml-auto">Create coupon+</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover mb-3" id="sortableTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Coupon Name</th>
                                <th scope="col">Discount</th>
                                <th scope="col" class="text-right no-sorting">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($coupons->count() > 0)
                                @foreach($coupons as $row)
                                    <tr>
                                        <th scope="row">{{$row->id}}</th>
                                        <td>{{$row->coupon}}</td>
                                        <td>{{$row->discount}}%</td>
                                        <td class="text-right">
                                            <button class="btn btn-primary btn-sm edit_btn" data-coupon="{{$row->coupon}}" data-discount="{{$row->discount}}" data-id="{{$row->id}}">Edit</button>
                                            <a href="{{route('admin.coupon.destroy', $row->id)}}" class="btn btn-primary btn-sm delete_btn">Delete</a>
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
                        {{ $coupons->links() }}

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
                            <input name="coupon" id="copName" type="text" class="form-control" placeholder="coupon">
                        </div>
                        <div class="form-group">
                            <input name="discount" id="copDisc" type="text" class="form-control" placeholder="discount(%)">
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
            let coupon = $(this).attr('data-coupon');
            let discount = $(this).attr('data-discount');
            let id = $(this).attr('data-id');
            $('#createCat').modal('show');
            $('#copName').val(coupon);
            $('#copDisc').val(discount);
            $('#modalForm').attr('action', '{{url('admin/coupon/update')}}'+'/'+id);
            $('#modalTitle').text('Edit coupon');
        })

        $('.add_btn').click(function(){
            $('#createCat').modal('show');
            $('#catName').val('');
            $('#modalForm').attr('action', '{{route('admin.coupon.store')}}');
            $('#modalTitle').text('Add coupon');
        })
    </script>
@endsection

