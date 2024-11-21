<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = $_POST['dades'];
    $decode = json_decode($dades, true);

    foreach ($decode as $info => $value) {
        echo $info . " => " . $value . "<br>";
    }

    foreach ($info as $info2 => $value) {
        echo $info2 . " => " . $value . "<br>";
    }



} else {
    echo 'Sin datos';
}