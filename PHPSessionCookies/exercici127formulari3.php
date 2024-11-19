<?php

$nombre = $_SESSION["nombre"];
$apellidos = $_SESSION["apellidos"];
$email = $_SESSION["email"];
$sexo = $_SESSION["sexo"];
$url = $_SESSION["url"];
$convivientes = $_SESSION["convivientes"];
$aficion = $_SESSION["aficion"];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulari 3</title>
</head>
<body>

<ul>
    <li><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></li>
    <li><strong>Apellidos:</strong> <?php echo htmlspecialchars($apellidos); ?></li>
    <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
    <li><strong>Url:</strong> <?php echo htmlspecialchars($url); ?></li>
    <li><strong>Sexo:</strong> <?php echo htmlspecialchars($sexo); ?></li>
    <li><strong>Convivientes:</strong> <?php echo ($convivientes); ?></li>
    <li><strong>Afición:</strong> <?php echo ($aficion); ?></li>
</ul>

</body>
</html>