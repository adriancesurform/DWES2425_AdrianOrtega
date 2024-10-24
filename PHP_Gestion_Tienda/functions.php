<?php

class Producte {

    private $nom;
    private $descripcio;
    private $preu;

    public function __construct($nom, $descripcio, $preu)
    {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
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

}

function obtenirProductsPorCategoria(Categoria $categoria) {

    //...

}

function mostrarProductes(array $productes)
{
    foreach ($productes as $producte) {
        // Para acceder a las propiedades privadas, necesitarías métodos getter en la clase Producte
        echo 'Nombre: ' . $producte->getNom(). '<br>';
        echo 'Descripción: ' . $producte->getDescripcio() . '<br>';
        echo 'Precio: ' . number_format($producte->getPreu(), 2) . ' €<br><br>';
    }
}

function mostrarCategories(array $categories)
{
foreach ($categories as $categoria) {
    echo 'Nombre: ' . $categoria->getNom(). '<br>';
    echo 'Descripcio: ' . $categoria->getDescripcio() . '<br><br>';
}
}