<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CommentPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
      $this->comment = $comment;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $subject = "Commented on your {$this->comment->commentable->title}";
        return $this
          //attach ile dosya gönderme
//          ->attach(
//            storage_path('app/public') . '/' . $this->comment->user->image->path,
//            [
//              'as' => 'profile_picture.jpeg',
//              'mime' => 'image/jpeg'
//            ]
//          )
//            2. file gönderme yöntemi
//          ->attachFromStorage($this->comment->user->image->path, 'profile_picture.jpeg')
//            3.yöntem
//          ->attachData(Storage::get($this->comment->user->image->path), 'profile_picture_from_Data.jpeg', [
//            'mime'=> 'image/jpeg'
//          ])
          ->subject($subject)
          ->from('admin@laravel.test' , 'Admin')
          ->view('emails.posts.commented');
    }
}
