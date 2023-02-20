<?php

require_once 'RepoUser.php';
require_once 'User.php';

if($_POST['tipo'] === "cu"){

    if($_POST['sexo'] === "h"){
        $sexo = "H";
    } else{
        $sexo = "M";
    }
    
    $repo = new RepoUser();
    $user = new User ( 
        $_POST['nombre'],
        $_POST['edad'],
        $sexo,
        $_POST['rol']);

    $guardar= $repo->save($user);

    if($guardar){
        $mensaje = "Usuario guardado exitosamente";
    }else{
        $mensaje = "No se pudo guardar el usuario";
    }

    $redirigir = 'crud.php?mensaje=' . $mensaje;

    header('Location: ' . $redirigir);
}

if ($_POST['tipo'] === "vd") {

    $repo = new RepoUser();
    $visual = true;  
    $visual = $repo->visualizar($_POST['id']);
 
    if($visual==false){
        $mensaje = "No se pudo encontrar el ID";    
        $redirigir = 'crud.php?mensaje=' . $mensaje;
  
        header('Location: ' . $redirigir);
    }

}

if ($_POST['tipo'] === "md") {

    $repo = new RepoUser();
    $modif = true;  
    $modif = $repo->modificar($_POST['id'],$_POST['edad']);
 
    if($modif){
        $mensaje = "Edad modificada correctamente";    
        $redirigir = 'crud.php?mensaje=' . $mensaje;
  
        
    } else {
        $mensaje = "No se pudo modificar la edad";    
        $redirigir = 'crud.php?mensaje=' . $mensaje;
    }
    
    header('Location: ' . $redirigir);
}


    if ($_POST['tipo'] === "bu") {

        $repo = new RepoUser();
        $borrar = true;  
        $borrar = $repo->borrar($_POST['id']);
    
        if($borrar){
            $mensaje = "Usuario eliminado correctamente";    
            $redirigir = 'crud.php?mensaje=' . $mensaje;
    
            
        } else {
            $mensaje = "No se pudo eliminar el usuario";    
            $redirigir = 'crud.php?mensaje=' . $mensaje;
        }
        
        header('Location: ' . $redirigir);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Datos usuario</title>
</head>
<body class="mx-auto w-50 p-3 mb-2 bg-dark text-white" >    
</body>
</html>