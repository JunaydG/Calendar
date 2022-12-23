<?php

use Calendar\Event;

require '../src/bootstrap.php';
render('header', ['title' => 'Ajouter un évènement']);

$data = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $errors = [];
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($_POST);
    if (empty($errors)) {
        $event = new \Calendar\Event();
        $event->setName($data['name']);
        $event->setDescription($data['name']);
        $event->setStart(DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' ' .$data['start'])->format('Y-m-d H:i:s'));
        $event->setEnd(DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' ' .$data['end'])->format('Y-m-d H:i:s'));
        $events = new \Calendar\Events(getbdd());
        $events->create($event);
        header('Location: index.php?success=1');
        exit();
    }
}

?>

<div class="container">


    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Merci de remplir correctement l'évènement
        </div>
    <?php endif; ?>

    <h1>Ajouter un évènement</h1>
  <form action="" method="post" class="form">
  <?php render('calendar/form' , ['data' => $data, 'errors' => $errors]); ?>
        <div class="mb-2">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>





<?php render('footer'); ?>