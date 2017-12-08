<?php

namespace App\Channels;

use App\Classes\SmsClass;
use Illuminate\Notifications\Notification;

/**
 * Class SmsChannel
 *
 * @property SmsClass SmsClass
 * @package \App\Channels
 */
class SmsChannel
{
    public function __construct(SmsClass $smsClass)
    {
        $this->SmsClass = $smsClass;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

        $this->SmsClass->sendSms($message['to'], $message['text']);
    }
}