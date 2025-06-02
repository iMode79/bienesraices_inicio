<?php
ini_set('display_errors', 1);
    

    require '../../includesphp/app.php';

    use App\Propiedad;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager as Image;

    //Inicio de Sesion
    estaAutenticado();

    $db = conectarDB();

    //Consulta para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultados = mysqli_query($db, $consulta); //Guardamos en la variable $resultado con la funcion mysqli la variable $db que es la conexion a la BD's y la $consulta

    //arreglo con mensajes de errores
    $errores = Propiedad::getErrores();
    //debuguear($errores);

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado = date('Y-m-d');
    //$creado = date('m/d/Y h:i:s a', time());

    //Ejecuta código después de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST);

        //Generar nombre único
        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
        if($_FILES['imagen']['tmp_name']) {
            $manager = new Image(Driver::class);
            $imagen = $manager -> read ($_FILES['imagen']['tmp_name']) -> cover(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        //Revisar que el arreglo este vacio
        if (empty($errores)) {

            //Subida de archivos Si $errores esta vacio entonces sube archivo
            //Creación de carpetas con ruta relativa
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                // 0755 es un permiso común que da lectura/escritura/ejecución al propietario
                // y solo lectura/ejecución a grupo y otros.
                // El 'true' es para crear directorios recursivamente si la ruta no existe.
                mkdir($carpetaImagenes, 0755, true); 
            }

            /*/ --- INTENTA ESTO PARA DIAGNOSTICO ---
            $testFilePath = $carpetaImagenes . '/test_write.txt';
            if (file_put_contents($testFilePath, 'Prueba de escritura')) {
                echo "¡Éxito! Se pudo escribir en la carpeta de imágenes.<br>";
            } else {
                echo "¡Error! No se pudo escribir en la carpeta de imágenes. Revisa permisos.<br>";
                // También puedes intentar obtener el último error de PHP para más detalles
                error_log("Error al escribir archivo de prueba: " . error_get_last()['message']);
            }*/

            //Guarda la imagen en el servidor
            $imagen->save($carpetaImagenes . $nombreImagen);

            $resultado = $propiedad->guardar();
            if($resultado) {
                //echo "Insertardo Correctamente";
                header('Location: /bienesraices_inicio/admin?resultado=1');
            } 
        }
    }    
    
    incluirTemplate('header');
?> 
    
    <main class="contenedor">
        <h1>Crear</h1>
        <a href="/bienesraices_inicio/admin" class="boton boton-verde">Regresar</a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/bienesraices_inicio/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General de Nuestras Propiedades</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad"  value="<?php echo $precio ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3", min="1", max="9"  value="<?php echo $habitaciones ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3", min="1", max="9"  value="<?php echo $wc ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3", min="1", max="9"  value="<?php echo $estacionamiento ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedorId">
                    <option value=""> >---Seleccione Vendedor---< </option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultados)): ?>
                        <option <?php echo $vendedorId === $vendedor['idvendedores'] ? 'selected' : ''; ?> value="<?php echo $vendedor ['idvendedores'] ?>"> <?php echo $vendedor ['nombre'] . " " . $vendedor['apellidol']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?> 