<?php 
    require_once "../../includes/app.php";
    invocarTemplate("header");

    autenticado();

    $conn = conectarBD();

    $errores = [];

    $respuesta = $_GET['respuesta'] ?? "";

    $query = "SELECT * FROM vehiculos; ";
    $resultadoGeneral = mysqli_query($conn, $query);

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);
       
        if($id) {
            $query = "SELECT imagen FROM vehiculos WHERE idvehiculo = ${id}; ";
            $resultado = mysqli_query($conn, $query);
            $vehiculo = mysqli_fetch_assoc($resultado);
            unlink("../../img/imagenesSubidas/".$vehiculo["imagen"]);

            $query = "DELETE FROM vehiculos WHERE idvehiculo = ${id}";
            $resultado = mysqli_query($conn, $query);
    
            if($resultado) {
                header("location: /admin/vehiculos?respuesta=3");
            }
        }
    }
?>

<?php invocarTemplate("sesion"); ?>
<div class="botones-navegacion">
    <a class="boton boton-amarillo opaco" href="../principalAdministracion.php">Volver</a>
    <a class="boton boton-azul opaco" href="crear.php">Nuevo vehículo</a>
</div>
<section class="vehiculos-mostrar contenedor">
    <h2>Vehículos listados</h2>
    <div id="notificaciones">
        <?php notificacionesCRUD($respuesta, "vehículo"); ?>
    </div>
    
    <?php if(!$resultadoGeneral->num_rows) { ?>
        <div class="sin-datos">
            <p>No hay nada que mostrar</p>
        </div>
    <?php }else{ ?>
        <table class="propiedades-tabla contenedor">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Caja</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($vehiculo = mysqli_fetch_assoc($resultadoGeneral)) : ?>
                    <tr>
                        <td><?php echo $vehiculo['idvehiculo']; ?></td>
                        <td><?php echo $vehiculo["marca"]; ?></td>
                        <td><?php echo $vehiculo['modelo']; ?></td>
                        <td><?php echo $vehiculo['transmision']; ?></td>
                        <td><?php echo $vehiculo['ano']; ?></td>
                        <td><?php echo $vehiculo['precio']; ?> $</td>
                        <td><img class="auto-miniatura" src="/img/imagenesSubidas/<?php echo $vehiculo['imagen']; ?>" alt="imagen auto"></td>
                        <td>
                            <a href="/admin/vehiculos/actualizar.php?id=<?php echo $vehiculo['idvehiculo']; ?>" id="modificar" class="boton boton-azulOscuro btn-opciones opaco">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>

                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $vehiculo['idvehiculo']; ?>">
                                    <button id="notifBoton" type="submit" class="boton boton-rojo btn-opciones opaco">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button> 
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php } ?>
    <?php mysqli_close($conn); ?>
</section>

<?php invocarTemplate("footer"); ?>