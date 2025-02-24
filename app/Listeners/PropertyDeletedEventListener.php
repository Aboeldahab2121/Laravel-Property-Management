<?php

namespace App\Listeners;

use App\Events\PropertyDeletedEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PropertyDeletedEventListener
{
    public function handle(PropertyDeletedEvent $event): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$event->property->title} of ID: {$event->property->id} was DELETED on {$Datetime}";
        Log::info($logMessage);
    }
}
