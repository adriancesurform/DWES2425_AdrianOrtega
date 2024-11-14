<?php
session_start();

$nombre = $_SESSION["nombre"];
$apellidos = $_SESSION["apellidos"];
$email = $_SESSION["email"];
$sexo = $_SESSION["sexo"];
$url = $_SESSION["url"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $convivientes = $_POST["convivientes"];
    $aficion = $_POST["aficion"];

    $_SESSION['convivientes'] = $convivientes;
    $_SESSION['aficion'] = $aficion;

    header("Location: exercici127formulari3.php");
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
    <title>Form 2</title>
</head>
<body>

<form method="POST">
    <label>
        <input type="number" name="convivientes" placeholder="Numero de convivientes:">
    </label><br><br>
    <label for="radio">
        <label>Selecciona una afición:
            <input type="radio" name="aficion" value="Deporte" > Deporte
            <input type="radio" name="aficion" value="Cine"> Cine
            <input type="radio" name="aficion" value="Lectura"> Lectura
            <input type="radio" name="aficion" value="Música"> Música
            <input type="radio" name="aficion" value="Viajar"> Viajar
        </label>
    </label><br><br>
    <button type="submit">Enviar
</form>

</body>
</html>