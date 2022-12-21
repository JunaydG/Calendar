<?php

namespace Calendar;

use PDO;

class Events
{

    //PERMET DE RECUPERER DES EVENEMENTS ENTRE DEUX DATES


    public function getEventsBetween(\DateTime $start, \DateTime $end): array
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=calendar', 'root', '', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);

        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";

        $statement = $pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end): array
    {
        $events = $this->getEventsBetween($start, $end);
        $days = [];

        foreach ($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }
}
