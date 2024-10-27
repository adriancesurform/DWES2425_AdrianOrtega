<?php
require_once 'functions.php';

// Crear los productos
$producte1 = crearProducte('Camiseta', 'Camiseta de algodón', 19.99);
$producte2 = crearProducte('Pantalones', 'Pantalones vaqueros', 39.99);

$categoria1 = crearCategoria('Roba', 'Secció de roba');
$categoria2 = crearCategoria('Home', 'Productes per a home');


// Verificar si la sesión para productos está iniciada, si no, crearla
if (!isset($_SESSION['productes']) && !isset($_SESSION['categories'])) {
    $_SESSION['productes'] = [];
    $_SESSION['categories'] = [];
}

// Agregar los productos a la sesión
$_SESSION['productes'][] = $producte1;
$_SESSION['productes'][] = $producte2;
$_SESSION['categories'][] = $categoria1;
$_SESSION['categories'][] = $categoria2;

agregarCategoriaAProducte($producte1, $categoria1);
agregarCategoriaAProducte($producte1, $categoria2);
agregarCategoriaAProducte($producte2, $categoria2);

// Mostrar productos desde la sesión
mostrarProductes($_SESSION['productes']);
mostrarCategories($_SESSION['categories']);

obtenirProductsPorCategoria($categoria1);
