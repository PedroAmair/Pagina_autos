<?php 
    require_once "includes/app.php";

    session_start();

    $conn = conectarBD();

    $query = "SELECT * FROM vehiculos; ";
    $resultado = mysqli_query($conn, $query);

    invocarTemplate("header");
?>

<section class="autos">
    <h2>Nuestros vehículos</h2>

    <div class="galeria-autos contenedor-grande">
        <?php while($vehiculo = mysqli_fetch_assoc($resultado)): ?>
            <div class="auto">
                <div class="imagen">
                    <img loading="lazy" src="/img/imagenesSubidas/<?php echo $vehiculo["imagen"]; ?>" alt="vehículo"></a>
                </div>
                
                <div class="contenido-auto">
                    <ul>
                        <li>Marca: <span><?php echo $vehiculo["marca"]; ?></span></li>
                        <li>Modelo: <span><?php echo $vehiculo["modelo"]; ?></span></li>
                        <li>Año: <span><?php echo $vehiculo["ano"]; ?></span></li>
                        <li>Transmisión: <span><?php echo $vehiculo["transmision"]; ?></span></li>
                    </ul>

                    <h2><?php echo $vehiculo["precio"]; ?> $</h2>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php mysqli_close($conn); ?>
<?php invocarTemplate("footer"); ?>