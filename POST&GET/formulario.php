<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'] ?? 'Vacío';
    $edat = $_POST['edat'] ?? 'Vacio';
    $dni = $_POST['dni'] ?? 'Vacío';

    echo "Nombre: " . htmlspecialchars($nom) . "<br>";
    echo "Edad: " . htmlspecialchars($edat) . "<br>";
    echo "DNI: " . htmlspecialchars($dni) . "<br>";
}
