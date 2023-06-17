<?php

namespace Models;

use Interfaces\ReservationInterface;

class Reservation implements ReservationInterface
{

    /**
     * @param $id_room
     * @param $id_floor
     * @return array
     */
    public function checking($id_room, $id_floor): array
    {
        $conn = new \PDO('mysql:dbname=phptask;host=127.0.0.1', 'root', '');

        $statement = $conn->prepare('SELECT * FROM rooms WHERE id_room= :room AND id_floor= :floor');

        $statement->bindParam(':room', $id_room, \PDO::PARAM_INT);
        $statement->bindParam(':floor', $id_floor, \PDO::PARAM_INT);

        $statement->execute();
        $room_info = $statement->fetch(\PDO::FETCH_ASSOC);
        return $room_info;
    }

    /**
     * @param $id_room
     * @param $id_floor
     * @param $name
     * @param $email
     * @return void
     */
    public function reserving($id_room, $id_floor, $name, $email, $reserved_for):void
    {
        $conn = new \PDO('mysql:dbname=phptask;host=127.0.0.1', 'root', '');

        $statement = $conn->prepare('UPDATE rooms 
                    SET username = :name, 
                        reserved_at = FROM_UNIXTIME(:reserved_at), 
                        reserved_for = :reserved_for, 
                        is_reserved = 1
                    WHERE id_room = :room AND id_floor = :floor
                   ');

        $reserved_at = time();

        $statement->bindParam('name', $name, \PDO::PARAM_STR);
        $statement->bindParam('reserved_at', $reserved_at);
        $statement->bindParam('reserved_for', $reserved_for);
        $statement->bindParam('room', $id_room, \PDO::PARAM_INT);
        $statement->bindParam('floor', $id_floor, \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @param $id_room
     * @param $id_floor
     * @return void
     */
    public function vacating():void
    {
        $conn = new \PDO('mysql:dbname=phptask;host=127.0.0.1', 'root', '');

        $statement = $conn->prepare('UPDATE rooms 
                    SET username = NULL , 
                        reserved_at = NULL, 
                        reserved_for = NULL, 
                        is_reserved = 0
                    WHERE reserved_for < FROM_UNIXTIME(:time) AND is_reserved != 0
                    ');

        $time=time();

        $statement->bindParam('time', $time, \PDO::PARAM_INT);

        $statement->execute();

    }
}