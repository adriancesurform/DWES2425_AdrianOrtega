<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dades = json_decode($_POST['dades'], true);
    $novesDades = json_decode($dades['novesdades'], true);

    echo htmlspecialchars($dades['nom']) . "<br>";
    echo htmlspecialchars($dades['edat']) . "<br>";
    echo htmlspecialchars($dades['dni']) . "<br>";
    echo "<br>";
    echo htmlspecialchars($novesDades['noucamp']) . "<br>";
    echo htmlspecialchars($novesDades['nounumero']) . "<br>";

} else {
    echo 'Sin datos';
}