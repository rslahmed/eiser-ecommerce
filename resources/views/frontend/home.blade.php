@extends('frontend.layout')
@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">User Home page</div>
            <div class="card-body">
                <h2>Welcome {{$username}}</h2>
            </div>
        </div>
    </div>

@endsection
