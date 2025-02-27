<?php

namespace App\Listeners;

use App\Events\PropertyCreatedEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PropertyCreatedEventListener
{
    public function handle(PropertyCreatedEvent $event): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$event->property->title} of ID: {$event->property->id} was CREATED on {$Datetime}";
        Log::info($logMessage);
    }
}
