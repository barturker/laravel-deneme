<div class="mb-2 mt-2">
    @auth
        <form action="{{route('posts.comments.store', ['post'=>$post->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" id="content" class="form-control" type="text" ></textarea>
            </div>

            <button type="submit" value="Add Comment" class="btn btn-primary btn-block">Add Comment!</button>
        </form>
<x-errors></x-errors>
    @else
        <a href="{{route('login')}}">Sign-In</a> To Post Comment!
    @endauth
       </div>
<hr/>
