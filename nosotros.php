<?php 
require 'includesphp/app.php';

incluirTemplate('header');
?> 
    
    <main class="contenedor">
        <h1>Conoce Sobre Nosotros</h1>

        <Section class="nosotros">
            <article class="entrada-nosotros">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog3.webp" type="image/webp">
                        <source srcset="build/img/blog3.jpg" type="image/jpg">
                        <img src="build/img/blog3.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entradaN">
                   
                        <h4>25 años de Experiencia</h4>
                        
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga ratione sit aliquam deserunt nostrum. Repudiandae sint, facilis, nostrum nesciunt aliquid accusantium laborum aspernatur eius ipsa adipisci officia, atque aliquam molestias?
                        Necessitatibus, iste fugit, at sed corporis accusamus nulla omnis nisi fugiat, aspernatur in praesentium ducimus! Voluptatem dolore veniam eos architecto, laudantium tenetur, ducimus nihil eveniet odio assumenda deleniti deserunt totam.
                        Autem non at porro dicta praesentium, fugiat repudiandae laudantium aspernatur hic voluptate voluptas officiis quis! Impedit debitis consectetur cum deleniti aut vel necessitatibus, atque amet dicta sequi. Neque, maxime sint.
                        Odit, voluptates soluta dolore laborum fugiat et ipsum at earum similique atque vel ratione, accusantium porro. Maiores adipisci voluptate nam, provident est quaerat in, nulla incidunt, modi quidem ipsa ab.</p>                       
                        <p>Beatae.
                        Ut ad laudantium distinctio similique, quo praesentium delectus soluta voluptates ducimus accusantium totam sit tempora expedita voluptatem est voluptatum nobis. Consequuntur, saepe qui odio fugit pariatur alias optio numquam suscipit.
                        Eum saepe minus est totam repellendus quasi tempora eius sapiente hic quia dolore, dolorum molestias, fuga, cupiditate dolor. Cupiditate alias quaerat voluptatem iure, sapiente possimus laborum deserunt ut fugiat quisquam?
                        </p>
                    </a>
                </div>
            </article>
        </Section>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae maiores tempore enim cumque reiciendis deserunt veniam porro beatae provident itaque cupiditate ipsum, ducimus eius aliquam dolorum perspiciatis suscipit totam unde.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae maiores tempore enim cumque reiciendis deserunt veniam porro beatae provident itaque cupiditate ipsum, ducimus eius aliquam dolorum perspiciatis suscipit totam unde.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae maiores tempore enim cumque reiciendis deserunt veniam porro beatae provident itaque cupiditate ipsum, ducimus eius aliquam dolorum perspiciatis suscipit totam unde.</p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer'); ?> 
