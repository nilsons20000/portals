<?php
namespace App\Events;
use App\Article;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;




class PostHasViewed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $post;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $post)
    {
          $this->post = $post;
          

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
