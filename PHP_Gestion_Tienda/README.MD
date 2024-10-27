# Proyecto de Gestión de Productos y Categorías

Este proyecto permite la creación y gestión de productos y categorías mediante PHP y sesiones. A continuación, se describen los pasos necesarios para configurar el entorno y ejecutar el proyecto.

## Requisitos

1. **Servidor Web con PHP**: Asegúrate de tener un servidor web que soporte PHP, como XAMPP o un servidor en la nube.
2. **Navegador Web**: Cualquier navegador moderno funcionará para probar la aplicación.

## Descripción del Código

El archivo `index.php` es el punto de entrada del proyecto, donde se gestionan los productos y las categorías. Aquí se crean productos y categorías, se almacenan en la sesión y se muestran en el navegador. A continuación se describen las principales funciones utilizadas:

- **`crearProducte(nombre, descripcion, precio)`**: Crea un nuevo producto con el nombre, descripción y precio especificados.
- **`crearCategoria(nombre, descripcion)`**: Crea una nueva categoría con el nombre y descripción proporcionados.
- **`agregarCategoriaAProducte(producte, categoria)`**: Asocia una categoría a un producto específico.
- **`mostrarProductes(productes)`**: Muestra la lista de productos que se encuentran en la sesión.
- **`mostrarCategories(categories)`**: Muestra la lista de categorías que se encuentran en la sesión.
- **`obtenirProductsPorCategoria(categoriaBuscada)`**: Filtra y muestra los productos que pertenecen a la categoría solicitada.

## Personalización del Proyecto

Puedes adaptar el proyecto de varias maneras:

- **Agregar Más Productos**: Modifica `index.php` para crear más productos utilizando la función `crearProducte(nombre, descripcion, precio)`.

- **Agregar Más Categorías**: Crea nuevas categorías utilizando `crearCategoria(nombre, descripcion)`.

- **Asignar Categorías a Productos**: Usa `agregarCategoriaAProducte(producte, categoria)` para asociar las nuevas categorías a los productos.

- **Modificar la Presentación**: Ajusta las funciones `mostrarProductes` y `mostrarCategories` en `functions.php` para cambiar cómo se presentan los productos y categorías en la web.
