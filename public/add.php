<?php


require '../src/bootstrap.php';
render('header', ['title' => 'Ajouter un évènement']);

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $errors = [];
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($_POST);
    if (empty($errors)) {
        dd($errors);
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
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="name">Titre</label>
                    <input id="name" type="text" required class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : '' ?>">
                    <?php if (!empty($errors['name'])) : ?>
                        <p class="alert alert-warning"><?= $errors['name']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="date">Date</label>
                    <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : '' ?>">
                    <?php if (!empty($errors['date'])) : ?>
                        <p class="alert alert-warning"><?= $errors['date']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="start">Démarrage</label>
                    <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : '' ?>">
                    <?php if (!empty($errors['start'])) : ?>
                        <p class="alert alert-warning small"><?= $errors['start']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="end">Fin</label>
                    <input id="end" type="time" required class="form-control" name="end" value="<?= isset($data['end']) ? h($data['end']) : '' ?>">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"><?= isset($data['description']) ? h($data['description']) : '' ?></textarea>
        </div>

        <div class="mb-2">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>





<?php render('footer'); ?>