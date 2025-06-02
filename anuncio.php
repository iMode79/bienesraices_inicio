<?php 
//Display de errores
ini_set('display_errors', 1);
//Toma del id metodo _GET y filtro de seguridad
$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /bienesraices_inicio/index.php');
    }

    //Llamado al archivo funciones para direciones de librerias --opcional--
require 'includesphp/app.php';

//Conexion a la base de datos
//require 'includesphp/config/database.php';
$db = conectarDB();

//query a la base de datos
$query = "SELECT * FROM propiedades WHERE id = $id";

//leer los resultados 
$resultado = mysqli_query($db, $query);



//Llamado a la cabecera del proyecto general
incluirTemplate('header');

?> 

<main class="contenedor seccion contenido-centrado">
    <!-- Itinerar posiciones de la consulta -->
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <h1><?php echo $propiedad['titulo'];  ?></h1>
    <img src="imagenes/<?php echo $propiedad['imagen'];  ?>" alt="Anuncio" loading="lazy">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio'];  ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="iconos" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc'];  ?></p>
                </li>
                <li>
                    <img class="iconos" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento'];  ?></p>
                </li>
                <li>
                    <img class="iconos" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $propiedad['habitaciones'];  ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion'];  ?></p>
        </div>
    <!-- Cierre del while itinerante -->
    <?php endwhile; ?>
    </main>
    
<?php 
incluirTemplate('footer'); 
//Cierre de base de datos 
mysqli_close($db);
?> 
