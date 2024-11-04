<?php

$servername = "sql108.infinityfree.com";
$username = "if0_37620348";
$password = "PKyu7PnoiRO";
$dbname = "if0_37620348_todolist";

// Crear la connexió
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprovar si la connexió ha fallat
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}
?>
