<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = $_POST['dades'];
    $decode = json_decode($dades, true);

    foreach ($decode as $info => $value) {
        echo $value;
        foreach ($value as $k => $v) {
            echo $k;
        }
    }

} else {
    echo 'Sin datos';
}