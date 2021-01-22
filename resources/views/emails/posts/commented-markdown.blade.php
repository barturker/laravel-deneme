@component('mail::message')
# Comment Was Posted On Your Blog Post!

Hi {{$comment->commentable->user->name}}

Someone Has Commented On Your Blog Post:

@component('mail::button', ['url' => route('posts.show', ['post'=>$comment->commentable->id]) ])
View The Blog Post
@endcomponent

@component('mail::button', ['url' => route('users.show' , ['user'=>$comment->user->id]) ])
 Visit {{$comment->user->name}} Profile
@endcomponent

@component('mail::panel')
  {{$comment->content}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
