<?php



require '../src/bootstrap.php';
require_once '../src/Calendar/Events.php';
require_once '../src/Calendar/EventValidator.php';



$db = getbdd();
$data = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $validator = new EventValidator();
    $errors = $validator->validates($_POST);
    if (empty($errors)) {
        $events = new Events(getbdd());
        $event = $events->hydrate(new Event(), $data);
        $events->create($event);
        header('Location: index.php?success=1');
        exit();
    }

}

render('header', ['title' => 'Ajouter un évènement']);
?>

<div class="container">


    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Merci de remplir correctement l'évènement
        </div>
    <?php endif; ?>

    <h1>Ajouter un évènement</h1>
    <form action="" method="post" class="form">
        <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
        <div class="mb-2">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>





<?php render('footer');
var_dump($data) ?>