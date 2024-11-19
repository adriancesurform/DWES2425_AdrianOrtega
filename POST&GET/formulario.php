<?php
if (isset($_POST['nom']) && isset($_POST['dni']) && isset($_POST['edat'])) {
    $nombre = htmlspecialchars($_POST['nom']);
    $dni = htmlspecialchars($_POST['dni']);
    $edad = htmlspecialchars($_POST['edat']);

    echo "Nombre: " . $nombre . "<br>";
    echo "DNI: " . $dni . "<br>";
    echo "Edad: " . $edad . "<br>";
}

