
<p>

</p>

<h3>
    @if($post->trashed())
<del>
    @endif
    <a class="{{$post->trashed() ? 'text-muted' : ""}}" href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></h3>
@if($post->trashed())
    </del>
        @endif
<p>
    By: {{$post->user->name}}
    <br>
    Added {{ $post->created_at->diffForHumans() }}
</p>

@if($post->comments_count)
    <p>{{$post->comments_count}} Comments</p>
@else
    <p>No Comments!</p>
@endif

<div class="mb-3">
    @can('update', $post)
    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
    @endcan
{{--        @cannot('delete', $post)--}}
{{--            <p>BU POSTU SİLEMEZSİN</p>--}}
{{--        @endcannot--}}
        @if(!$post->trashed())
    @can('delete', $post)
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete!" class="btn btn-danger">
    </form>
    @endcan
    @endif
</div>
