<?php 
    require_once "../../includes/app.php";
    
    autenticado();

    $conn = conectarBD();

    $errores = [];

    $respuesta = $_GET['respuesta'] ?? "";

    $query = "SELECT * FROM usuarios; ";
    $resultadoGeneral = mysqli_query($conn, $query);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
       
        if($id && $id !== intval($_SESSION["id"])) {
            $query = "DELETE FROM usuarios WHERE idusuario = {$id}";
            $resultado = mysqli_query($conn, $query);
    
            if($resultado) {
                header("location: /admin/usuarios?respuesta=3");
            }
        }
        $errores[] = "No se puede eliminar el usuario";
    }
?>

<?php
    invocarTemplate("header");
    invocarTemplate("sesion"); 
?>
<div class="botones-navegacion">
    <a class="boton boton-amarillo opaco" href="../principalAdministracion.php">Volver</a>
    <a class="boton boton-azul opaco" href="crear.php">Nuevo usuario</a>
</div>
<section class="usuarios-mostrar medio-contenedor">
    <h2>Usuarios existentes</h2>
    <div id="notificacionUsuario">
        <?php invocarTemplate("alertas", false, $errores); ?>
    </div>
    <div id="notificaciones">
        <?php notificacionesCRUD($respuesta, "usuario"); ?>
    </div>
    
    <?php if(!$resultadoGeneral->num_rows) { ?>
        <div class="sin-datos">
            <p>No hay nada que mostrar</p>
        </div>
    <?php }else{ ?>
        <table class="propiedades-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre completo</th>
                    <th>Correo electrónico</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($usuario = mysqli_fetch_assoc($resultadoGeneral)) : ?>
                    <tr>
                        <td><?php echo $usuario['idusuario']; ?></td>
                        <td><?php echo $usuario["nombre"]." ".$usuario["apellido"]; ?></td>
                        <td><?php echo $usuario['correo']; ?></td>
                        <td>
                            <a href="/admin/usuarios/actualizar.php?id=<?php echo $usuario['idusuario']; ?>" id="modificar" class="boton boton-azulOscuro btn-opciones opaco">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>

                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $usuario['idusuario']; ?>">
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