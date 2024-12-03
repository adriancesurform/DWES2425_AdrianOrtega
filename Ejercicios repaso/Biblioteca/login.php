<?php

global $conn;
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $consulta = "SELECT * FROM `usuarios` WHERE usuario = '$username' AND password = '$password'";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("location: mainClient.php");
    } else {
        $_SESSION['error'] = 'Usuario o contraseña incorrectos';
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
