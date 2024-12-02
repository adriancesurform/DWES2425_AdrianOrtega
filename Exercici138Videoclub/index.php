<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        margin: 0 auto;
    }
    form {
        margin: 10% auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px solid black;
        width: 10%;
        padding: 10px;
    }
    form label {
        margin: 1%
    }
    form input{
        width: 100%;
    }
    form label {
        width: 80%;
    }

    form button{
        margin: 10%;
    }

</style>
<body>
<form method="POST" action="login.php">
    <h1>Login</h1>
    <label for="usuario">Usuario:
        <input type="text" name="usuario" id="usuario" required>
    </label>
    <label for="password">Contraseña:
        <input type="password" name="password" id="password" required>
    </label>
    <?php if ($error): ?>
        <span class="error" style="text-align: center; color: red"><?= htmlspecialchars($error); ?></span>
    <?php endif; ?>
    <button type="submit">Enviar</button>
</form>
</body>
</html>