<?
require_once 'operation.php';
require_once 'RepoUser.php';
require_once 'grafica.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <title>Bienvenido al sistema</title>
    </head>
    <body class="mx-auto w-50 p-3 mb-2 bg-dark text-white" >
      <div class="m-5">
      <h1 >Elija una opción</h1>
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
            <option value="vd">Visualizar datos por id</option>
            <option value="md">Modificar edad por ID</option>
            <option value="bu">Borrar Usuario</option>
          </select><br><br>

          <div id="segunTipo" class="row">

          </div><br>
          <div class="form-check">
            <div id="radioM"></div>
          </div><br>
          <div class="form-check">
            <div id="radioH"></div>
          </div><br>

            <div class="m-5">
                <input name="submit" type="submit" value="Realizar" style="display:none">
                <input name="ver" type="submit" value="Visualizar" style="display:none">
            </div>
 
        </form>
        
        <p><a href="grafica.php">Visualizar grafico de sexos</a></p>

      </div>
      <div style="max-width: 100%; margin: 1em;" id="chart"></div>

      <script src="crud.js"></script>

    </body>
</html>