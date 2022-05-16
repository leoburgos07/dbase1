<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ALVARO DAVID / Candidato a Cámara Partido Conservador 107</title>
  <meta name="viewport" content="width=device-width" />

  <link href="../../recursos/css/style.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="../../recursos/css/login.css" rel="stylesheet" type="text/css" media="screen" />

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

    .login-box {
      margin-top: 30px;
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
    <div id="portada" align="center">

      <div class="login-box">
        <img src="../../recursos/img/logo.jpg" class="avatar" alt="Avatar Image">
        <h1>Registro Amigo(a)</h1>
        <p class="letraNormal m-0">Gracias por ser parte de nuestra red de amigos.</p>
        <br><br><br>

        <!-- EVITAR QUE LOS CAMPOS AUTCOMPLETEN -->
        <!-- autocomplete="off -->
        <form action="../../controlador/amigo/existe_cedula.php" method="POST" autocomplete="off">
          <p class="letraNormal mt-0 mb-10">Digite su cédula:</p>
          <input type="number" name="cedula" id="cedula" class="entradaFormulario" placeholder="Cédula sin puntos ni comas" required>

          <div class="opcionRadio">
            <h2 id="textoJurado">¿Tiene líder? </h2>
            <label for="">
              Si
              <input class="entradaRadio jsTieneLider" type="radio" name="tieneLider" value="1">
            </label>

            <label for="">
              No
              <input class="entradaRadio jsTieneLider" type="radio" name="tieneLider" value="0" checked>

            </label>
          </div>


          <?php include '../../controlador/amigo/cargar_lider_predeterminado.php' ?>

          <input type="hidden" class="jsCedulaNoTieneLider" value="<?= $lider['cedula'] ?>" />

          <input type="hidden" name="cedula_lider" class="jsCedulaLider" value="<?= $lider['cedula'] ?>" />

          <div class="noTieneLider ocultar">
            <br>
            <p class="letraNormal mt-0 mb-10">
              Digite el nombre del líder
            </p>
            <input type="text" name="cedulaLiderAux" id="cedulaLiderAux" class="entradaFormulario" placeholder="Nombre del líder">

            <input class="botonSiguiente jsBuscarLideres" type="button" value="Buscar Líder" />

            <br><br>
            <select class="entradaFormulario textoGris" id="selectLideres" style="color:gray">
              <optgroup label="Selecciona un Líder:">
              </optgroup>
            </select>

            <table class="tablaResultado tablaTextoIzquierda">
            </table>
          </div>


          <br>

          <input class="botonSiguiente" type="submit" value="Entrar">
        </form>

      </div>

    </div>
    <!-- FIN LOGIN -->

  </div>

  <script src="../../recursos/js/cedula_amigo.js"></script>

</body>

</html>