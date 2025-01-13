<?php
global $resultado;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["texto"])) {
        $texto = $_POST["texto"];
        switch ($texto) {
            case "1": $resultado = "Lunes"; break;
            case "2": $resultado = "Martes"; break;
            case "3": $resultado = "Miercoles"; break;
            case "4": $resultado = "Jueves"; break;
            case "5": $resultado = "Viernes"; break;
            case "6": $resultado = "Sabado"; break;
            case "7": $resultado = "Domingo"; break;
        }
    } else {
        $resultado = "Error";
    }
} else {
    $resultado = "Error";
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
<form action="" method="POST">
    <label for="texto"></label>
    <input type="text" id="texto" name="texto">
    <button type="submit">Enviar</button>

    <br><br>

    <?php echo $resultado ?>
</form>
</body>
</html>
