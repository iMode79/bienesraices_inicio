<?php 
ini_set('display_errors', 1);

require '../includesphp/funciones.php';

//Inicio de Sesion
$auth = estaAutenticado();


    //Importar la base de datos
    require '../includesphp/config/database.php';
    $db = conectarDB();

    //Escribir el query
    $query = "SELECT * FROM propiedades";

    //Consultar la base de datos
    $resultadoConsulta = mysqli_query($db, $query);

    //Muestra mensaje Condicional
    $resultado = $_GET['resultado'] ?? null;//Solo agarramos del url el valor de resultado

    //Validación para eliminar imagen
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                //Eliminar Imagen del server
                $query = "SELECT imagen FROM propiedades WHERE id = {$id}";
                $resultado = mysqli_query($db, $query);
                $propiedad = mysqli_fetch_assoc($resultado);
                unlink('../imagenes/' . $propiedad['imagen']); 

                //Eliminar Registro de la base de datos
                $query = "DELETE FROM propiedades WHERE id = {$id}";
                $resultado = mysqli_query($db, $query);

                if($resultado) {
                    header('Location: /bienesraices_inicio/admin?resultado=3');
                }
            }
        }

    //Incluye template
    
    incluirTemplate('header');
?> 
    
    <main class="contenedor">
        <h1>Administrador de Bienes Raices</h1>

        <?php if (intval( $resultado === '1' )): ?>
            <p class="alerta exito">Anuncio Creado correctamente</p>
            <?php else: ?>
                <?php if (intval( $resultado === '2' )): ?>
            <p class="alerta exito">Anuncio Actualizado correctamente</p>
                    <?php else: ?>
                        <?php if (intval( $resultado === '3' )): ?>
                            <p class="alerta exito">Anuncio Borrado correctamente</p>
                        <?php endif; ?>
                    <?php endif; ?>
            <?php endif; ?>

        <a href="/bienesraices_inicio/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los Resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad ['id']; ?> </td>
                    <td> <?php echo $propiedad ['titulo']; ?> </td>
                    <td> <img src="../imagenes/<?php echo $propiedad ['imagen']; ?>" class="imagen-tabla"> </td>
                    <td>$ <?php echo $propiedad ['precio']; ?> </td>
                    <td>
                
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad ['id']; ?>">
                            <input type="submit" class="boton-rojo-block bt" value="eliminar">
                        </form>                        
                        <!-- <a href="/bienesraices_inicio/admin/propiedades/borrar.php? id=<?php echo $propiedad ['id']; ?>" class="boton-rojo-block">eliminar</a> -->                        
                        <a href="/bienesraices_inicio/admin/propiedades/actualizar.php? id=<?php echo $propiedad ['id']; ?>"   class="boton-amarillo-block">actualizar</a> 
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

    </main>

<?php 

    //Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer'); 
?> 