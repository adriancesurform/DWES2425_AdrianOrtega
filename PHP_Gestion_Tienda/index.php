<?php
require_once "functions.php";

session_start(); // Inicia la sesión al principio del archivo

// Verifica si las variables de sesión ya están definidas, si no, inicialízalas
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}
if (!isset($_SESSION['categorias'])) {
    $_SESSION['categorias'] = [];
}

$productos = &$_SESSION['productos'];
$categorias = &$_SESSION['categorias'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submitCategoria'])) {
        $nombreCategoria = $_POST['nombreCategoria'];
        $infoCategoria = $_POST['infoCategoria'];

        $nuevaCategoria = crearCategoria($nombreCategoria, $infoCategoria);
        $categorias[] = $nuevaCategoria;

    } elseif (isset($_POST['submitProducto'])) {
        $nombreProducto = $_POST['nombreProducto'];
        $infoProducto = $_POST['infoProducto'];
        $precioProducto = $_POST['precioProducto'];
        $categoriaProducto = $_POST['categoriaProducto'];

        $categoriaSeleccionada = null;
        foreach ($categorias as $categoria) {
            if ($categoria->getNombreCategoria() === $categoriaProducto) {
                $categoriaSeleccionada = $categoria;
                break;
            }
        }

        if ($categoriaSeleccionada) {
            $nuevoProducto = crearProducto($nombreProducto, $infoProducto, $precioProducto, $categoriaSeleccionada);
            $productos[] += $nuevoProducto;
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Tienda</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Encabezado -->
    <header>
        <h1>TIENDA</h1>
        <nav>
            <ul>
                <li><a href="" onclick="mostrarFormulario('formProducto')">Añadir Producto</a></li>
                <li><a href="" onclick="mostrarFormulario('formCategoria')">Añadir Categoria</a></li>
            </ul>
        </nav>
    </header>

    <!-- Formulario del Producto -->
    <div id="formProducto" class="formulario">
        <h2>Añadir Producto</h2>
        <form action="" method="POST">
            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" id="nombreProducto" name="nombreProducto" required><br>
            <label for="infoProducto">Descripción del producto:</label>
            <input type="text" id="infoProducto" name="infoProducto" required><br>
            <label for="precioProducto">Precio:</label>
            <input type="number" id="precioProducto" name="precioProducto" required><br>
            <label>Categoría del producto:</label>
            <?php mostrarCategorias($categorias); ?>
            <input type="submit" name="submitProducto" value="Añadir Producto">
        </form>
    </div>

    <!-- Formulario de la Categoría -->
    <div id="formCategoria" class="formulario">
        <h2>Añadir Categoría Nueva</h2>
        <form action="" method="POST">
            <label for="nombreCategoria">Nombre de la Categoría:</label>
            <input type="text" id="nombreCategoria" name="nombreCategoria" required><br>
            <label for="infoCategoria">Descripción de la categoría:</label>
            <input type="text" id="infoCategoria" name="infoCategoria" required><br>
            <input type="submit" name="submitCategoria" value="Añadir Categoría">
        </form>
    </div>

    <?php
    // Mostrar productos añadidos
    if (!empty($productos)) {
        echo '<h2>Productos Añadidos:</h2>';
        foreach ($productos as $producto) {
            echo $producto->muestraInfo() . "<br>";
        }
    }
    var_dump($categorias); // Para verificar que no está vacío y contiene las categorías

    ?>

    <script src="script.js"></script>
</body>
</html>