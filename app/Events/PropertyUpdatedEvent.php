<?php

namespace App\Events;

use App\Models\Property;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
