<?php
require_once 'functions.php'; // Incluimos el archivo functions.php
session_start(); // Iniciar la sesión
unset($_SESSION['productes'], $_SESSION['categories']); // Limpiamos la sesión para evitar duplicados.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIENDA - HOME</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div id="loading" class="loading">
        <div class="spinner"></div>
        <div class="loading-text">Cargando todo lo necesario...</div>
    </div>

    <h1>Tienda de Ropa</h1>

    <?php

    $_SESSION['productes'] = []; // Inicializa la sesión para productos como un array vacío
    $_SESSION['categories'] = []; // Inicializa la sesión para categorías como un array vacío
    $_SESSION['productosRopa'] = []; // Inicializa la sesión para productos de ropa como un array vacío

    // Crear los productos
    $producte1 = crearProducte('Camiseta', 'Camiseta de algodón', 19.99); // Crea un producto: Camiseta
    $producte2 = crearProducte('Pantalones', 'Pantalones vaqueros', 39.99);
    $producte3 = crearProducte('Camiseta de tirantes', 'Con logo Nike estampado', 24.80); // Crea un producto: Pantalones

    // Crear las categorías
    $categoria1 = crearCategoria('Roba', 'Secció de roba'); // Crea una categoría: Roba
    $categoria2 = crearCategoria('Home', 'Productes per a home'); // Crea una categoría: Home

    // Agregar los productos a la sesión
    $_SESSION['productes'][] = $producte1; // Añade el producto Camiseta a la sesión
    $_SESSION['productes'][] = $producte2; // Añade el producto Pantalones a la sesión
    $_SESSION['productes'][] = $producte3; // Añade el producto Pantalones a la sesión
    $_SESSION['categories'][] = $categoria1; // Añade la categoría Roba a la sesión
    $_SESSION['categories'][] = $categoria2; // Añade la categoría Home a la sesión

    // Asigna categorías a los productos
    agregarCategoriaAProducte($producte1, $categoria1); // Asocia la categoría Roba con la camiseta
    agregarCategoriaAProducte($producte1, $categoria2); // Asocia la categoría Home con la camiseta
    agregarCategoriaAProducte($producte2, $categoria2); // Asocia la categoría Home con los pantalones
    agregarCategoriaAProducte($producte3, $categoria1); // Asocia la categoría Home con los pantalones

    // Muestra la información de los productos y categorías actuales de la sesión.
    echo '<h2>Productos Disponibles</h2>';
    mostrarProductes($_SESSION['productes']); // Muestra la lista de productos en la sesión

    echo '<h2>Categorías Disponibles</h2>';
    mostrarCategories($_SESSION['categories']); // Muestra la lista de categorías en la sesión

    // Muestra los productos de la categoría 2 (Home)
    echo '<h2>Productos en la categoría seleccionada:</h2>';
    $buscarCategoria = $categoria2; // Modificar el valor según la busqueda que queramos hacer.
    obtenirProductsPorCategoria($buscarCategoria); // Obtiene y muestra productos de la categoría Home

    // Muestra productos que coincidan con el nombre o sean similares a lo que busques.
    echo '<h2>Productos por nombre: </h2>';
    $buscarProducto = "Cami"; // Modificar el valor según la busqueda que queramos hacer.
    mostrarProductes($buscarProducto); // Filtra y muestra productos que contienen la palabra "Pan"
    ?>


</div>
<script src="script.js"></script>
</body>
</html>
