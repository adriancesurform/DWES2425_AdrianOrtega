<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? 'No proporcionado';
    $edat = $_POST['edat'] ?? 'No proporcionado';
    $dni = $_POST['dni'] ?? 'No proporcionado';

    echo "Nombre: $nom <br>";
    echo "Edad: $edat <br>";
    echo "DNI: $dni <br>";
} else {
    echo "No se han recibido datos.";
}


