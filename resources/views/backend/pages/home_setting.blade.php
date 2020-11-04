@extends('backend.admin_layout')

@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header"><h4>Home Setting</h4></div>
                    <div class="card-body">
                        @foreach($tags as $tag)
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="w-25">{{$tag->tag_name}}</h5>
                            <div class="tag_inp">
                                <label class="switch">
                                    <input type="checkbox" class="tag_input" @if($tag->status) checked @endif data-id="{{$tag->id}}">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script !src="">
        $('.tag_input').on('change', function(){
            let that = $(this)
            let id = $(this).attr('data-id')
            let status = 0
            if($(this).is(':checked')){
                status = 1
            }

            $.get( "{{url('admin/change_tag_status')}}", {id: id, status: status}, function( data ) {
                console.log(data)
            });
        })
    </script>
@endsection
