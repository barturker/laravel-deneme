@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
    <h1>Contact page</h1>

    @can('home.secret')
        <a href="{{route('secret')}}"> <p>go special link</p></a>

    @endcan

@endsection
