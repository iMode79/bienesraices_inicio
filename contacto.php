<?php 

require 'includesphp/app.php';


incluirTemplate('header');

?> 
    
    <main class="contenedor">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img src="build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy">
        </picture>
        <h2>Liene el Formulario de contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-Mail</label>
                <input type="email" placeholder="Tu E-Mail" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select class="sel" id="opciones"> 
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="precio">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="precio">
            </fieldset>

            <fieldset>
                <legend></legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">EMail</label>
                    <input type="radio" name="contacto" value="email" id="contactar-email">
                </div>

                <p>Si eligió telefono eleja la fecha y la hora para ser contatado</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?> 
