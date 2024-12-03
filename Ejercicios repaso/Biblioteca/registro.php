<?php

global $conn;
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST["nombre"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $consulta = "INSERT INTO usuarios (nombre, usuario, password) VALUES ('$nombre', '$username', '$password')";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
    }
}
