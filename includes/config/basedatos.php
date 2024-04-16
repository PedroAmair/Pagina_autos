<?php

    function conectarBD() : mysqli {
        $bd = mysqli_connect(
            $_ENV["MYSQLHOST"],
            $_ENV["MYSQLUSER"],
            $_ENV["MYSQLPASSWORD"] ?? "",
            $_ENV["MYSQLDATABASE"],
            $_ENV['MYSQLPORT']

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