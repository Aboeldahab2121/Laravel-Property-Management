<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPropertyUpdatedEmail implements ShouldQueue
{
    use Queueable;

    protected Property $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function handle(): void
    {
        $message = "Property Updated Successfully to {$this->property}";
        Mail::raw($message, function ($message) {
            $message->to('mostafaaboeldahab20@gmail.com')
                ->subject('Mailgun Test');
        });
    }
}
