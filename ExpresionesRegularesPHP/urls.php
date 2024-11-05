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
    <label>URL: <input type="text" name="url" id="url"></label>
    <button type="submit">Enviar</button>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $regex = '/\b(?:https?:\/\/|www\.)\S+\b/';

    preg_match_all($regex, $url, $matches);
    foreach ($matches[0] as $match) {
        echo $match . '<br>';
    }
}
?>