<?php
// Importa las funciones definidas en 'functions.php'
require_once 'functions.php';

// Crear los productos
$producte1 = crearProducte('Camiseta', 'Camiseta de algodón', 19.99); // Crea un producto: Camiseta
$producte2 = crearProducte('Pantalones', 'Pantalones vaqueros', 39.99); // Crea un producto: Pantalones

// Crear las categorías
$categoria1 = crearCategoria('Roba', 'Secció de roba'); // Crea una categoría: Roba
$categoria2 = crearCategoria('Home', 'Productes per a home'); // Crea una categoría: Home

// Verificar si la sesión para productos y categorías está iniciada
if (!isset($_SESSION['productes']) && !isset($_SESSION['categories'])) {
    $_SESSION['productes'] = []; // Inicializa la sesión para productos como un array vacío
    $_SESSION['categories'] = []; // Inicializa la sesión para categorías como un array vacío
    $_SESSION['productosRopa'] = []; // Inicializa la sesión para productos de ropa como un array vacío
}

// Agregar los productos a la sesión
$_SESSION['productes'][] = $producte1; // Añade el producto Camiseta a la sesión
$_SESSION['productes'][] = $producte2; // Añade el producto Pantalones a la sesión
$_SESSION['categories'][] = $categoria1; // Añade la categoría Roba a la sesión
$_SESSION['categories'][] = $categoria2; // Añade la categoría Home a la sesión

// Asigna categorías a los productos
agregarCategoriaAProducte($producte1, $categoria1); // Asocia la categoría Roba con la camiseta
agregarCategoriaAProducte($producte1, $categoria2); // Asocia la categoría Home con la camiseta
agregarCategoriaAProducte($producte2, $categoria2); // Asocia la categoría Home con los pantalones

// Muestra la información de los productos y categorías actuales de la sesión.
mostrarProductes($_SESSION['productes']); // Muestra la lista de productos en la sesión
mostrarCategories($_SESSION['categories']); // Muestra la lista de categorías en la sesión

// Muestra los productos de la categoría 2 (Home)
obtenirProductsPorCategoria($categoria2); // Obtiene y muestra productos de la categoría Home

// Muestra productos que coincidan con el nombre o sean similares a "Pan"
mostrarProductes("Pan"); // Filtra y muestra productos que contienen la palabra "Pan"
