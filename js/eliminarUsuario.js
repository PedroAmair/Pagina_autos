(function() {
    document.addEventListener("DOMContentLoaded", function() {
        notificacionUsuario();
    });

    function notificacionUsuario() {
        const notifBoton = document.querySelector("#notifBoton");
        notifBoton.onclick = temporizador();
    }

    function temporizador() {
        const divNotificacion = document.querySelector("#notificacionUsuario");
        setTimeout(() => {
            divNotificacion.classList.add("invisible");
        }, 3000)
    }
})();