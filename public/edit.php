<?php

use Calendar\Events;

require_once '../src/bootstrap.php';


$pdo = getbdd();

$events = new Calendar\Events($pdo);

$errors = [];

if (!isset($_GET['id'])) {
    e404();
}

try {
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}


$data = [
    'name' => $event->getName(),
    'date' => $event->getStart()->format('Y-m-d'),
    'start' => $event->getStart()->format('H:i'),
    'end' => $event->getEnd()->format('H:i'),
    'description' => $event->getDescription()
];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($data);
    if (empty($errors)) {
        $events->hydrate($event, $data);
        $events->update($event);
        header('Location: index.php?success=1');
        exit();
    }
}


render('header', ['title' => $event->getName()]);
?>

<div class="container">
    <h1>Editer l'évènement <small><?= h($event->getName()); ?></small></h1>

    <form action="" method="post" class="form">
        <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
        <div class="mb-2">
            <button class="btn btn-primary">Modifier l'évènement</button>
        </div>
    </form>
</div>

<?php render('footer') ?>