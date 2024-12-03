<?php

global $conn;
include("connection.php");
session_start();
$username = $_SESSION['username'];

$consultaUser = "SELECT * FROM `usuarios` WHERE usuario = '$username'";
$resultado = mysqli_query($conn, $consultaUser);
$usuario = mysqli_fetch_assoc($resultado);

$consultaLibros = "SELECT * FROM `libros`";
$resultadoLibros = mysqli_query($conn, $consultaLibros);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Usuario</title>
    <link rel="stylesheet" href="css/mainClient.css">
</head>
<body>
<header>
    <nav>
        <h1>Biblioteca</h1>
        <div class="logout">
            <a href="logout.php">Salir</a>
        </div>
    </nav>
</header>

<main>
    <section id="perfil">
        <h2>Tu perfil:</h2>
        <p>Tu id: <?= $usuario['id'] ?></p>
        <p>Tu nombre: <?= $usuario['nombre'] ?></p>
        <p>Tu usuario: <?= $usuario['usuario'] ?></p>
        <p>Tu contraseña: <?= $usuario['password'] ?></p>

    </section>

    <section id="prestados">
        <h2>Libros Prestados</h2>
        <p>Estos son los libros que tienes actualmente prestados.</p>

    </section>

    <section id="disponibles">
        <h2>Libros Disponibles</h2>
        <p>Estos son los libros disponibles para ser prestados.</p>
        <?php
        while ($libro = mysqli_fetch_assoc($resultadoLibros)) {
            echo "<p><strong>ID:</strong> " . $libro['id'] . "<br>";
            echo "<strong>Título:</strong> " . $libro['titulo'] . "<br>";
            echo "<strong>Autor:</strong> " . $libro['autor'] . "<br>";
            echo "<strong>Género:</strong> " . $libro['genero'] . "</p><br>";
        }
        ?>
    </section>
</main>

<footer>
    <p>&copy; 2024 Biblioteca Digital</p>
</footer>
</body>
</html>
