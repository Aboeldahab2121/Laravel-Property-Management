<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPropertyStatusUpdatedEmail implements ShouldQueue
{
    use Queueable;

    protected Property $property;

    protected string $oldStatus;

    protected string $newStatus;

    /**
     * Create a new job instance.
     */
    public function __construct(Property $property, $oldStatus, $newStatus)
    {
        $this->property = $property;
        $this->newStatus = $newStatus;
        $this->oldStatus = $oldStatus;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $message = "Property {$this->property->title} status Updated from {$this->oldStatus} to {$this->newStatus}";
        Mail::raw($message, function ($message) {
            $message->to('mostafaaboeldahab20@gmail.com')
                ->subject('Mailgun Test');
        });
    }
}
