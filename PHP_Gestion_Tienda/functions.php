<?php

class Producte {

    private $nom;
    private $descripcio;
    private $preu;
    private $categories;

    public function __construct($nom, $descripcio, $preu)
    {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
        $this->categories = [];
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function getPreu()
    {
        return $this->preu;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function addCategoria(Categoria $categoria) {
        $this->categories[] = $categoria;
    }
}

class Categoria {

    private $categoria;
    private $descripcio;


    public function __construct($categoria, $descripcio)
    {
        $this->categoria = $categoria;
        $this->descripcio = $descripcio;

    }
    public function getNom()
    {
        return $this->categoria;
    }

    public function getDescripcio(){
        return $this->descripcio;
    }

}

function crearProducte($nom, $descripcio, $preu) {
    return new Producte($nom, $descripcio, $preu);
}

function crearCategoria($nom, $descripcio) {
    return new Categoria($nom, $descripcio);

}

function agregarCategoriaAProducte(Producte $producte, Categoria $categoria) {
    $producte->addCategoria($categoria);
}

function obtenirProductsPorCategoria(Categoria $categoriaBuscada) {
    $productesPorCategoria = [];

    foreach ($_SESSION['productes'] as $producte) {
        foreach ($producte->getCategories() as $categoria) {
            if ($categoria->getNom() === $categoriaBuscada->getNom()) {
                $productesPorCategoria[] = $producte;
                break;
            }
        }
    }

    // Formatear la salida según lo solicitado
    echo "<br>Productos en la categoría: " . $categoriaBuscada->getNom() . "<br><br>";

    foreach ($productesPorCategoria as $producte) {
        $precioFormateado = number_format($producte->getPreu(), 2, '.', '.') . ' €'; // Formateo del precio
        echo "Nombre: " . $producte->getNom() . "<br>";
        echo "Descripción: " . $producte->getDescripcio() . "<br>";
        echo "Precio: " . $precioFormateado . "<br>";

        // Mostrar categorías del producto
        echo "Categorías: ";
        $categoriasDelProducto = $producte->getCategories();
        $nombresCategorias = [];

        foreach ($categoriasDelProducto as $categoriaDelProducto) {
            $nombresCategorias[] = $categoriaDelProducto->getNom();
        }

        echo implode(", ", $nombresCategorias) . ".<br><br>"; // Unir nombres con coma y agregar un punto final
    }
}




function mostrarProductes(array $productes) {
    echo 'PRODUCTES: ' . '<br><br>';
    foreach ($productes as $producte) {
        $precioFormateado = number_format($producte->getPreu(), 2, '.', '.') . ' €';
        echo '<li>' . $producte->getNom() . ': ' . $producte->getDescripcio() . ', ' . $precioFormateado . "<br>";
    }
        echo '<br>';
}




function mostrarCategories(array $categories) {
    echo 'CATEGORIES: ' . '<br><br>';
    foreach ($categories as $categoria) {
        echo '<li>' . $categoria->getNom();
    }
    echo '<br>';
}