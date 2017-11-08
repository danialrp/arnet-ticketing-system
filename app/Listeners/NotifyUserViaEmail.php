<?php

namespace App\Listeners;

use App\Events\NewReplySent;
use App\Mail\NewReply;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUserViaEmail
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewReplySent  $event
     * @return void
     */

    // NewReplySent --> Event
    // NotifyUserViaEmail --> Listener
    // NewReply --> Mailable class

    public function handle(NewReplySent $event)
    {
        Mail::to($event->user)->queue(new NewReply($event->user, $event->url));
    }
}
