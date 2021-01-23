<?php

namespace App\Events;

use App\Models\BlogPost;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlogPostPosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blogPost;
  /**
   * Create a new event instance.
   *
   * @param BlogPost $blogPost
   */
    public function __construct(BlogPost $blogPost)
    {
      $this->blogPost = $blogPost;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
