<?php
session_start();
require_once '../admin/admin.php'; ?>



<?php if (isset($_SESSION['role']) == "Admin") : ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/yeti/bootstrap.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        <title>Gestion des utilisateurs</title>
        <link rel="stylesheet" href="css/admin.new.css">
    </head>

    <body>
        
    <header>
            <nav class="navbar navbar-expand-sm navbar-dark  bg-dark">

                <div class="container-fluid">

                    <a class="navbar-brand" href="admin.index.php">Admin</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarColor01">

                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="admin.add.php">Créer un utilisateur</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>

        <h1 class="">Créer un utilisateur</h1>

        <div class="newuser d-flex justify-content-center">

        <!-- Form for creating a new user -->
        <form class="d-flex justify-content-center align-items-center flex-column" method="post" action="">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">
            <br>
            <label for="role">Rôle:</label>
            <select name="role" id="role">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <br>
            <input type="submit" name="create_user" value="Créer l'utilisateur">
        </form>

        </div>

    </body>

    </html>
<?php else : ?>

    <?= "Page Introuvable" ?>

<?php endif; ?>