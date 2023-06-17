<?php

namespace Models;

use Interfaces\Mailer;

class Sendmail extends Mailer
{
    public static function send($name, $to, $room, $time, $mode):void
    {
        $msg = self::$message[$mode][1].$name.self::$message[$mode][2].$room.self::$message[$mode][3].$time.self::$message[$mode][4];

        mail($to, "Предупреждение", $msg);
    }

}
