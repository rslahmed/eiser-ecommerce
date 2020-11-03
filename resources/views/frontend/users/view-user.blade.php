@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        <p>Name: {{$user->name ?? ''}}</p>
                        <p>Email: {{$user->email ?? ''}}</p>
                        <a href="#">Change password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
