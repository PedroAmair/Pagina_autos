<?php 
    require_once "../../includes/app.php";

    autenticado();

    $conn = conectarBD();

    $errores = [];

    $marca = "";
    $modelo = "";
    $transmision = "";
    $ano = "";
    $precio = 0;
    $peso = 1000*5000;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $marca = mysqli_real_escape_string($conn, $_POST["marca"]);
        $modelo = mysqli_real_escape_string($conn, $_POST["modelo"]);
        $transmision = mysqli_real_escape_string($conn, $_POST["transmision"]);
        $ano = mysqli_real_escape_string($conn, $_POST["ano"]);
        $precio = mysqli_real_escape_string($conn, $_POST["precio"]);

        $imagen = $_FILES["imagen"];

        if(!$marca) {
            $errores[] = "Debe ingresar la marca";
        }
        if(!$modelo) {
            $errores[] = "Debe ingresar el modelo";
        }
        if(!$transmision) {
            $errores[] = "Debe ingresar el tipo de transmisión";
        }
        if(!$ano) {
            $errores[] = "Debe ingresar el año";
        }
        if(!$precio) {
            $errores[] = "Debe ingresar el valor";
        }

        if(!$imagen['name'] || $imagen['error']) {
            $errores[] = "Debes agregar la imagen";
        }

        if($imagen['size'] > $peso){
            $errores[] = "El tamaño máximo de imagen es de  5 MB";
        }

        if(empty($errores)) {
            $imagenesSubidas = "../../img/imagenesSubidas/";
            if(!is_dir($imagenesSubidas)) {
                mkdir($imagenesSubidas);
            }

            $nombreImagen = md5(uniqid(rand(), true)).".jpg";

            move_uploaded_file($imagen["tmp_name"], $imagenesSubidas.$nombreImagen);

            $query = "INSERT INTO vehiculos(marca, modelo, transmision, precio, imagen, ano)
                      VALUES ('{$marca}', '{$modelo}', '{$transmision}', $precio, '{$nombreImagen}', '{$ano}'); ";
            $resultado = mysqli_query($conn, $query);

            if($resultado) {
                header("location: /admin/vehiculos?respuesta=1");
            }else{
                $errores[] = "Falló la inserción";
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

<section class="vehiculos-crear contenedor-grande">
    <h2>Agregar vehículo</h2>
    <p class="subtitulo">Complete la información solicitada</p>

    <?php invocarTemplate("alertas", false, $errores); ?>
    <form action="<?php echo esc($_SERVER["PHP_SELF"]); ?>" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos del auto</legend>
            <div class="campo">
                <label for="marca">Marca</label>
                <input type="text" placeholder="Ingresa la marca" id="marca" name="marca" value="<?php echo isset($_POST['marca']) ? esc($_POST['marca']) : ''; ?>">
            </div>
                        
            <div class="campo">
                <label for="modelo">Modelo</label>
                <input type="text" placeholder="Ingresa el modelo" id="modelo" name="modelo" value="<?php echo isset($_POST['modelo']) ? esc($_POST['modelo']) : ''; ?>">
            </div>

            <div class="campo">
                <label for="transmision">Caja</label>
                <input type="text" placeholder="Ingresa el tipo de transmisión" id="transmision" name="transmision" value="<?php echo isset($_POST['transmision']) ? esc($_POST['transmision']) : ''; ?>">
            </div>
                        
            <div class="campo">
                <label for="ano">Año</label>
                <input type="number" placeholder="Ingresa el año" id="ano" name="ano" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo isset($_POST['ano']) ? esc($_POST['ano']) : ''; ?>">
            </div>
                        
            <div class="campo">
                <label for="precio">Precio</label>
                <input type="number" placeholder="Ingresa el valor" id="precio" name="precio" min="1" value="<?php echo isset($_POST['precio']) ? esc($_POST['precio']) : ''; ?>">
            </div>

            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
            </div>
        </fieldset>
        <input type="submit" value="Enviar" class="boton boton-azulOscuro opaco">
    </form>
</section>

<?php invocarTemplate("footer"); ?>