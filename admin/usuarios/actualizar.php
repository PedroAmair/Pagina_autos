<?php 
    require_once "../../includes/app.php";
    
    autenticado();

    $conn = conectarBD();

    $errores = [];

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("location: /admin/usuarios");
    }

    $query = "SELECT nombre, apellido, correo FROM usuarios WHERE idusuario = {$id};";
    $resultado = mysqli_query($conn, $query);
    $usuario = mysqli_fetch_assoc($resultado);

    $nombre = $usuario["nombre"];
    $apellido = $usuario["apellido"];
    $email = $usuario["correo"];
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
        $apellido = mysqli_real_escape_string($conn, $_POST["apellido"]);

        if(!$nombre) {
            $errores[] = "Debe ingresar su nombre";
        }
        if(!$apellido) {
            $errores[] = "Debe ingresar su apellido";
        }
    
        if(empty($errores)) {
            $query = "UPDATE usuarios SET nombre = '{$nombre}', apellido = '{$apellido}' WHERE idusuario = {$id}; ";
            $resultado = mysqli_query($conn, $query);

            if($resultado) {
                header("location: /admin/usuarios?respuesta=2"); 
             }else{
                 $errores[] ="falló la inserción";
             }      
        }
    }

    mysqli_close($conn);
?>

<?php
    invocarTemplate("header");
    invocarTemplate("sesion"); 
?>
<div class="botones-navegacion">
    <a class="boton boton-amarillo opaco" href="index.php">Volver</a>
</div>

<section class="usuarios-actualizar medio-contenedor">
    <h2>Modificar usuario</h2>
    <p class="subtitulo">Edite la información que desee y envíe el formulario</p>

    <?php invocarTemplate("alertas", false, $errores); ?>
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Datos personales</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Ingresa tu nombre" id="nombre" name="nombre" value="<?php echo esc($nombre); ?>">
            </div>
                    
            <div class="campo">
                <label for="apellido">Apellido</label>
                <input type="text" placeholder="Ingresa tu apellido" id="apellido" name="apellido" value="<?php echo esc($apellido); ?>">
            </div>
                    
            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Ingresa tu correo electrónico" id="email" name="email" value="<?php echo esc($email); ?>" disabled>
            </div>
                    
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" placeholder="Ingresa tu contraseña" id="password" name="password" disabled>
            </div>
        </fieldset>
        <input type="submit" value="Enviar" class="boton boton-azulOscuro opaco">
    </form> 
</section>

<?php invocarTemplate("footer"); ?>