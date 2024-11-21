<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $edat = $_POST['edat'];
    $dni = $_POST['dni'];

    echo $nom;

    $tojson = new stdClass();
    $tojson->nombre = $nom;
    $tojson->edat = $edat;
    $tojson->dni = $dni;

    $myJson = json_encode($tojson);
    echo $myJson;

} else {
    echo 'Sin datos';
}