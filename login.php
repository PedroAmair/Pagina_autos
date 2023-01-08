<?php 
    require_once "includes/app.php";
    
    $conn = conectarBD();

    if(isset($_SESSION["login"])) {
        header("location: admin/principalAdministracion.php");
    }

    $errores = [];

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = mysqli_real_escape_string($conn, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        if(!$email) {
            $errores[] = "Debe ingresar un correo electrónico";
        }
        if(!$password) {
            $errores[] = "Debe ingresar una contraseña";
        }

        if(empty($errores)) {

            $query = "SELECT * FROM usuarios WHERE correo = '{$email}'; ";
            $resultado = mysqli_query($conn, $query);

            if($resultado->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);
                
                $auth = password_verify($password, $usuario["contraseña"]);

                if($auth) {
                    $_SESSION["id"] = $usuario["idusuario"];
                    $_SESSION["usuario"] = $usuario["correo"];
                    $_SESSION["nombre"] = $usuario["nombre"];
                    $_SESSION["apellido"] = $usuario["apellido"];
                    $_SESSION["login"] = true;

                    header("location: admin/principalAdministracion.php");
                    
                }else{
                    $errores[] = "Datos incorrectos";
                }
            }else {
                $errores[] = "Correo inválido";
            }
            
        }
    }

    mysqli_close($conn);
?>

<?php invocarTemplate("header");?>

<section class="iniciar-sesion mini-contenedor">
    <h2>Inicio de sesión</h2>

    <?php invocarTemplate("alertas", false, $errores); ?>
    <form action=<?php echo esc($_SERVER["PHP_SELF"]); ?> class="formulario" method="POST">
        <fieldset>
            <legend>Datos del usuario</legend>
            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Ingresa tu correo electrónico" id="email" name="email">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" placeholder="Ingresa tu contraseña" name="password">
            </div>
        </fieldset>

        <input type="submit" value="Iniciar sesion" class="boton boton-azulOscuro opaco">
    </form>
</section>

<?php invocarTemplate("footer"); ?>