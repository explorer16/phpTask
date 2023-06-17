<?php

$reserved_for = implode('', [$_POST['reserved_date_for'], ' ', $_POST['reserved_time_for']]);

$room = new \Models\Reservation();

$room->reserving(
    $_COOKIE['room'],
    $_COOKIE['floor'],
    $_COOKIE['name'],
    $_COOKIE['email'],
    $reserved_for
);

\Models\Sendmail::send(
    $_COOKIE['name'],
    $_COOKIE['email'],
    $_COOKIE['floor'].'.'.$_COOKIE['room'],
    $reserved_for,
    'accept'
);

header('Location: /main');
