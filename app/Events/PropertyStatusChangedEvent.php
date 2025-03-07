<?php

namespace App\Events;

use App\Models\Property;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyStatusChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $property;

    public $oldStatus;

    public $newStatus;

    public function __construct(Property $property, $oldStatus)
    {
        $this->property = $property;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $property->status;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
