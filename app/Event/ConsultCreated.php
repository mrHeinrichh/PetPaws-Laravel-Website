<?php

namespace App\Event;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsultCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $email;
    public $comment;
    public $illness;
    public $fee;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $comment, $illness, $fee)
    {
        $this->email = $email;
        $this->comment = $comment;
        $this->illness = $illness;
        $this->fee = $fee;
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
