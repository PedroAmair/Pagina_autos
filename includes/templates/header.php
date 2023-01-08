<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nigaro Motors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header class="header">
            <div class="presentacion <?php echo $soloMenu ? '' : 'soloMenu'; ?>">
                <div class="overlay-presentacion">
                    <div class="contenido-presentacion">
                        <h2>Nigaro Motors</h2>
                        <p>Tu mejor opción para comprar vehículos nuevos y usados</p>
                    </div>
                </div>
                
                <?php 
                    $activarVideo = $_SERVER["PHP_SELF"];
                    if($activarVideo == "/index.php") {
                ?>        
                <video autoplay muted loop>
                    <source src="video/carro.mp4" type="video/mp4">
                    <source src="video/carro.ogv" type="video/ogg">
                    <source src="video/carro.webm" type="video/webm">
                </video>
                <?php } ?>
            </div>

        <div class="barra-navegacion">
            <div class="logo">
                <a href="/index.php">
                    <h1>Nigaro Motors</h1>
                </a>
            </div>

            <div class="menu-movil">
                <img src="/img/barras.svg" alt="menu para dispositivos pequeños">
            </div>

            <nav class="navegacion">
                <a class="<?php echo isset($_SESSION["login"]) ? 'invisible' : ''; ?>" href="/login.php">Iniciar sesión</a>
                <a class="<?php echo isset($_SESSION["login"]) ? '' : 'invisible'; ?>" href="/admin/principalAdministracion.php">Administración</a>
                <a href="/nosotros.php">Nosotros</a>
                <a href="/galeria.php">Galería</a>
                <a href="/contacto.php">Contacto</a>
                <a class="<?php echo isset($_SESSION["login"]) ? '' : 'invisible'; ?>" href="/cerrar-sesion.php">Cerrar sesión</a>
            </nav>
        </div>
    </header>