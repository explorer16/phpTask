<?php

$room = new \Models\Reservation();

$room_info = $room->checking($_GET['id_room'], $_GET['id_floor']);

if($room_info['is_reserved']==0){
    $room->reserving(
        $_GET['id_room'],
        $_GET['id_floor'],
        $_COOKIE['name'],
        $_COOKIE['email']
    );
    require_once 'views/reservAcceptView.html';
} else {
    require_once 'views/reservRejectView.html';
}
