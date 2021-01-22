<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPostedMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

  /**
   * Create a new message instance.
   *
   * @param Comment $comment
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
          ->subject($subject)
          ->from('admin@laravel.test' , 'Admin')
          ->markdown('emails.posts.commented-markdown');
    }
}
