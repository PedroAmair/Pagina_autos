<?php 
    require_once "../../includes/app.php";
    
    autenticado();

    $conn = conectarBD();

    $errores = [];

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("location: /admin/vehiculos");
    }

    $query = "SELECT * FROM vehiculos WHERE idvehiculo = {$id};";
    $resultado = mysqli_query($conn, $query);
    $vehiculo = mysqli_fetch_assoc($resultado);

    $marca = $vehiculo["marca"];
    $modelo = $vehiculo["modelo"];
    $transmision = $vehiculo["transmision"];
    $precio = $vehiculo["precio"];
    $ano = $vehiculo["ano"];
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

        if($imagen['size'] > $peso){
            $errores[] = "El tamaño máximo de imagen es de  5 MB";
        }

        if(empty($errores)) {
            $imagenesSubidas = "../../img/imagenesSubidas/";
            if(!is_dir($imagenesSubidas)) {
                mkdir($imagenesSubidas);
            }

            $nombreImagen = "";

            if($imagen["name"]) {
                unlink($imagenesSubidas.$vehiculo["imagen"]);

                $nombreImagen = md5(uniqid(rand(), true)).".jpg";
                move_uploaded_file($imagen["tmp_name"], $imagenesSubidas.$nombreImagen);
            }else{
                $nombreImagen = $vehiculo["imagen"];
            }

            $query = "UPDATE vehiculos SET marca = '{$marca}', modelo = '{$modelo}', transmision = '{$transmision}',
                      precio = {$precio}, ano = '{$ano}', imagen = '{$nombreImagen}' WHERE idvehiculo = {$id}; ";
            $resultado = mysqli_query($conn, $query);

            if($resultado) {
                header("location: /admin/vehiculos?respuesta=2"); 
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

<section class="vehiculos-actualizar medio-contenedor">
    <h2>Modificar vehículo</h2>
    <p class="subtitulo">Edite la información que desee y envíe el formulario</p>

    <?php invocarTemplate("alertas", false, $errores); ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos del auto</legend>
            <div class="campo">
                <label for="marca">Marca</label>
                <input type="text" placeholder="Ingresa la marca" id="marca" name="marca" value="<?php echo $marca; ?>">
            </div>
                        
            <div class="campo">
                <label for="modelo">Modelo</label>
                <input type="text" placeholder="Ingresa el modelo" id="modelo" name="modelo" value="<?php echo $modelo; ?>">
            </div>

            <div class="campo">
                <label for="transmision">Caja</label>
                <input type="text" placeholder="Ingresa el tipo de transmisión" id="transmision" name="transmision" value="<?php echo $transmision; ?>">
            </div>
                        
            <div class="campo">
                <label for="ano">Año</label>
                <input type="number" placeholder="Ingresa el año" id="ano" name="ano" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo $ano; ?>">
            </div>
                        
            <div class="campo">
                <label for="precio">Precio</label>
                <input type="number" placeholder="Ingresa el valor" id="precio" name="precio" min="1" value="<?php echo $precio; ?>">
            </div>

            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
            </div>
            <img src="/img/imagenesSubidas/<?php echo $vehiculo["imagen"]; ?>" alt="auto para editar" class="auto-editar">
        </fieldset>
        <input type="submit" value="Enviar" class="boton boton-azulOscuro opaco">
    </form>
</section>

<?php invocarTemplate("footer"); ?>