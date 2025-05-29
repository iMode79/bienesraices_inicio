<?php
ini_set('display_errors', 1);
    

    require '../../includesphp/app.php';

    use App\Propiedad;
    
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

        $errores = $propiedad->validar();

        //Revisar que el arreglo este vacio
        if (empty($errores)) {

            $propiedad->guardar();

            //debuguear($propiedad);
    
            //Se elimina código sanitizante, ya que se esta sanitizando en Propiedades.php dentro de la clase guardar 
            /*$titulo = mysqli_real_escape_string($db, filter_var($_POST['titulo'],FILTER_SANITIZE_STRING));
            $precio = mysqli_real_escape_string($db,  filter_var($_POST['precio'],FILTER_SANITIZE_NUMBER_FLOAT));  //$_POST['precio']);
            $descripcion = mysqli_real_escape_string($db, filter_var($_POST['descripcion'],FILTER_SANITIZE_STRING));  //$_POST['descripcion']);
            $habitaciones = mysqli_real_escape_string($db, filter_var($_POST['habitaciones'],FILTER_SANITIZE_NUMBER_FLOAT));  //$_POST['habitaciones']);
            $wc = mysqli_real_escape_string($db, filter_var($_POST['wc'],FILTER_SANITIZE_NUMBER_FLOAT));  //$_POST['wc']);
            $estacionamiento = mysqli_real_escape_string($db, filter_var($_POST['estacionamiento'],FILTER_SANITIZE_NUMBER_FLOAT));  //$_POST['estacionamiento']);
            $vendedorId = mysqli_real_escape_string($db, filter_var($_POST['vendedor'],FILTER_SANITIZE_NUMBER_FLOAT));  //$_POST['vendedor']);  
            $creado = date('Y/m/d');*/
    
            /*echo"<pre>";
            var_dump($errores);
            echo"</pre>";*/
            //exit;
            //Validar carga de imagenes
            $imagen = $_FILES['imagen'];

            //Subida de archivos Si $errores esta vacio entonces sube archivo
            //Creación de carpetas con ruta relativa
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);            

           //Aquí estaba el INSERT
            //echo $query;
            //echo $creado;
            $resultado = mysqli_query($db, $query);
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