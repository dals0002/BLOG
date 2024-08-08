document.addEventListener('DOMContentLoaded', function() {
    console.log('Document ready');
    // Aquí puedes agregar más lógica según sea necesario
});
// SCRIPT para actulizacion del año en el footer
document.addEventListener('DOMContentLoaded', function() {
    const startYear = 2019;
    const currentYear = new Date().getFullYear();
    document.getElementById('start-year').textContent = startYear;
    document.getElementById('current-year').textContent = currentYear;
});
// FIN de SCRIPT para actulizacion del año en el footer