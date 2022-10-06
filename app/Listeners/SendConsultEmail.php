<?php

namespace App\Listeners;

use App\Event\ConsultCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewConsultMail;

class SendConsultEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\ConsultCreated  $event
     * @return void
     */
    public function handle(ConsultCreated $event)
    {
        $details = [
            'comment' => $event->comment,
            'illness' => $event->illness,
            'fee' => $event->fee
        ];
        Mail::to($event->email)->send(new NewConsultMail($details));
    }
}
