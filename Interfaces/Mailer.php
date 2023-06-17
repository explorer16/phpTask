<?php

namespace Interfaces;

abstract class Mailer
{
    protected static $message = [
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

    abstract static function send($name, $to, $room, $time, $mode):void;
}