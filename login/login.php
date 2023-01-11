<?php

session_start();

require_once '../src/bootstrap.php';



//LOGIN
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $db = getbdd();


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->prepare($sql);
    $result->execute();

    $getRole = $db->prepare("SELECT role FROM users WHERE email = '$email'");

    $getRole->execute();

    $resultRoles = $getRole->fetch(PDO::FETCH_OBJ);

    $role = $resultRoles->role;


    if ($result->rowCount() > 0) {
        $data = $result->fetchAll();
        if (password_verify($pass, $data[0]["password"])) {
            // Connexion Réussi
            $_SESSION['email'] = $email;
            $_SESSION['password'] = password_hash($pass, PASSWORD_DEFAULT);

            if ($role == "Admin") {
                $_SESSION['role'] = "Admin";
                header("Location: ../admin/admin.index.php");
                exit();
            }
            if ($role == "User") {
                $_SESSION['role'] = "User";
                header("Location: ../public/index.php");
                exit();
            }
        }
    } else {
        header("Location: ./inscription.view.php");
        exit();
    }
}

//LOGOUT
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ./login.view.php");
}

// INSCRIPTION

if (isset($_POST['submitInscription'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $roleByDefault = "User";



    $db = getbdd();

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->prepare($sql);
    $result->execute();


    if ($result->rowCount() <= 0) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password, role) VALUES ('$email','$pass','$roleByDefault')";
        $req = $db->prepare($sql);
        $req->execute();
        header("Location: ./login.view.php");
        // echo "Enregistrement effectué";
    } else {
        echo 'Le compte existe déja.';
    }
}
