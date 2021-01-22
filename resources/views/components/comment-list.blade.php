@forelse($comments as $comment)
  <p>{{$comment->content}}</p>

  <x-updated :date="$comment->created_at" :name="$comment->user->name"  :userId="$comment->user">
  </x-updated>



@empty
  <p>No Comments!</p>

@endforelse
