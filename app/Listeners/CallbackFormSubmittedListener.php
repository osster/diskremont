<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CallbackFormSubmittedListener
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $msg = $event->message;

//        $log = [
//            "date" => date('Y-m-d H:i:s'),
//            "from" => $msg->getHeaders()->get('From')->getFieldBody(),
//            "to" => $msg->getHeaders()->get('To')->getFieldBody(),
//            "subject" => $msg->getHeaders()->get('Subject')->getFieldBody()
//        ];

        //Log::debug('MessageSent', $log);
    }
}
