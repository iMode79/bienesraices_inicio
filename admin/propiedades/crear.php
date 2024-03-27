<?php
    require '../../includesphp/config/database.php';
    $db = conectarDB();

    //Consulta para obtener vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultados = mysqli_query($db, $consulta); //Guardamos en la variable $resultado con la funcion mysqli la variable $db que es la conexion a la BD's y la $consulta

    //arreglo con mensajes de errores
    $errores = [];

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
        /*echo"<pre>";
        var_dump($_POST);
        echo"</pre>";*/

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];        

        if (!$titulo) {
            $errores [] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores [] = "Debes añadir un precio";
        }
        if (strlen($descripcion)<50) {
            $errores [] = "Debes añadir un descripcion de al menos 50 caracteres";
        }
        if (!$habitaciones) {
            $errores [] = "Debes añadir un habitaciones";
        }
        if (!$wc) {
            $errores [] = "Debes añadir un wc";
        }
        if (!$estacionamiento) {
            $errores [] = "Debes añadir un estacionamiento";
        }
        if (!$vendedorId) {
            $errores [] = "Debes añadir un vendedor";
        }
        /*echo"<pre>";
        var_dump($errores);
        echo"</pre>";*/
        //exit;
        //Revisar que el arreglo este vacio
        if (empty($errores)) {

            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
            //echo $query;
            //echo $creado;

            $resultado = mysqli_query($db, $query);
            if($resultado) {
                //echo "Insertardo Correctamente";
                header('Location: /bienesraices_inicio/admin');
            } 
        }
    }    
    require '../../includesphp/funciones.php';
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

        <form class="formulario" method="POST" action="/bienesraices_inicio/admin/propiedades/crear.php">
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

                <select name="vendedor">
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