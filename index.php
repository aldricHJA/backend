<?php
    require_once realpath('./vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable('./');
    $dotenv->load();
    echo $_ENV['MI_VARIABLE_ENTORNO'];
    $host = $_ENV['DB_HOST'];
    $puerto =$_ENV['DB_PORT'];
    $db = $_ENV['DB_DATABASE'];
    $usuario = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    

    $conexion = new mysqli($host,$usuario,$password,$db,$puerto);

    if ($conexion->connect_error) {
        echo ("Error de conexión a la base de datos: " );
    }
    echo "Conexión exitosa a la base de datos";

?>
