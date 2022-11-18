(function() {
    document.addEventListener("DOMContentLoaded", function() {
        notificacionesCRUD();
    });

    function notificacionesCRUD() {
        const divNotificaciones = document.querySelector("#notificaciones");
        setTimeout(() => {
            divNotificaciones.classList.add("invisible");
        }, 2500)
    }
})();