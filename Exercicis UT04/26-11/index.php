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
    <title>Document</title>
</head>
<body>
<form action="login.php" method="post">
    <fieldset>
        <legend>Login</legend>
        <div><span class="error"><?= htmlspecialchars($error) ?> </span></div>
        <div class="fila">
            <label for="usuario">Usuario:</label><br />
            <input type="text" name="inputUsuario" id="usuario" maxlength="50" /><br />
        </div>
        <div class="fila">
            <label for="password">Password:</label><br />
            <input type="password" name="inputPassword" id="password" maxlength="50" /><br />
        </div>
        <div class="fila">
            <input type="submit" name="enviar"  value="Enviar" />
        </div>
    </fieldset>
</form>
</body>
</html>