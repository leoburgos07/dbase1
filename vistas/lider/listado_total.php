<?php require '../../controlador/lider/total_amigos_por_municipio.php'; ?>

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
        <h1 style="padding-bottom:0px">Listado por municipio </h1>
        <h2 class="errorTexto" style="font-size:2.2em"> <?= $_SESSION["usuarioNombreCompleto"] ?> </h2>
        <h2>Los marcados en color <span style="color:green;">VERDE</span> son tus líderes</h2>

        <div class="contenedorResultados">
          <?php foreach ($amigosPorMunicipios as $amigosPorMunicipio) { ?>
            <table class="tablaResultado">
              <tr class="borderNone">
                <th colspan="4" class="texto35 errorTexto" >
                  <?= $amigosPorMunicipio['pais'] ?>
                </th>
              </tr>
              <tr class="borderNone">
                <th colspan="4" class="texto30">
                  <?= $amigosPorMunicipio['dpto'] ?>
                </th>
              </tr>
              <tr class="borderNone" style="border-bottom:1px solid white !important">
                <th colspan="4" class="textoVerde">
                  <?= $amigosPorMunicipio['municipio'] ?>
                </th>
              </tr>
              <tr class="borderNone" style="border-bottom:1px solid white !important">
                <th colspan="4">
                  <?= $amigosPorMunicipio['barrio'] ?>
                </th>
              </tr>
            
              <tr class="ancho25" >
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>

                
              </tr>

              <?php foreach ($amigosPorMunicipio['amigos'] as $amigo) {
                $flag = false;
                if ($amigo["cedula"] != $cedula_lider) {
                  foreach ($lideres as $lider) {
                    if ($amigo["cedula"] == $lider["cedula"]) {
                      $flag = true;
              ?>
              
                      <tr class="columnaBorderInferior">
                        <td style="color:green; border-color:green"><?= $amigo['cedula'] ?></td>
                        <td style="color:green; border-color:green"><?= $amigo['nombre'] ?></td>
                        <td style="color:green; border-color:green"><?= $amigo['apellidos'] ?></td>
                  
                        
                      </tr>
                    <?php }
                  }
                  if ($flag == false) {

                    ?>

                    <tr class="columnaBorderInferior">
                      <td><?= $amigo['cedula'] ?></td>
                      <td><?= $amigo['nombre'] ?></td>
                      <td><?= $amigo['apellidos'] ?></td>
                     
                    </tr>

              <?php }
                }
              } ?>
            </table>
            <br />
            <br />

          <?php } ?>
        </div>
      </div>
      <!-- FIN LOGIN -->

    </div>


    <script src="../../recursos/js/lider.js"></script>

</body>

</html>