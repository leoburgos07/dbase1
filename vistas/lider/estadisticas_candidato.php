<?php require '../../controlador/lider/estadistica_total.php'; ?>

<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ALVARO DAVID / Candidato a Cámara Partido Conservador 107</title>
  <meta name="viewport" content="width=device-width" />

  <link href="../../recursos/css/style.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../../recursos/css/login.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../../recursos/css/informes.css" rel="stylesheet" type="text/css" media="screen" />

  <style type="text/css">
    #portada {
      height: 1241px;
      width: 751px;
      float: left;
      background-color: black;
    }

    #menuserv {
      height: 82px;
      width: 751px;
      float: left;
      margin-top: 900px;
      margin-left: 0px;
    }
  </style>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

</head>

<body>
  <div id="container">

    <!-- header <?php require '../../compartido/cabecera.php' ?>-->

    <!-- FIN header -->


    <!-- LOGIN -->
    <div class="mt-45" id="portada" align="center">

      <div class="login-box">
        <h1>Total campaña</h1>
        <br>
        <h1>Paises</h1>
        <div class="tableCanvas">
          <canvas id="tablaPais" width="400" height="400"></canvas>
        </div>
        <br><br><br><br>
        <h1>Departamentos</h1>
        <br>
        <div class="tableCanvas">
          <canvas id="tablaDepartamento" width="400" height="400"></canvas>
        </div>
        <br><br><br><br>
        <h1>Municipios</h1>
        <br>
        <div class="tableCanvas">
          <canvas id="tablaMunicipio" width="400" height="400"></canvas>
        </div>
        <br><br><br><br>
        <h1>Barrios</h1>
        <br>
        <div class="">
          <canvas id="tablaBarrios" width="400" height="400"></canvas>
        </div>

      </div>
      <!-- FIN LOGIN -->

    </div>


    <script src="../../recursos/js/lider.js"></script>
    <script>
      const tablaPais = document.getElementById('tablaPais').getContext('2d');
      const tablaDepartamento = document.getElementById('tablaDepartamento').getContext('2d');
      const tablaMunicipio = document.getElementById('tablaMunicipio').getContext('2d');
      const tablaBarrios = document.getElementById('tablaBarrios').getContext('2d');
      const paisTable = new Chart(tablaPais, {
        type: 'bar',
        data: {
          //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          labels: [
            <?php
            foreach ($labelsPais as $label) { ?> ' <?php echo $label  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: '# de amigos',
            //data: [12, 19, 3],
            data: [
              <?php foreach ($valuesPais as $value) { ?> ' <?php echo $value ?> ',
              <?php } ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              position: 'top',
            }
          },
          indexAxis: 'y',
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          },
        }
      });
      const departamentoTable = new Chart(tablaDepartamento, {
        type: 'bar',
        data: {
          labels: [
            <?php
            foreach ($labelsDepartamento as $label) { ?> ' <?php echo $label  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: '# de amigos',
            data: [
              <?php foreach ($valuesDepartamento as $value) { ?> ' <?php echo $value ?> ',
              <?php } ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
          }]
        },
        options: {
          plugins: {
            legend: {
              position: 'top',
            }
          },
          indexAxis: 'y',
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          },
        }
      });
      const municipiosTable = new Chart(tablaMunicipio, {
        type: 'bar',
        data: {
          labels: [
            <?php
            foreach ($labelsMunicipios as $label) { ?> ' <?php echo $label  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: '# de amigos',
            data: [
              <?php foreach ($valuesMunicipios as $value) { ?> ' <?php echo $value ?> ',
              <?php } ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
          }]
        },
        options: {
          plugins: {
            legend: {
              position: 'top',
            }
          },
          indexAxis: 'y',
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          },
        }
      });
      const barriosTable = new Chart(tablaBarrios, {
        type: 'bar',
        data: {
          labels: [
            <?php
            foreach ($labelsBarrios as $label) { ?> ' <?php echo $label  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: '# de amigos',
            data: [
              <?php foreach ($valuesBarrios as $value) { ?> ' <?php echo $value ?> ',
              <?php } ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              position: 'top',
            }
          },
          indexAxis: 'y',
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          },
        }
      });
    </script>

</body>

</html>