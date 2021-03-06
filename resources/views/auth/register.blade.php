@extends('layouts.app')


@section('content')


    <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control{{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" required aria-describedby="" placeholder="Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>

            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{old('email')}}" required class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="" placeholder="Email Address">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('email')}}</strong>
                </span>

            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" aria-describedby="" placeholder="Password">
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                </span>

            @endif
        </div>
        <div class="form-group">
            <label for="retyped_password">Retyped Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="retyped_password" placeholder="Re-type Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>



@endsection
