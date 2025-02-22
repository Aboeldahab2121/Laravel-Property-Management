<?php

namespace App\Observers;

use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PropertyObserver
{

    public function created(Property $property): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$property->title} of ID: {$property->id} was CREATED on {$Datetime}";
        Log::info($logMessage);
    }

    public function updated(Property $property): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$property->title} of ID: {$property->id} was Updated on {$Datetime}";
        Log::info($logMessage);
    }

    public function deleted(Property $property): void
    {
        $Datetime = Carbon::now()->toDateTimeString();
        $logMessage = "Property {$property->title} of ID: {$property->id} was DELETED on {$Datetime}";
        Log::info($logMessage);
    }
}
