<?php 
    
//Inluye el header
require 'includesphp/app.php';
    $db = conectarDB();

    //Autenticar el usuario
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );        
        $password = mysqli_real_escape_string($db,$_POST['password']);

        if (!$email) {
            $errores [] = "El Email es obligatorio o no es valido";
        }
        if (!$password) {
            $errores [] = "El Password es obligatorio";
        }

        if (empty($errores)) {
            //revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);
            //var_dump($resultado);
            
            if ($resultado -> num_rows) {
                //si el password es correcto 
                $usuario = mysqli_fetch_assoc($resultado);
                
                //Verificar si el password es correcto
                $auth = password_verify($password, $usuario['password']);
                
                if($auth) {
                    //usuario autenticado
                    session_start();
                    
                    //Llenar el arreglo sesión
                    $_SESSION['usuario'] = $usuario ['email'];
                    $_SESSION['login'] = true;

                    //redireccionar
                    header('Location: /bienesraices_inicio/admin/');

                } else {
                    $errores [] = "El password es incorrecto";
                }
                
            } else {
                $errores [] = "El Usuario No exixte";
            }
        }
    }
    //Inluye el header
    //require 'includesphp/funciones.php';
    incluirTemplate('header');
?> 
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach ?>



        <form method="POST" class="formulario">
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-Mail</label>
                <input type="email" name="email" placeholder="Tu E-Mail" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="telefono">

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        
        </form>
    </main>

<?php 
    incluirTemplate('footer'); 
?> 



