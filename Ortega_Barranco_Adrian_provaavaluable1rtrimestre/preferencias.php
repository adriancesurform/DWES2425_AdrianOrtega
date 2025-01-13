<?php
// Iniciar sesión
session_start();

// Manejar el envío del formulario
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil_publico'] = $_POST['perfil_publico'];
    $_SESSION['zona_horaria'] = $_POST['zona_horaria'];
    $mensaje = "Preferencia de usuario guardadas.";
}

// Obtener valores actuales de la sesión o valores predeterminados
$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : 'Español';
$perfil_publico = isset($_SESSION['perfil_publico']) ? $_SESSION['perfil_publico'] : 'Sí';
$zona_horaria = isset($_SESSION['zona_horaria']) ? $_SESSION['zona_horaria'] : 'GMT-2';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        select, button { padding: 8px; width: 100%; }
        .btn { margin-top: 10px; }
        .message { color: green; margin-bottom: 15px; }
    </style>
</head>
<body>
<h1>Preferencias Usuario</h1>

<?php if ($mensaje): ?>
    <p class="message"><?= $mensaje ?></p>
<?php endif; ?>

<form method="POST">
    <!-- Idioma -->
    <div class="form-group">
        <label for="idioma">Idioma</label>
        <select name="idioma" id="idioma">
            <option value="Español" <?= $idioma === 'Español' ? 'selected' : '' ?>>Español</option>
            <option value="Inglés" <?= $idioma === 'Inglés' ? 'selected' : '' ?>>Inglés</option>
        </select>
    </div>

    <!-- Perfil público -->
    <div class="form-group">
        <label for="perfil_publico">Perfil Público</label>
        <select name="perfil_publico" id="perfil_publico">
            <option value="Sí" <?= $perfil_publico === 'Sí' ? 'selected' : '' ?>>Sí</option>
            <option value="No" <?= $perfil_publico === 'No' ? 'selected' : '' ?>>No</option>
        </select>
    </div>

    <!-- Zona horaria -->
    <div class="form-group">
        <label for="zona_horaria">Zona Horaria</label>
        <select name="zona_horaria" id="zona_horaria">
            <option value="GMT-2" <?= $zona_horaria === 'GMT-2' ? 'selected' : '' ?>>GMT-2</option>
            <option value="GMT-1" <?= $zona_horaria === 'GMT-1' ? 'selected' : '' ?>>GMT-1</option>
            <option value="GMT" <?= $zona_horaria === 'GMT' ? 'selected' : '' ?>>GMT</option>
            <option value="GMT+1" <?= $zona_horaria === 'GMT+1' ? 'selected' : '' ?>>GMT+1</option>
            <option value="GMT+2" <?= $zona_horaria === 'GMT+2' ? 'selected' : '' ?>>GMT+2</option>
        </select>
    </div>

    <!-- Botón y enlace -->
    <button type="submit" class="btn">Establecer preferencias</button>
</form>

<a href="mostrar.php">Mostrar preferencias</a>

</body>
</html>
