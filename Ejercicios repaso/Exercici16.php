<?php
global $resultado;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pesetas"])) {
        $pesetas = $_POST["pesetas"];
        $resultado = $pesetas / 166.386;
    }
}

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
<body>
<form method="POST" id="formulario">
    <label for="pesetas">Pesetas:</label>
    <input type="text" id="pesetas" name="pesetas">
    <button type="submit">Convertir</button>
    <br><br>

    <?php echo $pesetas . " pesetas son: " . number_format($resultado, 2) . "€" ?>
</form>
</body>
</html>

