<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/calendar.css">
    <title><?= isset($title) ? h($title) : 'Mon calendrier' ?></title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark mb-3">
        <a href="index.php" class="navbar-brand">Mon Calendrier</a>
        <h5 class="account"><?= 'Connectée en tant que : ' . $_SESSION['email'] ?></h5>
    </nav>