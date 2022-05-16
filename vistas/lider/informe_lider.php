<?php session_start(); ?>


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
        <h1>Informe Líder </h1>
        <p class="texto40 errorTexto m-0">
          <?= $_SESSION['usuarioNombreCompleto'] ?>
        </p>
        <p class="texto40 mt-0"><?= $_SESSION["usuarioCedula"] ?> <br>  <?= $_SESSION["usuarioMunicipio"] ?></p>

      
        <div class="contenedorInformesMenu">
          <ul>
            <!--
              Cuantos amigos tiene ese lider
              por municipio (INT)

              Cuantos amigos tiene ese lider
              por puesto de votacion (INT)
             -->
            <li>
              <a href="./estadisticas_lider.php">
                Estadísticas
              </a>
            </li>


            <!--
              Listad de amigos que tiene ese lider
              por municipio
              (Cedula, Nombre, Apellidos)

              Listad de amigos que tiene ese lider
              por puesto de votacion
             -->
            <li>
              <a href="./listado_amigos_lider.php">
                Listado de amigos y líderes
              </a>
            </li>
            <li>
              <a href="./multinivel_lideres.php">
                Estructura de líderes
              </a>
            </li>
            <li>
              <a href="#">
                Listado de Líderes
              </a>
            </li>
            <li>
              <a href="../../controlador/lider/exportar_listado_amigos.php">
                Exportar excel listado de amigos
              </a>
            </li>
          </ul>
        </div>

        <br><br>
        <p class="texto40 m-0">
          Consulta y Modificación
        </p>

        <div class="contenedorInformesMenu">
          <ul>
            <li>
              <a href="./consulta_por_cedula.php">
                Por cédula
              </a>
            </li>
            <li>
              <a href="./consulta_por_nombre.php">
                Por nombre
              </a>
            </li>
          </ul>
        </div>
        <br><br>
        <p class="texto40 m-0">
          Eliminar Amigo
        </p>

        <div class="contenedorInformesMenu">
          <ul>
            <li>
              <a href="./estadisticas_lider.php">
                Borrar registro
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- FIN LOGIN -->

    </div>
</body>

</html>
