<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = $_POST['dades'];
    $decode = json_decode($dades, true);

    foreach ($decode as $info => $value) {
        foreach ($value as $k => $v) {
            echo $v;
        }
    }




} else {
    echo 'Sin datos';
}