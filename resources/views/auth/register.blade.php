@extends('layouts.app')


@section('content')


    <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" required aria-describedby="" placeholder="">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{old('email')}}" required class="form-control" id="email" aria-describedby="" placeholder="">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" id="password" aria-describedby="" placeholder="">
        </div>
        <div class="form-group">
            <label for="retyped_password">Retyped Password</label>
            <input type="text" name="retyped_password" class="form-control" id="retyped_password" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>



@endsection
