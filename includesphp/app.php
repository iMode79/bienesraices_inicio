<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//conectar a la BD's
$db = conectarDB();

use App\Propiedad; //Básicamente es el nombre del archivo

Propiedad::setDB($db);

?>

