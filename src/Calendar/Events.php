<?php

require_once '../src/Calendar/Event.php';

class Events
{

    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //PERMET DE RECUPERER DES EVENEMENTS ENTRE DEUX DATES


    public function getEventsBetween(\DateTimeInterface $start, \DateTimeInterface $end): array
    {
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";

        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    public function getEventsBetweenByDay(\DateTimeInterface $start, \DateTimeInterface $end): array
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

    public function hydrate(Event $event, array $data)
    {
        $event->setName($data['name']);
        $event->setDescription($data['description']);
        $event->setStart(\DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['start'])->format('Y-m-d H:i:s'));
        $event->setEnd(\DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['end'])->format('Y-m-d H:i:s'));

        return $event;
    }

    //READ

    public function find(int $id)
    {
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result =  $statement->fetch();
        if ($result === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $result;
    }


    //CREATE

    public function create(Event $event): bool
    {
        $statement = $this->pdo->prepare('INSERT INTO events (name, description, start, end) VALUES (?, ?, ?, ?) ');
        return $statement->execute([
            $event->getName(),
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
        ]);
    }


    //UPDATE
    public function update(Event $event): bool
    {
        $statement = $this->pdo->prepare('UPDATE events SET name = ?, description = ? , start = ?, end = ? WHERE id = ?');
        return $statement->execute([
            $event->getName(),
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getId(),
        ]);
    }
}
