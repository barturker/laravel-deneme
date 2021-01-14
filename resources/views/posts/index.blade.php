@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <div class="row">
        <div class="col-8">
    {{-- @each('posts.partials.post', $posts, 'post') --}}
    @forelse ($posts as $post)
        @include('posts.partials.post', [])
    @empty
        No posts found!
    @endforelse
        </div>
        <div class="col-4">
            <div class="container">
                <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Most Commented Posts:</h5>
                    <p class="card-text">What People Currently Talking About</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($mostCommented as $post)
                    <li class="list-group-item">
                        <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                    </li>
                    <li class="list-group-item">Total Comments: {{$post->comments_count}}</li>
                    <li class="list-group-item">Latest Comment: {{$post->comments->first()->created_at->diffForHumans()}}</li>
                    @endforeach
                </ul>
            </div>
                </div>
                <div class="row mt-4">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Most Active User</h5>
                            <p class="card-text">Users With Most Posts Written</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($mostActive as $user)
                                <li class="list-group-item">{{$user->name}}  / Total Posts: {{$user->blog_post_count}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Most Active User Last Month</h5>
                            <p class="card-text">Users With Most Posts Written</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($mostActiveLastMonth as $user)
                                <li class="list-group-item">{{$user->name}}
                                {{-- TODO::{{$user->blog_post_count}} --}}
                                </li>
                                {{--                    <li class="list-group-item">Latest Comment: {{$post->comments->first()->created_at->diffForHumans()}}</li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
