<?php

//importar la conexion 
require 'includesphp/config/database.php';
$db = conectarDB();

//Crear Mail y Password
$email = "chicles@correo.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//var_dump($passwordHash);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ( '{$email}', '{$passwordHash}');";
echo $query;
//exit;

//Agregarlo a la base de datos 
mysqli_query($db, $query);
?>