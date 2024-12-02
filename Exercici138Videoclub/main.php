<?php
session_start();
$alquileres = $_SESSION['alquileres'] ?? [];
$credenciales = $_SESSION['credenciales'] ?? [];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    h1, p {
        text-align: center;
    }
    a {
        text-decoration: none;
        color: blue;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
<body>
<h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
<p>Pulse <a href="logout.php">aquí</a> para salir </p>
<p>Volver al <a href="index.php">inicio</a></p>
<table class="listaAlquiler">
    <caption><strong>Lista de Alquileres de Usuario</strong></caption>
    <thead>
    <tr>
        <th>Artista</th>
        <th>Disco</th>
        <th>Precio / dia</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php foreach ($alquileres as $alquiler => $detalles): ?>
    <tr>
        <td><?= htmlspecialchars($detalles[0]) ?></td>
        <td><?= htmlspecialchars($detalles[1]) ?></td>
        <td><?= htmlspecialchars($detalles[2]) ?></td>
    </tr>
    <?php endforeach; ?>
    </tr>
    </tbody>
</table>
</body>
</html>