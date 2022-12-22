<?php


require '../src/bootstrap.php';

render('header', ['title' => 'Ajouter un évènement']);

?>

<div class="container">
    <h1>Ajouter un évènement</h1>
    <form action="" method="post" class="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="name">Titre</label>
                    <input id="name" type="text" required class="form-control" name="name" value="demo">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="date">Date</label>
                    <input id="date" type="date" required class="form-control" name="date" value="2022-12-20">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="start">Démarrage</label>
                    <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="19:00">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-2">
                    <label for="end">Fin</label>
                    <input id="end" type="time" required class="form-control" name="end" value="20:00">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-2">
            <button class="btn btn-primary">Ajouter l'évènement</button>
        </div>
    </form>
</div>





<?php render('footer'); ?>