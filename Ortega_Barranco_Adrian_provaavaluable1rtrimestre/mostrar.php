<?php
// Iniciar sesión
session_start();

// Manejar acciones de los botones
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrar'])) {
        if (isset($_SESSION['idioma']) || isset($_SESSION['perfil_publico']) || isset($_SESSION['zona_horaria'])) {
            // Borrar preferencias de la sesión
            unset($_SESSION['idioma'], $_SESSION['perfil_publico'], $_SESSION['zona_horaria']);
            $mensaje = "Preferencias Borradas.";
        } else {
            $mensaje = "Debes fijar primero las preferencias.";
        }
    }
    if (isset($_POST['establecer'])) {
        // Redirigir a preferencias.php
        header("Location: preferencias.php");
        exit;
    }
}

// Obtener valores actuales de la sesión
$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : null;
$perfil_publico = isset($_SESSION['perfil_publico']) ? $_SESSION['perfil_publico'] : null;
$zona_horaria = isset($_SESSION['zona_horaria']) ? $_SESSION['zona_horaria'] : null;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Preferencias</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .message { color: green; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        button { padding: 8px 16px; margin-right: 10px; }
    </style>
</head>
<body>
<h1>Preferencias Almacenadas</h1>

<?php if ($mensaje): ?>
    <p class="message"><?= $mensaje ?></p>
<?php endif; ?>

<?php if ($idioma || $perfil_publico || $zona_horaria): ?>
    <p><strong>Idioma:</strong> <?= htmlspecialchars($idioma ?? 'No definido') ?></p>
    <p><strong>Perfil Público:</strong> <?= htmlspecialchars($perfil_publico ?? 'No definido') ?></p>
    <p><strong>Zona Horaria:</strong> <?= htmlspecialchars($zona_horaria ?? 'No definido') ?></p>
<?php else: ?>
    <p>No hay preferencias almacenadas.</p>
<?php endif; ?>

<form method="POST">
    <button type="submit" name="borrar">Borrar</button>
    <button type="submit" name="establecer">Establecer</button>
</form>
</body>
</html>
