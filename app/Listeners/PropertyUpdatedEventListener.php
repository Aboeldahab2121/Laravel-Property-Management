<?php

namespace App\Listeners;

use App\Events\PropertyUpdatedEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PropertyUpdatedEventListener
{
    public function handle(PropertyUpdatedEvent $event): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$event->property->title} of ID: {$event->property->id} was Updated on {$Datetime}";
        Log::info($logMessage);
    }
}
