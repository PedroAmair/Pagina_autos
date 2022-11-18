<?php
require __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/config/");
$dotenv->safeLoad();
require "funciones.php";
require "config/basedatos.php";

?>