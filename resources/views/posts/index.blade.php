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
            <x-card >
                @slot('title')
                        Most Popular Posts
                @endslot
                 @slot('subtitle')
                   What People Currently Talking About
                @endslot
                @slot('items')
                    @foreach($mostCommented as $post)
                        <li class="list-group-item">
                            <a href="{{route('posts.show', ['post'=> $post->id]) }}">
                                {{$post->title}}
                            </a>
                        </li>

                        @endforeach
                    @endslot

            </x-card>
                </div>

                <div class="row mt-4">
                <x-card title="Most Active" subtitle="Users With Most Posts Written">
                    @slot('items', collect($mostActive)->pluck('name'))
                </x-card>
                </div>


                <div class="row mt-4">
                    <x-card title="Most Active User Last Month" subtitle="Most Active User Last Month">
                        @slot('items', collect($mostActiveLastMonth)->pluck('name'))
                    </x-card>
                </div>

            </div>
        </div>
    </div>
@endsection
