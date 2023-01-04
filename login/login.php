<?php

session_start();

require_once '../src/bootstrap.php';



//LOGIN
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $db = getbdd();


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        $data = $result->fetchAll();
        if (password_verify($pass, $data[0]["password"])) {
            //Connexion Réussi
            header("Location: ../public/index.php");
            $_SESSION['email'] = $email;
            exit();
        }
    } else {
        header("Location: ./inscription.view.php");
        exit();
    }
}

// INSCRIPTION

if (isset($_POST['submitInscription'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

   

    $db = getbdd();

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->prepare($sql);
    $result->execute();


    //EMAIL EXIST
    $exists = "SELECT EXISTS(SELECT * FROM users) AS email";
    $resultExist = $db->prepare($exists);
    $resultExist->execute();

    if ($result->rowCount() <= 0) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email','$pass')";
        $req = $db->prepare($sql);
        $req->execute();
        header("Location: ./inscription_validate.view.php");
        // echo "Enregistrement effectué";

    }else {
        echo "Email EXIST";
    }
}
