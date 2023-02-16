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
        $password = 'npEGa2014'; // cuidado, aca va el password db local de c/u
        $db = new PDO('mysql:host=localhost;dbname=ejerciciomsql', $usuario, $password);
      
        $query = $db->prepare("SELECT ID, NOMBRE, EDAD, SEXO, r.DESCRIPCION FROM usuarios u INNER JOIN ROLES r WHERE ID = $id AND r.ROLID = u.ROLID ");
        $query->execute();

        $data = $query->fetchAll();
            if(empty($data)){
                // echo '<h4>No se encuentra el ID</h4>' ;
                return false;
            }
            foreach ($data as $valores) :               

            echo 'DNI =' . $valores["ID"].'<br>';
            echo 'NOMBRE =' . $valores["NOMBRE"].'<br>';
            echo 'EDAD =' . $valores["EDAD"].'<br>';
            echo 'SEXO =' . $valores["SEXO"].'<br>';
            echo 'ROL =' . $valores["DESCRIPCION"]; 
            
            endforeach; 

            echo '<h4><a href="crud.php"> Volver</a></h4>';
            return true;        
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
        $q = "DELETE FROM usuarios WHERE ID = ? ";
        $query = self::$conexion->prepare($q);

        $query->bind_param("d", $id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


}

   