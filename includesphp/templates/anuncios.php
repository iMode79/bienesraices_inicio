<?php
//importar base de datos
//require 'includesphp/config/database.php';
$db = conectarDB();

//consultar 
$query = "SELECT * FROM propiedades LIMIT {$limite}";

//leer los resultados 
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <!-- Itinerar -->    
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncios">

            <img src="imagenes/<?php echo $propiedad['imagen'];  ?>" alt="Anuncio" loading="lazy">
                    
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo'];  ?></h3>
                <p><?php echo $propiedad['descripcion'];  ?></p>
                <p class="precio">$<?php echo $propiedad['precio'];  ?></p>
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
                <a class="boton boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id'];  ?>">
                    Ver Propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--.anuncio-->
    <?php endwhile; ?>
</div><!--.contedor-anuncios-->

<!-- Cierre de Base de Datos -->
<?php 
    mysqli_close($db);
?>            