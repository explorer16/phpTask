<?php

namespace Models;

class Sendmail
{
    private static $message = [
        'accept' => [
            1 => 'Здравствуйте,',
            2 => ' просим вас не забывать, что ваша бронь на кабинет № ',
            3 => ' действует до ',
            4 => "\nПриятного дня."
        ],
        'reject' => [
            1 => 'Здравствуйте,',
            2 => '. К несчастью, кабинет №',
            3 => ' уже занят до ',
            4 => ', поэтому просим вас занять другой кабинет.'
        ]
    ];

    public static function sendMail($name, $email, $room, $time, $mode)
    {
        $msg = self::$message[$mode][1].$name.self::$message[$mode][2].$room.self::$message[$mode][3].$time.self::$message[$mode][4];

        mail($email, "Предупреждение", $msg);
    }

}
