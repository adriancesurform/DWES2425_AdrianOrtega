<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = json_decode($_POST['dades'], true);

    echo htmlspecialchars($dades['nom']) . "<br>";
    echo htmlspecialchars($dades['edat']) . "<br>";
    echo htmlspecialchars($dades['dni']) . "<br>";
    echo "<br>";
    echo htmlspecialchars($dades['novesdades']);

} else {
    echo 'Sin datos';
}