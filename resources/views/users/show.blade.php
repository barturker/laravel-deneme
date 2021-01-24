@extends('layouts.app')

@section('content')

    <div class="row mt-4">
      <div class="col-4">
        <img src="{{$user->image ? $user->image->url() : ''}}" class="img-thumbnail avatar" alt="">
          </div>
      <div class="col-8">
        <h3>{{$user->name}}</h3>

        <p>Currently viewed by {{$counter}} users</p>
        <x-commentForm :route="route('users.comments.store', ['user' =>$user->id])">
        </x-commentForm>

        <x-commentList :comments="$user->commentsOn">
        </x-commentList>
      </div>

        </div>

@endsection
