<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="css/calendar.css">
</head>
<body>

<nav class="navbar navbar-dark bg-primary mb-3">
<a href="index.php" class="navbar-brand">Mon Calendrier</a>
</nav>


<?php 
require '../src/Date/Month.php';

$month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);

$day = $month->getStartingDay()->modify('last monday');



?>

<h1><?=$month->toString();?></h1>



<table class="calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
    <?php for ($i=0; $i < $month->getWeeks(); $i++): ?>
        <tr>
            <td>Lundi<br>
            <?=  $day?>
            </td>
            <td>Mardi</td>
            <td>Mercredi</td>
            <td>Jeudi</td>
            <td>Vendredi</td>
            <td>Samedi</td>
            <td>Dimanche</td>
        </tr>
    <?php endfor; ?>    
</table>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>