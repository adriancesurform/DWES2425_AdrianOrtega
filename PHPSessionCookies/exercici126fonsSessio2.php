<?php

if (isset($_COOKIE['color_fons'])) {
    $color_fons = $_COOKIE['color_fons'];
} else {
    $color_fons = 'white';
}

if (isset($_GET['buidar_sessio']) && $_GET['buidar_sessio'] == '1') {
    setcookie('color_fons', '', time() - 3600, "/");
    header("Location: exercici125fonsSessio1.php");
    $color_fons = 'white';
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color de Fons Guardat</title>
</head>
<body style="background-color: <?php echo $color_fons; ?>;">

<h1>Color de Fons Seleccionat</h1>
<p>El color de fons actual és: <strong><?php echo $color_fons; ?></strong></p>

<!-- Enllaç per tornar a la pàgina anterior -->
<p><a href="exercici125fonsSessio1.php">Torna a la pàgina anterior</a></p>

<!-- Enllaç per buidar la sessió i tornar a la pàgina anterior -->
<p><a href="exercici125fonsSessio1.php?buidar_sessio=1">Buidar el color guardat i tornar a la pàgina anterior</a></p>

</body>
</html>
