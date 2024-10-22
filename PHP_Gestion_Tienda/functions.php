<?php

class Producto {
    private $nombreProducto;
    private $infoProducto;
    private $precioProducto;
    private $categoriaProducto;

    public function __construct($nombreProducto, $infoProducto, $precioProducto, Categoria $categoriaProducto)
    {
        $this->nombreProducto = $nombreProducto;
        $this->infoProducto = $infoProducto;
        $this->precioProducto = $precioProducto;
        $this->categoriaProducto = $categoriaProducto;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function getInfoProducto() {
        return $this->infoProducto;
    }

    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function getCategoriaProducto() {
        return $this->categoriaProducto;
    }

    public function muestraInfo() {
        return "{$this->getNombreProducto()} - {$this->getInfoProducto()} - {$this->getPrecioProducto()}€ - Categoría: {$this->getCategoriaProducto()->getNombreCategoria()}";
    }
}

class Categoria {
    private $nombreCategoria;
    private $infoCategoria;

    public function __construct($nombreCategoria, $infoCategoria) {
        $this->nombreCategoria = $nombreCategoria;
        $this->infoCategoria = $infoCategoria;
    }

    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    public function getInfoCategoria() {
        return $this->infoCategoria;
    }



}

function crearProducto($nombreProducto, $infoProducto, $precioProducto, $categoriaProducto) {
    return new Producto($nombreProducto, $infoProducto, $precioProducto, $categoriaProducto);
}

function crearCategoria($nombreProducto, $infoProducto) {
    return new Categoria($nombreProducto, $infoProducto);
}

function obtenirProductosPorCategoria(Categoria $categoriaProducto) {
}

function mostrarProductos(array $productos) {
    foreach ($productos as $producto) {
        echo $producto->muestraInfo() . "<br>";

    }
}

function mostrarCategorias(array $categorias): void
{
    foreach ($categorias as $categoria) {
    $categoriaNombre = htmlspecialchars($categoria->getNombreCategoria());
        echo '<label for="' . $categoriaNombre . '"><input type="radio" id="' . $categoriaNombre . '" name="categoriaProducto" value="' . $categoriaNombre . '" required>' . " " . $categoriaNombre . '</label><br>';
    }
}

