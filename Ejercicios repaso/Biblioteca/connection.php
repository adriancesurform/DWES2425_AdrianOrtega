<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

// Crear la connexió
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprovar si la connexió ha fallat
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}
