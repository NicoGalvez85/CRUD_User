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

    $operacion = $repo->save($user);

    if($operacion){
        $mensaje = "Usuario guardado exitosamente";
    }else{
        $mensaje = "No se pudo guardar el usuario";
    }

    $redirigir = 'crud.php?mensaje=' . $mensaje;

    header('Location: ' . $redirigir);
}

if ($_POST['tipo'] === "vd") {

    $repo = new RepoUser();

    $operacion = $repo->visualizar($_POST['id']);

    if($operacion==false){
        $mensaje = "No se encuentra el ID";
        $redirigir = 'crud.php?mensaje=' . $mensaje;

        header('Location: ' . $redirigir);
    }

}
?>