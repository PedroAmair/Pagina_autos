(function() {
    document.addEventListener("DOMContentLoaded", function() {
        menuMovil();
    });

    function menuMovil() {
        const menu = document.querySelector(".menu-movil");
        menu.addEventListener("click", activarNavegacion);
    }

    function activarNavegacion(){
        const navegacion = document.querySelector(".navegacion");
        navegacion.classList.toggle("visible");
    }
})();