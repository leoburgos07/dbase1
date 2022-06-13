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
        <h1 class="texto40 m-0">
          Consulta y Modificación por Cédula
        </h1>
        <form class="formularioConsultarPorCedula">
          <input type="hidden" class="cedulaLider" name="cedula_lider" value="<?= $_SESSION['usuarioCedula'] ?>">
          <p class="letraNormal">Digite la cédula: </p>
          <input type="hidden" name="perfil" id="perfil" value="<?= $_SESSION["usuarioPerfil"] ?>">
          <input type="number" name="cedula" id="cedula" class="entradaFormulario" placeholder="Cédula sin puntos ni comas">

          <input class="botonSiguiente" type="button" value="Buscar" id="buscarPorCedula">
        </form>
        <br><br>
        <h2 class="errorTexto ocultar" id="ningunLiderEncontrado">Ningun amigo encontrado</h2>

        <br><br>
        <div class="resultadoContenedor ocultar">
          <table class="tablaResultado tablaTextoIzquierda">

          </table>

          <br>

          <input type="hidden" id="sitioEditar" value="<?= ($_SERVER['REQUEST_SCHEME'] .
                                                          '://' .
                                                          $_SERVER['SERVER_NAME'] .
                                                          '/vistas/amigo/editar_amigo.php' .
                                                          '?cedula='
                                                        ) ?>">
          <input type="hidden" id="cedulaEncontrada">
          <a href="<?= $sitioBase ?>">
            <input class="botonSiguiente espacioDerecha" type="button" value="Salir" id="irInicio">
          </a>
          <?php if (isset($_GET['flag'])) {
          ?>
            <input class="botonSiguiente" type="button" value="Eliminar" id="eliminarAmigo">

          <?php } else { ?>
            <input class="botonSiguiente" type="button" value="Corregír" id="editarAmigo">
          <?php } ?>
        </div>
        <br>
        <br>

      </div>

    </div>
    <!-- FIN LOGIN -->


    <script src="../../recursos/js/consultar_por_cedula.js"></script>

</body>

</html>