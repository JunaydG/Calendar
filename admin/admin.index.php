<?php
session_start();
require_once '../admin/admin.php'; ?>


<?php if (isset($_SESSION['role']) == "Admin") : ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/yeti/bootstrap.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        <title>Administrateur</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>


    <body>

        <header>
            <nav class="navbar navbar-expand-sm navbar-dark  bg-dark">

                <div class="container-fluid">

                    <a class="navbar-brand" href="">Admin</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                </div>
            </nav>
        </header>

        <table class="table table-hover text-center shadow">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($users as $user) : ?>
                <tr>
                    <td> <?= $user["id"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td> <?= $user["role"] ?></td>
                    <td>
                        <a href='#' onclick='showUpdateModal(<?= $user["id"] ?>)'>Modifier le rôle</a>
                        <a href='?delete=" <?= $user["id"] ?> "'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>


            </tbody>
        </table>


        <!-- Modal for updating a user's role -->
        <div id="updateModal" style="display: none;">
            <form method="post" action="">
                <input type="hidden" name="user_id" id="user_id">
                <label for="role">Rôle:</label>
                <select name="role" id="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <br>
                <input type="submit" name="update_role" value="Mettre à jour le rôle">
            </form>
        </div>

        <script>
            function showUpdateModal(userId) {
                document.getElementById("user_id").value = userId;
                document.getElementById("updateModal").style.display = "block";
            }
        </script>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

    </html>
<?php else : ?>

    <?= "Page Introuvable" ?>

<?php endif; ?>