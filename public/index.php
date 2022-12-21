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
    require '../src/Calendar/Month.php';
    require_once '../src/Calendar/Events.php';


    $events = new Calendar\Events();
    $month = new Calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    $start = $month->getStartingDay();
    $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
    $weeks = $month->getWeeks();
    $end = (clone $start)->modify('+' . (6 + 7 * ($weeks - 1)) . 'days');
    $events = $events->getEventsBetween($start, $end);
    echo '<pre>';
    var_dump($events);
    echo '</pre>';
    


    ?>

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $month->toString(); ?></h1>
        <div>
            <a class="btn btn-primary" href="index.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>">&lt;</a>
            <a class="btn btn-primary" href="index.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>">&gt;</a>
        </div>
    </div>


    <table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
        <?php for ($i = 0; $i < $weeks; $i++) : ?>
            <tr>
                <?php
                foreach ($month->days as $k => $day) :
                    $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
                ?>
                    <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
                        <?php if ($i === 0) : ?>
                            <div class="calendar__weekday"><?= $day; ?></div>
                        <?php endif; ?>
                        <div class="calendar__day"><?= (clone $start)->modify("+" . ($k + $i * 7) . "days")->format('d'); ?></div>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>