<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = $_POST['dades'];
    $decode = json_decode($dades, true);

    foreach ($decode as $info => $value) {
        echo $value;
        echo "1";
    } echo "2";

} else {
    echo 'Sin datos';
}