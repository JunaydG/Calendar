<?php
session_start();
require_once '../admin/admin.php'; ?>



<?php if (isset($_SESSION['role']) == "Admin"): ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <h1>Gestion des utilisateurs</h1>
    
    <!-- Form for creating a new user -->
    <form method="post" action="">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="role">Rôle:</label>
        <select name="role" id="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <input type="submit" name="create_user" value="Créer l'utilisateur">
    </form>

</body>
</html>
<?php else: ?>

    <?= "Page Introuvable" ?>

<?php endif; ?>


