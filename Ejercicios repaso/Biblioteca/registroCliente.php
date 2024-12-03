<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Biblioteca - Inicio</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data" action="registro.php">
    <h1>Registro</h1>
    <label for="nombre">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre y Apellidos" required>
    </label>
    <label for="username">
        <input type="text" name="username" id="username" placeholder="Usuario" required>
    </label>
    <label for="password">
        <input type="password" name="password" id="password" placeholder="Password" required>
    </label>
    <?php if ($error): ?>
        <span class="error" style="text-align: center; color: red"><?= htmlspecialchars($error); ?></span>
    <?php endif; ?>
    <button type="submit">Enviar</button>
    <a href="index.php">Iniciar Sesión</a>
</form>
</body>
</html>