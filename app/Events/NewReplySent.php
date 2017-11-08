<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * @property User user
 */
class NewReplySent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $url;

    /**
     * Create a new event instance.
     * @param User $user
     * @internal param Content $content
     */
    public function __construct(User $user, $url)
    {
        $this->user = $user;

        $this->url = $url;
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
