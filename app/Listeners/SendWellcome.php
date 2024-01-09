<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WellcomeEmail;

class SendWellcome
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
    public function handle(CreateUser $event): void
    {
        Mail::to($event->user->email)->send(new WellcomeEmail($event->user));
    }
}
