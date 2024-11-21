<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = json_decode($_POST['dades'], true);

    echo htmlspecialchars($dades['nom']) . "<br>";
    echo htmlspecialchars($dades['edat']) . "<br>";
    echo htmlspecialchars($dades['dni']) . "<br>";
    echo "<br>";
    echo htmlspecialchars($dades['novesdades.noucamp']) . "<br>";
    echo htmlspecialchars($dades['novesdades.nounumero']) . "<br>";

} else {
    echo 'Sin datos';
}