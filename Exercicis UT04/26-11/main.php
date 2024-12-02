<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='123server.php'> Identificarse</a> . <br>");
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de productos</title>
</head>
<body>
<h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
<p>Pulse <a href="logout.php">aquí</a> para salir </p>
<p>Volver al <a href="main.php">inicio</a></p>
<h2>Listado de productos</h2>
<ul>
    <li>Producto 1</li>
    <li>Producto 2</li>
    <li>Producto 3</li>
</ul>
</body>
</html>
