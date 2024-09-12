document.addEventListener('DOMContentLoaded', function() {
    inciarApp();
});

function inciarApp() {
    buacarPorFecha();
}

function buacarPorFecha() {
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('change', function(e){
        const fechaSeleccionada = e.target.value;
        
        window.location = `?fecha=${fechaSeleccionada}`;
    });
}