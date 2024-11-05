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
<form method="POST">
    <label>Telefono: <input type="text" name="telefono" id="telefono" placeholder="123 456 789"></label>
    <button type="submit">Enviar</button>
</form>
</body>
</html>

<?php
    $telefono = $_POST['telefono'];
    $regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/';

    if (preg_match($regex, $telefono)) return true;
    else return false;
?>