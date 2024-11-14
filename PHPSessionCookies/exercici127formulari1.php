<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $sexo = $_POST["selector"];
    $url = $_POST["url"];


    $_SESSION["nombre"] = $nombre;
    $_SESSION["apellidos"] = $apellidos;
    $_SESSION["email"] = $email;
    $_SESSION["sexo"] = $sexo;
    $_SESSION["url"] = $url;


    header("Location: exercici127formulari2.php");
    exit();
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
</head>
<body>
<form method="POST">
    <label>
        <input type="text" name="nombre" placeholder="Introduce tu nombre" required>
    </label><br><br>
    <label>
        <input type="text" name="apellidos" placeholder="Introduce tus apellidos" required>
    </label><br><br>
    <label>
        <input type="url" name="url" placeholder="Introduce tu url" required>
    </label><br><br>
    <label>
        <input type="email" name="email" placeholder="Introduce tu email" required>
    </label><br><br>
    <label>
        <select name="selector" required>
            <option value="" disabled selected>Sexo</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>
    </label><br><br>
    <button type="submit">Enviar</button>
</form>
</body>
</html>