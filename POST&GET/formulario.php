<?php
if (isset($_POST['nombre']) && isset($_POST['dni']) && isset($_POST['edad'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $dni = htmlspecialchars($_POST['dni']);
    $edad = htmlspecialchars($_POST['edad']);

    echo "Nombre: " . $nombre . "<br>";
    echo "DNI: " . $dni . "<br>";
    echo "Edad: " . $edad . "<br>";
}

