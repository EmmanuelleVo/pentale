<?php

namespace App\Listeners;

use App\Mail\SendMessageWithContactForm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMessageWithContactForm $event): void
    {
        //
    }
}
