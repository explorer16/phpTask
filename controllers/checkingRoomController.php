<?php

$room = new \Models\Reservation();

$room_info = $room->checking($_GET['id_room'], $_GET['id_floor']);

if($room_info['is_reserved']==0){
    setcookie('room', $room_info['id_room']);
    setcookie('floor', $room_info['id_floor']);

    require_once 'views/reservForm.html';

} else {
    \Models\Sendmail::send(
        $room_info['username'],
        $_COOKIE['email'],
        $_GET['id_floor'].'.'.$_GET['id_room'],
        $room_info['reserved_for'],
        'reject'
    );
    require_once 'views/reservRejectView.html';
}
