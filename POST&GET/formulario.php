<?php
var_dump($_POST);
var_dump($_FILES);
var_dump($_GET);
var_dump($_REQUEST);
var_dump($_SESSION);
var_dump($_COOKIE);
var_dump($_ENV);
var_dump($http_response_header);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);

    $nom = $_POST['nom'] ?? 'Inválido';
    $edat = $_POST['edat'] ?? '';
    $dni = $_POST['dni'] ?? '';

    echo "Nombre: " . htmlspecialchars($nom) . "<br>";
    echo "Edad: " . htmlspecialchars($edat) . "<br>";
    echo "DNI: " . htmlspecialchars($dni) . "<br>";
}
