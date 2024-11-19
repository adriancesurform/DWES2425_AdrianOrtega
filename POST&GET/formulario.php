<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'] ?? 'Inválido';
    $edat = $_POST['edat'] ?? '';
    $dni = $_POST['dni'] ?? '';

    echo "Nombre: " . htmlspecialchars($nom) . "<br>";
    echo "Edad: " . htmlspecialchars($edat) . "<br>";
    echo "DNI: " . htmlspecialchars($dni) . "<br>";
}
