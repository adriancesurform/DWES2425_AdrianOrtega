<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $edat = $_POST["edat"];
    $dni = $_POST["dni"];

    echo $nom;
    echo $edat;
    echo $dni;

} else {
    echo "Sin datos";
}