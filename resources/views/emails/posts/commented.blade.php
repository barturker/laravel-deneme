<style>
  body{
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<p>
Hi {{$comment->commentable->user->name}}
</p>

<p>Someone Has Commented On Your Blog Post:
<a href="{{route('posts.show', ['post'=>$comment->commentable->id]) }}">
  {{$comment->commentable->title}} </a>
</p>

<hr>


<p>
  <img src="{{ $comment->user->image->url()}}" alt="avatar">
{{--  <img src="{{ $message->embedData($comment->user->image->url(), 'example.jpeg') }}" alt="">--}}

  <a href="{{route('users.show' , ['user'=>$comment->user->id]) }}">{{$comment->user->name}}</a>  Said: </p>
<p>"{{$comment->content}} "</p>

