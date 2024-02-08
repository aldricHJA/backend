<?php
    /* require_once realpath('./vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable('./');
    $dotenv->load();
   // echo $_ENV['MI_VARIABLE_ENTORNO'];
    $host = $_ENV['DB_HOST'];
    $puerto =$_ENV['DB_PORT'];
    $db = $_ENV['DB_DATABASE'];
    $usuario = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    

    $conexion = new mysqli($host,$usuario,$password,$db,$puerto);

    if ($conexion->connect_error) {
         echo ("Error de conexión a la base de datos: " );
     }
     echo ("Conexión exitosa a la base de datos"); */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<h1>CRUD </h1>
    <!-- Formulario para agregar un nuevo registro -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="campo1" placeholder="Campo 1">
        <input type="text" name="campo2" placeholder="Campo 2">
        <button type="submit">Agregar</button>
    </form>

    <!-- Formulario para editar un registro -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="edit_id" value="ID_DEL_REGISTRO_A_EDITAR">
        <input type="text" name="edit_campo1" placeholder="Nuevo valor para Campo 1">
        <input type="text" name="edit_campo2" placeholder="Nuevo valor para Campo 2">
        <button type="submit">Editar</button>
    </form>

    <!-- Formulario para eliminar un registro -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="delete_id" value="ID_DEL_REGISTRO_A_ELIMINAR">
        <button type="submit">Eliminar</button>
    </form>
    
</body>
</html>