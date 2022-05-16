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

</head>

<body>
  <div id="container">

    <!-- header -->
     <?php require '../../compartido/cabecera.php' ?> 
    <!-- FIN header -->


    <!-- LOGIN -->
    <div class="mt-45" id="portada" align="center">

      <div class="login-box">
        <h1>Total campaña</h1>

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
          <br/>
          <br/>


         <h1 class="tituloTabla textoVerde">Por País</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach($estadisticaAmigosPorPais as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br/>
          <br/>

          <h1 class="tituloTabla textoVerde" >Por Departamento</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Departamento</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach($estadisticaAmigosPorDepartamento as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br/>
          <br/>

          <h1 class="tituloTabla textoVerde">Por Municipio</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>País</th>
              <th>Departamento</th>
              <th>Municipio</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach($estadisticaAmigosPorMunicipio as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['pais'] ?></td>
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td><?= $estadisticaAmigo['municipio'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br/>
          <br/>

          <h1 class="tituloTabla textoVerde">Por Barrio</h1>
          <table class="tablaResultado">
            <tr class="ancho25">
              <th>Departamento</th>
              <th>Municipio</th>
              <th>Barrio</th>
              <th>Cantidad de amigos</th>
            </tr>
            <?php foreach($estadisticaAmigosPorBarrio as $estadisticaAmigo) { ?>
              <tr class="columnaBorderInferior">
                <td><?= $estadisticaAmigo['dpto'] ?></td>
                <td><?= $estadisticaAmigo['municipio'] ?></td>
                <td><?= $estadisticaAmigo['barrio'] ?></td>
                <td class="textoCentrado"><?= $estadisticaAmigo['amigosCantidad'] ?></td>
              </tr>
            <?php } ?>
          </table>

          <br/>
          <br/>
        </div>
      </div>
      <!-- FIN LOGIN -->

    </div>


  <script src="../../recursos/js/lider.js"></script>

</body>

</html>
