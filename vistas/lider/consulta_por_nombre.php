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
          Consulta y Modificación por Nombre
        </h1>
        <h1 class="texto40 m-0 errorTexto">
        <?php
          echo $_SESSION['usuarioNombreCompleto'];
          ?>
        </h1>

        <form class="formularioConsultarPorNombre">
          <input type="hidden" class="cedulaLider" name="cedula_lider" value="<?= $_SESSION['usuarioCedula'] ?>">
          <input type="hidden" name="perfil" id="perfil" value="<?= $_SESSION["usuarioPerfil"] ?>">
          <p class="letraNormal">Digite el nombre completo:</p>
          <input type="text" name="nombre" id="nombre" class="entradaFormulario" placeholder="Nombre completo">

          <input class="botonSiguiente" type="button" value="Buscar" id="buscarPorNombre">
        </form>
        <br><br>
        <h2 class="errorTexto ocultar" id="ningunLiderEncontrado">Ningun Lider encontrado</h2>
        <br><br>
        <select class="entradaFormulario textoGris ocultar" id="selectLideres" style="color:gray">
            <optgroup label="Selecciona un Líder:">
            </optgroup>
          </select>

        <br><br>
        <div class="resultadoContenedor ocultar">
          <table class="tablaResultado tablaTextoIzquierda">

          </table>

         <br><br>
          
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
          <input class="botonSiguiente" type="button" value="Corregír" id="editarAmigo">
          
          
        </div>
        <br>
        <br>

      </div>

    </div>
    <!-- FIN LOGIN -->


    <script src="../../recursos/js/consultar_por_nombre.js"></script>

</body>

</html>