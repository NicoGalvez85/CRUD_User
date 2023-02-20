<?php
require_once '.env.php';


class RepoUser
{
    private static $conexion = null;

    public function __construct()
    {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos'],
            );
            if (self::$conexion->connect_error) {
                $error = 'Error de conexión: ' . self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8');
        }
   }


//    Se modifico la tabla original "usuarios" para que sea auto incremental en 1

   public function save(User $usuario)
    {
        
       $q = "INSERT INTO usuarios (NOMBRE, EDAD, SEXO, ROLID) ";
       $q.= "VALUES (?, ?, ?, ?)";
       $query = self::$conexion->prepare($q);
       $nombre = $usuario->getNombre();
       $edad = $usuario->getEdad();
       $sexo = $usuario->getSexo();
       $rol = $usuario->getRol();
       $query->bind_param(
           "ssss",
           $nombre,
           $edad,
           $sexo,
           $rol
       );
       if ($query->execute()) {
        return self::$conexion->insert_id;
    } else {
        return false;
    }
     
    }

    public function visualizar($id){
        $usuario = 'root';
        $password = '?'; // cuidado, aca va el password db local de c/u
        $db = new PDO('mysql:host=localhost;dbname=ejerciciomsql', $usuario, $password);
      
        $query = $db->prepare("SELECT ID, NOMBRE, EDAD, SEXO, r.DESCRIPCION FROM usuarios u LEFT JOIN ROLES r ON u.ROLID = r.ROLID where u.ID = $id");
        $query->execute();

        $data = $query->fetchAll();

            if(empty($data)){
                return false;
            } else {
                foreach ($data as $valores) :
                    echo 'DNI =' . $valores["ID"].'<br>';
                    echo 'NOMBRE =' . $valores["NOMBRE"].'<br>';
                    echo 'EDAD =' . $valores["EDAD"].'<br>';
                    echo 'SEXO =' . $valores["SEXO"].'<br>';

                    if(empty($valores["DESCRIPCION"])){
                        echo 'ROL = Sin rol asignado'; 
                    } else {
                        echo 'ROL =' . $valores["DESCRIPCION"]; 
                    }                  
            
            endforeach; 

            echo '<br><p><a href="crud.php"> Volver</a></p>';
            return true; 
            }
       
    } 
    
    
    public function modificar($id,$edad)
        {
            $q = "UPDATE usuarios SET EDAD = ?  WHERE ID = ?";
            $query = self::$conexion->prepare($q);            
            $query->bind_param("sd", $edad, $id);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        
    public function borrar($id)
    {
        $q = 'DELETE FROM usuarios WHERE ID = ? ';
        $query = self::$conexion->prepare($q);

        $query->bind_param("d", $id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function grafico(){

        
        $usuario = 'root';
        $password = '?'; // cuidado, aca va el password db local de c/u
        $db = new PDO('mysql:host=localhost;dbname=ejerciciomsql', $usuario, $password);
        $query = $db->prepare('SELECT count(SEXO) as "CANTIDAD", SEXO FROM usuarios group by SEXO');
              $query->execute();

        $data = $query->fetchAll();
            if(empty($data)){
                // echo '<h4>No se encuentra el ID</h4>' ;
                return false;
            }

            return [$data[0]["CANTIDAD"],$data[1]["CANTIDAD"]];

    } 


}

   