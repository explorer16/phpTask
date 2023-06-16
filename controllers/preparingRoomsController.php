<?php

//Подготовим комнаты для зашедшего пользователя. Очищяем брони с комнат, чьё время бронирования истекло.

$rooms = new \Models\Reservation();

$rooms->vacating();

require_once 'views/roomsView.html';
