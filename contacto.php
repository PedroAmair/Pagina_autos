<?php 
    require_once "includes/app.php";

    session_start();
    
    invocarTemplate("header"); 
?>

    <section class="contacto contenedor-grande">
        <h2>Contacto</h2>
        <div class="imagen-banner"></div>

        <h2 class="subtitulo">Complete la información solicitada</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Datos personales</legend>
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Ingresa tu nombre" id="nombre">
                </div>
                
                <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input type="text" placeholder="Ingresa tu apellido" id="apellido">
                </div>
                
                <div class="campo">
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Ingresa tu correo electrónico" id="email" required>
                </div>
                
                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" placeholder="Ingresa tu número telefónico" id="telefono">
                </div>
                
                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
                </div>
                
                <label for="seleccionado"><input type="checkbox" name="seleccion[]" id="seleccionado" value="1">Deseo solicitar un auto en específico</label>
            </fieldset>

            <fieldset class="invisible" id="estado">
                <legend>Datos del vehículo</legend>

                <div class="campo">
                    <label for="marca">Marca</label>
                    <input type="text" placeholder="Ingresa la marca" id="marca">
                </div>
                
                <div class="campo">
                    <label for="modelo">Modelo</label>
                    <input type="text" placeholder="Ingresa el modelo" id="modelo">
                </div>
                
                <div class="campo">
                    <label for="ano">Año</label>
                    <input type="number" placeholder="Ingresa el año" id="ano">
                </div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton boton-azul opaco">
        </form>
    </section>
    
<?php invocarTemplate("footer"); ?>