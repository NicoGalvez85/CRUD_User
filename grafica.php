<?php
require_once 'RepoUser.php';


$repo = new RepoUser();
$valores = $repo->grafico();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Document</title>
</head>

<body class="mx-auto w-50 p-3 mb-2 bg-dark text-white" >
    <div>
        <h1>Grafico de usuarios por sexo</h1>
        <div id="myapexchart"></div>
    </div>

    <p><a href="crud.php">Volver</a></p>

    <script>    

        var s = <?php echo json_encode($valores);?>;

        console.log(s);
        var options = {        

    series: [s[0],s[1]],
    chart: {
    width: 380,
    type: 'pie'
  },
  labels: ['Hombres', 'Mujeres'],          
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {

        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#myapexchart"), options);
  chart.render();
    </script>
</body>

</html>