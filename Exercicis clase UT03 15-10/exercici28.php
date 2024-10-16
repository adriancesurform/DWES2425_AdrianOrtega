<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercici 28</title>
</head>
<body>
    <form method="post">
        <label for="numA">Numero a:</label>
        <input type="number" id="numA" name="numA">
        <br>
        <br>
        <label for="numB">Numero b:</label>
        <input type="number" id="numB" name="numB">
        <br>
        <br>
        <input type="submit" value="Enviar">
        <br>
        <br>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numA = $_POST['numA'];
            $numB = $_POST['numB'];
            $x = -($numB)/$numA;

            if ($numA == 0 || $numB == 0) echo "El resultado es 0";
            echo "X es: " . round($x, 2);
        }
    ?>
</body>
</html>