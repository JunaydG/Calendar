<?php

use Calendar\Events;

require_once '../src/bootstrap.php';

// dd($_GET);

require '../src/Calendar/Events.php';

require_once '../views/header.php';

$pdo = getbdd();

$events = new Calendar\Events($pdo);

if (!isset($_GET['id'])) {
    header('location: 404.php');
}
$event = $events->find($_GET['id']);

dd($event);
?>

<h1><?= $event['name']; ?></h1>
<ul>
    <li>Date: <?= (new DateTime($event['start']))->format('d/m/Y'); ?></li>
    <li>Heure de démarrage: <?= (new DateTime($event['start']))->format('H:i'); ?></li>
    <li>Heure de fin: <?= (new DateTime($event['end']))->format('H:i'); ?></li>
    <li>
        Description:<br>
        <?= $event['description']; ?>
    </li>
</ul>

<?php require_once '../views/footer.php'; ?>