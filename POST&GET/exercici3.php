<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cogerDades = json_Decode(dadesJSON);
    echo $cogerDades;
} else {
    echo 'Sin datos';
}