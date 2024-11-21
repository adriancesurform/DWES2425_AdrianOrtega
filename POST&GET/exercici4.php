<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = $_POST['dades'];
    $decode = json_decode($dades, true);

    foreach ($decode as $info => $value) {
        echo $info . " => " . $value . "<br>";
    }

    foreach ($value as $info => $value2) {
        echo $info . " => " . $value2 . "<br>";
    }



} else {
    echo 'Sin datos';
}