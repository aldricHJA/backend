<?php
    require_once realpath('../../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable('../../');
    $dotenv->load();
    define('SERVER', $_ENV['DB_HOST']);
    define('PORT', $_ENV['DB_PORT']);
    define('DB', $_ENV['DB_DATABASE']);
    define('USER', $_ENV['DB_USERNAME']);
    define('PASS', $_ENV['DB_PASSWORD']);
    class Conexion{
        private static $conexion;

        public static function abrir_conexion(){
            if(!isset(self::$conexion)){
                try{
                    self::$conexion  = new PDO('mysql:host ='.SERVER.'; dbname=' .DB,USER, PASS);
                    self::$conexion ->exec('SET CHARACTER SET utf8');
                    return self::$conexion;
                }catch(PDOException $e){
                    echo "Error en la conexion: " . $e;
                    die();
                    
                }
            }else{
                return self::$conexion;
            }
        }

        public static function obtener_conexion(){
            $conexion = self::abrir_conexion();
                return $conexion;
            
        }
            
        public static function cerrar_conexion(){
            self::$conexion = null;

        }
        
        public static function consulta(){
            $consulta = self::obtener_conexion()->prepare("SELECT * FROM t_prueba");
            if($consulta->execute()){
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
                echo "consulta completada";
            }else{
                echo "error al consultar";
            }
        }

        public static function agregar($nombre, $apellido){
            try {
                $stmt = self::obtener_conexion()->prepare("INSERT INTO t_prueba (nombre, apellido) VALUES (?, ?)");
                $stmt->execute([$nombre, $apellido]);
                echo "Registro agregado correctamente";
            } catch (PDOException $e) {
                echo "Error al agregar registro: " . $e->getMessage();
            }
        }

        public static function actualizar($nombre, $apellido, $id){
            try {
                $stmt = self::obtener_conexion()->prepare("UPDATE t_prueba SET nombre = ?, apellido = ? WHERE id = ?");
                $stmt->execute([$nombre, $apellido, $id]);
                echo"Se actualizo correctamente";
            } catch (PDOException $e){
                echo "Error al actualizar:" . $e ->getMessage();
            }
        }

        public static function eliminar($id)
        {
            try {
                $stmt = self::obtener_conexion()->prepare("DELETE FROM t_prueba WHERE id = ?");
                $stmt->execute([$id]);
                echo "Registro eliminado correctamente";
            } catch (PDOException $e) {
                echo "Error al eliminar registro: " . $e->getMessage();
            }
        }
       
    }
    Conexion::consulta();

    //Conexion::agregar('adan', 'cruz');

    Conexion::actualizar('salvador', 'mendiola', 1);

    //Conexion::eliminar(13);
?>