<?php 
    require_once "../includes/app.php";
    autenticado();
    
    invocarTemplate("header");
    invocarTemplate("sesion"); 
?>
<section class="administracion contenedor-grande">
    <h2>Área administrativa</h2>

    <div class="contenido-administracion">
        <p>
            En esta sección podrá tener acceso a la creación, edición y eliminación,
            tanto de usuarios como de vehículos.
        </p>

        <div class="iconos-administracion">
            <div class="icon">
                <a class="boton boton-amarillo" href="usuarios/"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <circle cx="12" cy="10" r="3" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                </a>

                <h3>Usuarios</h3>
            </div>
            
            <div class="icon">
                <a class="boton boton-azul" href="vehiculos/"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-car" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="7" cy="17" r="2" />
                    <circle cx="17" cy="17" r="2" />
                    <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                    </svg>
                </a>

                <h3>Vehículos</h3>
            </div>
        </div>
    </div>
</section>

<?php invocarTemplate("footer"); ?>