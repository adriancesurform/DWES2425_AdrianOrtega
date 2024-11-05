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
    <label>Texto: <input type="text" name="texto" id="texto"></label>
    <button type="submit">Enviar</button>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'];
    $paraules_prohibides = ["Imbecil", "Tonto"];
    $regex = '/\b(' . implode('|', $paraules_prohibides) . ')\b/i';


    $texto_modificado = preg_replace($regex, '***', $texto);


    echo $texto_modificado;
}
?>
