<?php

function conectarBD() : mysqli {
    $bd = mysqli_connect(
        $_ENV["DB_HOST"],
        $_ENV["DB_USER"],
        $_ENV["DB_PASS"] ?? "",
        $_ENV["DB_BD"]
    );
    $bd->set_charset("utf8");

    if(!$bd) {
        echo nl2br("Error: No se pudo conectar a MySQL\n");
        echo nl2br("Código de depuración: " . mysqli_connect_errno() . "\n");
        echo nl2br("Error de depuración: " . mysqli_connect_error() . "\n");
        exit;
    }
    return($bd);
}

?>