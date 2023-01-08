<?php 
    require_once "../../includes/app.php";
    invocarTemplate("header");

    autenticado();

    $conn = conectarBD();

    $errores = [];

    $nombre = "";
    $apellido = "";
    $email = "";
    $password = "";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
        $apellido = mysqli_real_escape_string($conn, $_POST["apellido"]);
        $email = mysqli_real_escape_string($conn, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        if(!$nombre) {
            $errores[] = "Debe ingresar su nombre";
        }
        if(!$apellido) {
            $errores[] = "Debe ingresar su apellido";
        }
        if(!$email) {
            $errores[] = "Debe ingresar un correo electrónico";
        }
        if(!$password) {
            $errores[] = "Debe ingresar una contraseña";
        }

        if(empty($errores)) {
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO usuarios(nombre, apellido, correo, contraseña)
                      VALUES ('{$nombre}', '{$apellido}', '{$email}', '{$password}'); ";
            $resultado = mysqli_query($conn, $query);

            if($resultado) {
                header("location: /admin/usuarios?respuesta=1"); 
             }else{
                 $errores[] ="Falló la inserción";
             }      
        }
    }
    mysqli_close($conn);
?>

<?php invocarTemplate("sesion"); ?>
<div class="botones-navegacion">
    <a class="boton boton-amarillo opaco" href="index.php">Volver</a>
</div>

<section class="usuarios-crear medio-contenedor">
    <h2>Agregar usuario</h2>
    <p class="subtitulo">Complete la información solicitada</p>

    <?php invocarTemplate("alertas", false, $errores); ?>
    <form action="<?php echo esc($_SERVER["PHP_SELF"]); ?>" class="formulario" method="POST">
        <fieldset>
            <legend>Datos personales</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Ingresa tu nombre" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? esc($_POST['nombre']) : ''; ?>">
            </div>
                    
            <div class="campo">
                <label for="apellido">Apellido</label>
                <input type="text" placeholder="Ingresa tu apellido" id="apellido" name="apellido" value="<?php echo isset($_POST['apellido']) ? esc($_POST['apellido']) : ''; ?>">
            </div>
                    
            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Ingresa tu correo electrónico" id="email" name="email" value="<?php echo isset($_POST['email']) ? esc($_POST['email']) : ''; ?>">
            </div>
                    
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" placeholder="Ingresa tu contraseña" id="password" name="password">
            </div>
        </fieldset>
        <input type="submit" value="Enviar" class="boton boton-azulOscuro opaco">
    </form> 
</section>

<?php invocarTemplate("footer"); ?>