<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPropertyCreatedEmail implements ShouldQueue
{
    use Queueable;

    protected Property $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function handle(): void
    {
        $message = "New Property Created with the name: {$this->property->title}";
        Mail::raw($message, function ($message) {
            $message->to('mostafaaboeldahab20@gmail.com')
                ->subject('Created Test Mail')
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
    }
}
