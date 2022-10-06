<?php

namespace App\Listeners;

use App\Event\CustomerCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCustomerMail;

class SendEmail
{

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\CustomerCreated  $event
     * @return void
     */
    public function handle(CustomerCreated $event)
    {
        Mail::to($event->email)->send(new NewCustomerMail());
    }
}
