function loadContent(sectionId) {
    // Ocultar todas las secciones de contenido
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Mostrar la sección seleccionada
    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}

// Mostrar la sección por defecto (Condiciones de entrega y devolución Marketplace)
document.addEventListener('DOMContentLoaded', () => {
    loadContent('condiciones-entrega-devolucion');
});
