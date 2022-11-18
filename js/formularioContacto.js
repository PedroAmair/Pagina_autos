(function () {
    document.addEventListener("DOMContentLoaded", function() {
        opcionesAdicionales();
    });

    function opcionesAdicionales() {
        const decision = document.querySelector("#seleccionado");

        decision.addEventListener("change", function() {
            const camposDisponibles = document.querySelector("#estado");
            camposDisponibles.classList.toggle("invisible");
    
            if(!camposDisponibles.classList.contains("invisible")) {
                document.querySelector("#marca").value = "";
                document.querySelector("#modelo").value = "";
                document.querySelector("#ano").value = "";
                
            }
        });
    }
    
})();