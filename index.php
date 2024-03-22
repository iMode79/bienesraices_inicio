<?php 

require 'includesphp/funciones.php';

incluirTemplate('header', $inicio = true);
?> 


    
    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
            <div class="contenedor-anuncios">
                <div class="anuncios">
                    <picture>
                        <source srcset="build/img/anuncio1.webp" type="imagen/webp">
                        <source srcset="build/img/anuncio1.jpg" type="imagen/jpeg">
                        <img src="build/img/anuncio1.jpg" alt="Anuncio" loading="lazy">
                    </picture>
                    <div class="contenido-anuncio">
                        <h3>Casa de Lujo en el Lago</h3>
                        <p>Casa en el lago con excelente vista con acabados de lujo a un excelente precio</p>
                        <p class="precio">$3,000,000</p>
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
                        <a class="boton boton-amarillo-block" href="anuncio.html">
                            Ver Propiedad
                        </a>
                    </div><!--.contenido-anuncio-->
                </div><!--.anuncio-->

                <div class="anuncios">
                    <picture>
                        <source srcset="build/img/anuncio2.webp" type="imagen/webp">
                        <source srcset="build/img/anuncio2.jpg" type="imagen/jpeg">
                        <img src="build/img/anuncio2.jpg" alt="Anuncio" loading="lazy">
                    </picture>
                    <div class="contenido-anuncio">
                        <h3>Casa Terminados de Lujo</h3>
                        <p>Casa en el lago con excelente vista con acabados de lujo a un excelente precio</p>
                        <p class="precio">$3,000,000</p>
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
                        <a class="boton boton-amarillo-block" href="anuncio.html">
                            Ver Propiedad
                        </a>
                    </div><!--.contenido-anuncio-->
                </div><!--.anuncio-->

                <div class="anuncios">
                    <picture>
                        <source srcset="build/img/anuncio3.webp" type="imagen/webp">
                        <source srcset="build/img/anuncio3.jpg" type="imagen/jpeg">
                        <img src="build/img/anuncio3.jpg" alt="Anuncio" loading="lazy">
                    </picture>
                    <div class="contenido-anuncio">
                        <h3>Casa con Alberca</h3>
                        <p>Casa en el lago con excelente vista con acabados de lujo a un excelente precio</p>
                        <p class="precio">$3,000,000</p>
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
                        <a class="boton boton-amarillo-block" href="anuncios.html">
                            Ver Propiedad
                        </a>
                    </div><!--.contenido-anuncio-->
                </div><!--.anuncio-->
            </div><!--.contedor-anuncios-->
            <div class="alinear-derecha">
            <a class="boton boton-verde" href="anuncios.html">
                Ver Todas
            </a>
            </div>
    </section>

    <section class="imagen-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario y un asesor se pondrá en contacto contigo a la brevedad</p>        
            <a class="boton boton-amarillo-inLine" href="anuncios.html">Contactános</a>            
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Exrito el: <span>20102024</span> Por <span>Admin</span></p>
                        <p>Consejos para construir una terrazada en el techode tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img src="build/img/blog2.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Exrito el: <span>20102024</span> Por <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprender a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <secttion class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas las expectativas                    
                </blockquote>
                <p>- Ricardo Labrada -</p>
            </div>            
        </secttion>
    </div>

<?php incluirTemplate('footer'); ?> 