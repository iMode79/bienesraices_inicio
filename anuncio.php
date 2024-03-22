<?php 

require 'includesphp/funciones.php';


incluirTemplate('header');

?> 
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        
        <picture>
            <source srcset="build/img/destacada.webp" type="imagen/webp">
            <source srcset="build/img/destacada.jpg" type="imagen/jpeg">
            <img src="build/img/destacada.jpg" alt="Imagen de la propiedas" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$ 4,000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="iconos" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="iconos" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="iconos" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio rem, eligendi, voluptatibus eos neque repudiandae, beatae similique culpa praesentium placeat quam nobis illum optio consectetur animi voluptatem corrupti nisi ducimus?
            Nesciunt ratione sed provident. Repudiandae nostrum expedita saepe? Quo nulla perspiciatis error sit quis eius modi labore molestiae temporibus odit cupiditate, praesentium laborum nobis ducimus itaque quod quam expedita? Neque?
            Quasi perferendis doloremque provident quos facilis, at placeat maxime voluptatibus tempore dignissimos perspiciatis optio consectetur dolores ad in, eum fugiat incidunt voluptates ipsa delectus eaque cum alias distinctio eos. Aspernatur.
            Qui nostrum velit itaque odio? Voluptas laborum beatae deserunt quo corporis itaque consectetur sed rerum doloribus repellat fugit, expedita adipisci quam soluta ipsa nisi saepe quas. Facere minima quae labore?
            Temporibus sapiente ut, praesentium quidem officia saepe cupiditate id explicabo recusandae mollitia non tempore tempora, aperiam repudiandae pariatur voluptatum amet unde eveniet vel expedita veniam error molestias? Deleniti, vitae officiis?
            Culpa eum cumque qui ea voluptatibus omnis ad est, delectus ab quos doloremque, facere illum voluptatem hic voluptates commodi maxime. Animi minima consequuntur vel! Est ipsa quam harum facilis pariatur!
            Iure, veritatis. Assumenda omnis sit optio perferendis rem. Ipsum quasi incidunt eligendi iure ad accusamus! Ipsum, ullam dolorem nihil laboriosam suscipit cupiditate, mollitia quos accusantium architecto numquam fuga animi pariatur.
            Debitis sit, provident at consequatur alias vero qui autem modi corrupti error ipsa odit, assumenda quo quos voluptas explicabo accusamus incidunt! Ea aspernatur saepe dolorem vero omnis maxime, magni optio?z</p>
        </div>
        
    </main>
    
<?php incluirTemplate('footer'); ?> 
