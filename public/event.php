<?php



require_once '../src/bootstrap.php';

// dd($_GET);

require '../src/Calendar/Events.php';


$pdo = getbdd();

$events = new Events($pdo);

if (!isset($_GET['id'])) {
    header('location: 404.php');
}

try {
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}
render('header', ['title' => $event->getName()]);
?>

<h1><?= h($event->getName()); ?></h1>
<ul>
    <li>Date: <?= $event->getStart()->format('d/m/Y'); ?></li>
    <li>Heure de démarrage: <?= $event->getStart()->format('H:i'); ?></li>
    <li>Heure de fin: <?= $event->getEnd()->format('H:i'); ?></li>
    <li>
        Description:<br>
        <?= $event->getDescription(); ?>
    </li>
</ul>

<?php require_once '../views/footer.php'; ?>