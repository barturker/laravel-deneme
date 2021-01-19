@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-8">
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

            <x-tags :tags="$post->tags"></x-tags>

            <p> Currently Read By {{$counter}}</p>


            <h4>Comments:</h4>

            @forelse($post->comments as $comment)
                      <p>{{$comment->content}}</p>

                      <x-updated :date="$comment->created_at" >
                      </x-updated>

            @empty
                <p>No Comments!</p>
            @endforelse
        </div>
        <div class="col-4">
            @include('posts.partials._activity')
        </div>
    </div>
@endsection
