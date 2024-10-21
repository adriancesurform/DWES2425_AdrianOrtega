<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 21</title>
</head>
<body>
    <form method="post">
        <label for="radio">Radio:</label>
        <input type="number" id="radio" name="radio">
        <br>
        <br>
        <label for="altura">Altura:</label>
        <input type="number" id="altura" name="altura">
        <br>
        <br>
        <input type="submit" value="Enviar">
        <br>
        <br>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $radio = htmlspecialchars($_POST['radio']);
            $altura = htmlspecialchars($_POST['altura']);

            $resultado = (1/3) * pi() * pow($radio, 2) * $altura;

            echo "El resultado es: " . round($resultado, 2);
        }
    ?>

</body>
</html>