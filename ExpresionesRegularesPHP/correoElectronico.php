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
            <label>Email: <input type="text" name="email" id="email" placeholder="example@email.com"></label>
            <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
    $email = $_POST['email'];
    $regex = '/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/';

    if (preg_match($regex, $email)) return true;
    else return false;

?>