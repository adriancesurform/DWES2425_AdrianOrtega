<?php
// ADRIAN ORTEGA BARRANCO
// Documentación al estilo PHPDOC. Comentarios en linia adicionales.

/**
 * Clase Producte que representa un producto en el sistema.
 */
class Producte {
    private $nom;          // Nombre del producto
    private $descripcio;   // Descripción del producto
    private $preu;         // Precio del producto
    private $categories;    // Lista de categorías a las que pertenece el producto

    /**
     * Constructor de la clase Producte.
     *
     * @param string $nom Nombre del producto
     * @param string $descripcio Descripción del producto
     * @param float $preu Precio del producto
     */
    public function __construct($nom, $descripcio, $preu) {
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
        $this->categories = []; // Inicializa la lista de categorías como vacía
    }

    /**
     * Obtiene el nombre del producto.
     *
     * @return string Nombre del producto
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Obtiene la descripción del producto.
     *
     * @return string Descripción del producto
     */
    public function getDescripcio() {
        return $this->descripcio;
    }

    /**
     * Obtiene el precio del producto formateado.
     *
     * @return string Precio del producto formateado
     */
    public function getPreu() {
        return number_format($this->preu, 2, '.', '') . '€'; // Formatea el precio a 2 decimales
    }

    /**
     * Obtiene la lista de categorías del producto.
     *
     * @return array Lista de categorías
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Añade una categoría al producto.
     *
     * @param Categoria $categoria Objeto de la clase Categoria
     */
    public function addCategoria(Categoria $categoria) {
        $this->categories[] = $categoria; // Añade la categoría a la lista
    }
}

/**
 * Clase Categoria que representa una categoría en el sistema.
 */
class Categoria {
    private $categoria;    // Nombre de la categoría
    private $descripcio;   // Descripción de la categoría

    /**
     * Constructor de la clase Categoria.
     *
     * @param string $categoria Nombre de la categoría
     * @param string $descripcio Descripción de la categoría
     */
    public function __construct($categoria, $descripcio) {
        $this->categoria = $categoria;
        $this->descripcio = $descripcio;
    }

    /**
     * Obtiene el nombre de la categoría.
     *
     * @return string Nombre de la categoría
     */
    public function getNom() {
        return $this->categoria;
    }

    /**
     * Obtiene la descripción de la categoría.
     *
     * @return string Descripción de la categoría
     */
    public function getDescripcio() {
        return $this->descripcio;
    }
}

/**
 * Crea un nuevo producto.
 *
 * @param string $nom Nombre del producto
 * @param string $descripcio Descripción del producto
 * @param float $preu Precio del producto
 * @return Producte Objeto de la clase Producte
 */
function crearProducte($nom, $descripcio, $preu) {
    return new Producte($nom, $descripcio, $preu);
}

/**
 * Crea una nueva categoría.
 *
 * @param string $nom Nombre de la categoría
 * @param string $descripcio Descripción de la categoría
 * @return Categoria Objeto de la clase Categoria
 */
function crearCategoria($nom, $descripcio) {
    return new Categoria($nom, $descripcio);
}

/**
 * Agrega una categoría a un producto existente.
 *
 * @param Producte $producte Objeto de la clase Producte
 * @param Categoria $categoria Objeto de la clase Categoria
 */
function agregarCategoriaAProducte(Producte $producte, Categoria $categoria) {
    $producte->addCategoria($categoria); // Llama al método para añadir la categoría
}

/**
 * Obtiene los productos que pertenecen a una categoría específica.
 *
 * @param Categoria $categoriaBuscada Objeto de la clase Categoria que se busca
 */
function obtenirProductsPorCategoria(Categoria $categoriaBuscada) {
    $productesPorCategoria = []; // Inicializa un array para almacenar los productos filtrados

    // Filtra productos por la categoría buscada
    foreach ($_SESSION['productes'] as $producte) {
        foreach ($producte->getCategories() as $categoria) {
            // Si la categoría del producto coincide con la buscada, se añade al array
            if ($categoria->getNom() === $categoriaBuscada->getNom()) {
                $productesPorCategoria[] = $producte;
                break; // Sale del bucle interno
            }
        }
    }

    // Muestra los productos en la categoría buscada
    echo "Productos en la categoría \"<b>" . $categoriaBuscada->getNom() ."</b>\":<br><br>";
    foreach ($productesPorCategoria as $producte) {
        echo "<li>Nom: " . $producte->getNom() . "</li>";
        echo "<li>Descripció: " . $producte->getDescripcio() . "</li>";
        echo "<li>Preu: " . $producte->getPreu() . "</li>";

        // Mostrar categorías del producto
        echo "<li>Categorías: ";
        $nombresCategorias = []; // Inicializa un array para los nombres de las categorías
        foreach ($producte->getCategories() as $categoriaDelProducto) {
            $nombresCategorias[] = $categoriaDelProducto->getNom(); // Añade el nombre de la categoría
        }

        echo implode(", ", $nombresCategorias) . ". </li><br><br>"; // Muestra las categorías como una lista
    }
}

/**
 * Muestra todos los productos o los que coinciden con un filtro específico.
 *
 * @param string|null $filtro Palabra clave para filtrar los productos
 */
function mostrarProductes($filtro = null) {
    $productes = $_SESSION['productes'] ?? []; // Usa productos de la sesión por defecto
    $productosFiltrados = []; // Inicializa un array para productos filtrados

    if (is_string($filtro)) { // Verifica si se ha pasado un filtro
        foreach ($productes as $producte) {
            // Comprueba si el nombre del producto contiene la palabra del filtro
            if (stripos($producte->getNom(), $filtro) !== false) {
                $productosFiltrados[] = $producte; // Añade el producto a la lista filtrada
            }
        }
        // Muestra productos filtrados
        echo 'Productes similars a: <b>' . $filtro . '</b><br><br>';
        $productes = $productosFiltrados; // Usa solo los productos filtrados
        foreach ($productes as $producte) {
            echo '<li>' . $producte->getNom() . ": " . $producte->getDescripcio() . ", " . $producte->getPreu() . '</li>';
        }
    } else {
        // Muestra todos los productos si no hay filtro
        echo '<b>Productes:</b><br>';
        foreach ($productes as $producte) {
            echo '<li>' . $producte->getNom() . ": " . $producte->getDescripcio() . ", " . $producte->getPreu() . '</li>';
        }
        echo '<br>';
    }
}

/**
 * Muestra la lista de categorías disponibles.
 *
 * @param array $categories Lista de objetos de la clase Categoria
 */
function mostrarCategories(array $categories) {
    echo '<b>Categories:</b><br><br>';
    foreach ($categories as $categoria) {
        echo '<li>' . $categoria->getNom() . '</li>'; // Muestra el nombre de cada categoría
    }
    echo '<br>';
}
