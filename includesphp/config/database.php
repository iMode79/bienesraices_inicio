<?php
ini_set('display_errors', 1);//para visualizar errores en php en caso de que no este configurado desde el archivo config
function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'ricardosql', 'Abc010379rls1', 'bienesraices_crud');

    if (!$db) {
        echo "Se conecto";
    exit;
    }
    return$db;
}


