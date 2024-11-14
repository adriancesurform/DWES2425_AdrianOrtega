<?php

// Comprovar si s'ha enviat el formulari per canviar el color
if (isset($_POST['color'])) {
    setcookie('color_fons', $_POST['color'], time() + 86400 * 30, "/"); // Guardem el color de fons en una cookie per 30 dies
    $color_fons = $_POST['color'];
} else if (isset($_COOKIE['color_fons'])) {
    $color_fons = $_COOKIE['color_fons']; // Rebem el color de fons de la cookie si existeix
} else {
    $color_fons = 'white'; // Color per defecte si no hi ha cap color seleccionat
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Color de Fons</title>
</head>
<body style="background-color: <?php echo $color_fons; ?>;">

<h1>Canvia el color de fons de la pàgina</h1>

<form method="post" action="">
    <label for="color">Tria un color:</label>
    <select name="color" id="color">
        <option value="white" <?php if ($color_fons == 'white') echo 'selected'; ?>>Blanc</option>
        <option value="red" <?php if ($color_fons == 'red') echo 'selected'; ?>>Vermell</option>
        <option value="blue" <?php if ($color_fons == 'blue') echo 'selected'; ?>>Blau</option>
        <option value="green" <?php if ($color_fons == 'green') echo 'selected'; ?>>Verd</option>
        <option value="yellow" <?php if ($color_fons == 'yellow') echo 'selected'; ?>>Groc</option>
    </select>
    <input type="submit" value="Canviar color">
</form>

<!-- Enllaç a l'altre arxiu -->
<p><a href="exercici126fonsSessio2.php">Vés a l'altre arxiu</a></p>

</body>
</html>
