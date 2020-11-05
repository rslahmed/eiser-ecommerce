@extends('frontend.layout')

@section('content')
    <div class="container my-5 py-5 text-center">
        <h1 class="mb-2">{{$error ?? 'Page not found'}}</h1>
        <a href="{{route('home')}}">Back to home</a>
    </div>
@endsection
