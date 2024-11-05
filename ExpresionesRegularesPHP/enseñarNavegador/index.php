<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Navegador</title>
</head>
<body>
<h1>Información del Navegador</h1>
<p>
    <?php
        $browserInfo = $_SERVER['HTTP_USER_AGENT'];
    $regex = '#^[^/]+#';

    if (preg_match($regex, $browserInfo, $matches)) {
    $matches = $matches[0];
    echo "Tu navegador es: " . $matches . "<br>";
    }
    ?>
</p>
</body>
</html>
