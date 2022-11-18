<?php

define("TEMPLATES_URL", __DIR__."/templates");
define("FUNCIONES_URL", __DIR__."funciones.php");
define("IMAGENES_SERVIDOR", __DIR__."/../imagenes_servidor/");

function debuguear($var) {
    echo "<PRE>";
    var_dump($var);
    echo "<PRE>";

    exit;
}

function invocarTemplate(string $nombreT, bool $soloMenu = false, array $alertas = [], bool $exito = false) {
    include TEMPLATES_URL."/${nombreT}.php";
}

/*Escapar el HTML*/
function esc($html) : string {
    $esc = htmlspecialchars($html);
    return $esc;
}

function autenticado() : void {
    if(!$_SESSION["login"]) {
        header("location: /autos/");
    }
}

function notificacionesCRUD(string $respuesta, string $tipo) : void {
    if( intval($respuesta) === 1) { 
       echo '<p class="alerta exito">'.$tipo. " agregado correctamente</p>";
    }elseif( intval($respuesta) === 2) { 
        echo '<p class="alerta exito">'. $tipo. " actualizado correctamente</p>";
    }elseif( intval($respuesta) === 3) {
        echo '<p class="alerta exito">'. $tipo. " eliminado correctamente</p>";
    }
}