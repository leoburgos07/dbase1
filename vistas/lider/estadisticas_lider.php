<?php require '../../controlador/lider/estadistica_amigos.php'; ?>

<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ALVARO DAVID / Candidato a Cámara Partido Conservador 107</title>
  <meta name="viewport" content="width=device-width" />

  <link href="../../recursos/css/style.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../../recursos/css/login.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../../recursos/css/informes.css" rel="stylesheet" type="text/css" media="screen" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

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

</head>

<body>
  <div id="container">

    <!-- header -->
    <?php require '../../compartido/cabecera.php' ?>
    <!-- FIN header -->


    <!-- LOGIN -->
    <div class="mt-45" id="portada" align="center">

      <div class="login-box">
        <h1>Estadística de amigos</h1>
        <h2 class="texto40 errorTexto m-0"> <?= $nombre_lider ?></h2>
        <p class="texto40 mt-0"><?= $cedula_lider ?> <br> <?= $_SESSION["usuarioMunicipio"] ?></p>

        <div class="tableCanvas">
          <canvas id="tablaPais" width="400" height="400"></canvas>
        </div>
        <div class="tableCanvas">
          <canvas id="tablaDepartamento" width="400" height="600"></canvas>
        </div>
        <div class="tableCanvas" >
          <canvas id="tablaMunicipio" width="400" height="600 "></canvas>
        </div>
        <div class="contenedorResultados">

          <h1 class="tituloTabla textoVerde"> Total amigos</h1>
          <table class="tablaResultado">
            <tr class="ancho25">

              <th>Cantidad de amigos</th>
            </tr>

            <tr class="columnaBorderInferior">
              <td style="text-align: center;"><?= $totalAmigos ?></td>
            </tr>
          </table>
          <br />
          <br />


          <h1 class="tituloTabla textoVerde">Por País</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach ($estadisticaAmigosPorPais as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br />
          <br />

          <h1 class="tituloTabla textoVerde">Por Departamento</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Departamento</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach ($estadisticaAmigosPorDepartamento as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br />
          <br />

          <h1 class="tituloTabla textoVerde">Por Municipio</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Departamento</th>
              <th>Municipio</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach ($estadisticaAmigosPorMunicipio as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td><?= $estadisticaAmigo['municipio'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br />
          <br />

          <h1 class="tituloTabla textoVerde">Por Barrio</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>Departamento</th>
              <th>Municipio</th>
              <th>Barrio</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach ($estadisticaAmigosPorBarrio as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td><?= $estadisticaAmigo['municipio'] ?></td>
                <td><?= $estadisticaAmigo['barrio'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br />
          <br />
        </div>
      </div>
      <!-- FIN LOGIN -->

    </div>


    <script src="../../recursos/js/lider.js"></script>

    <script>
      const tablaPais = document.getElementById('tablaPais').getContext('2d');
      const tablaDepartamento = document.getElementById('tablaDepartamento').getContext('2d');
      const tablaMunicipio = document.getElementById('tablaMunicipio').getContext('2d');
      const paisTable = new Chart(tablaPais, {
        type: 'bar',
        data: {
          labels: [
            <?php foreach ($labelsPais as $label) { ?> '<?= $label ?>',
            <?php } ?>
          ],
          datasets: [{
            label: 'Amigos',
            data: [
              <?php foreach ($valuesPais as $value) { ?> '<?= $value ?>',
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
            foreach ($labelsDepartamento as $label) { ?> ' <?php echo strtoupper($label)  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: 'Amigos',
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
            foreach ($labelsMunicipios as $label) { ?> ' <?php echo strtoupper($label)  ?> ',
            <?php
            }
            ?>
          ],
          datasets: [{
            label: 'Amigos',
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
    </script>

</body>

</html>