window.addEventListener('load', function() {
    // Simular la carga de datos
    setTimeout(() => {
        // Ocultar el mensaje de carga
        document.getElementById('loading').style.display = 'none';
        // Mostrar el contenido de la tienda
        document.body.style.overflow = 'visible'; // Permitir el desplazamiento una vez cargado
    }, 3000); // Cambia 3000 a la cantidad de milisegundos que quieras simular
});
