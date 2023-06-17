<?php

namespace Models;

use Interfaces\Mailer;
use Instasent\SmsClient as InstasentClient;

class SendSMS extends Mailer
{
    public static function send($name, $to, $room, $time, $mode): void
    {
        //Not finished
    }
}