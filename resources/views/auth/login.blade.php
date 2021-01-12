@extends('layouts.app')


@section('content')


    <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
        @csrf
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
            <div class="form-check">
                <input type="checkbox" id="remember" value="{{old('remember') ? 'checked' : ''}}" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>



@endsection
