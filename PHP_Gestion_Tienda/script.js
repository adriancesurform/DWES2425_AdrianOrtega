let formularioVisible = null; // Variable para rastrear qué formulario está visible

function mostrarFormulario(formId) {
    event.preventDefault(); // Asegúrate de que event se pase correctamente

    const formulario = document.getElementById(formId);

    // Si el formulario ya está visible, lo ocultamos
    if (formulario.style.display === 'block') {
        formulario.style.display = 'none';
        formularioVisible = null; // Reiniciamos la variable
    } else {
        // Oculta el formulario visible si hay uno
        if (formularioVisible) {
            const formularioAnterior = document.getElementById(formularioVisible);
            if (formularioAnterior) { // Verifica que el formulario anterior exista
                formularioAnterior.style.display = 'none';
            }
        }
        // Muestra el formulario correspondiente
        formulario.style.display = 'block';
        formularioVisible = formId; // Actualiza la variable con el nuevo formulario visible
    }
}