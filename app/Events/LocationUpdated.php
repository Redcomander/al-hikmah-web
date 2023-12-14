<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LocationUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $userId;
    public $location;
    public $liveStatus;
    public $userLocation;

    public function __construct($userId, $location, $liveStatus, $userLocation)
    {
        $this->userId = $userId;
        $this->location = $location;
        $this->liveStatus = $liveStatus;
        $this->userLocation = $userLocation;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('location.' . $this->userId);
    }
}
