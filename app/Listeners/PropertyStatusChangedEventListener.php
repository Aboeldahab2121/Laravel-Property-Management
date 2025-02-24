<?php

namespace App\Listeners;

use App\Events\PropertyStatusChangedEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PropertyStatusChangedEventListener
{

    public function __construct()
    {
        //
    }


    public function handle(PropertyStatusChangedEvent $event): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$event->property->title} of ID: {$event->property->id} Status Updated from {$event->oldStatus} to {$event->newStatus} on {$Datetime}";
        Log::info($logMessage);
    }
}
