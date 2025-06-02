<?php 

require 'includesphp/app.php';


incluirTemplate('header');

?> 
    
    <main class="contenedor">    

        <section class="seccion contenedor">
            <h2>Casas y Depas en Venta</h2>
                
            <?php 
                $limite = 20;
                include 'includesphp/templates/anuncios.php'; 
            ?>

    </main>

<?php incluirTemplate('footer'); ?>  
