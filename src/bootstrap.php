<?php

function dd(...$vars)
{
    foreach ($vars as $var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}


function getbdd()
{
    return new \PDO('mysql:host=localhost;dbname=calendar', 'root', '', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
}

function h(string $value): string
{
    if ($value === null) {
        return '';
    }
    return htmlentities($value);
}