@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>
        {{ $post->title }}
        <x-badge :show="now()->diffInMinutes($post->created_at) < 100">
        New Post!
        </x-badge>
    </h1>
    <p>{{ $post->content }}</p>

    <x-updated :date="$post->created_at" :name="$post->user->name" >
    </x-updated>
    <x-updated :date="$post->updated_at">
        Updated
    </x-updated>

    <p> Currently Read By {{$counter}}</p>


<h4>Comments:</h4>

    @forelse($post->comments as $comment)
              <p>{{$comment->content}}</p>

              <x-updated :date="$comment->created_at" >
              </x-updated>

    @empty
        <p>No Comments!</p>
    @endforelse
@endsection
