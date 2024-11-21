<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = htmlspecialchars($_POST['dades']);
    echo $dades;
} else {
    echo 'Sin datos';
}