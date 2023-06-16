<?php

namespace Interfaces;

interface ReservationInterface
{
    public function checking($id_room, $id_floor):array;
    public function reserving($id_room, $id_floor, $name, $email):void;
    public function vacating():void;
}