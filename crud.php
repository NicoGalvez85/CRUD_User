<?
require_once 'operation.php';
require_once 'RepoUser.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Bienvenido al sistema</title>
    </head>
    <body >
      <div>
      <h1>Elija una opción</h1>
      </div>    
      <div >
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form  id="f" action="operation.php" method="post">

        <select name="tipo" onchange="cambioTipo(this.value)">
            <option >Seleccionar</option>
            <option value="cu">Crear Usuario</option>
            <option value="vd">Visualizar Datos</option>
            <option value="md">Modificar datos</option>
            <option value="bu">Borrar Usuario</option>
          </select><br><br>

          <div id="segunTipo"></div><br>
            
          <input name="submit" type="submit" value="Realizar" style="display:none">
          <input name="ver" type="submit" value="Visualizar" style="display:none">
        </form>
        
      </div>


      <script src="crud.js"></script>

    </body>
</html>