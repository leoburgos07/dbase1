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
      margin-top: 5px;
    }
  </style>

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
</head>

<body>
  <div id="container">
    <!-- GRABAR DATOS-->
    <div id="portada" align="center">

      <div class="login-box">
        <p class="textoSuperior1">Cédula: <?= $_GET['cedula'] ?></p>

        <h2>
          <span class="textoSuperior1 ocultar" id="textoPais">COLOMBIA</span><span class="ocultar textoSuperior1" id="textoDpto"></span>
        </h2>
        <h2 class="ocultar textoSuperior1" id="textoMunicipio"></h2>
        <p style="font-size: 22pt;">DIGITE:</p>
        <hr />
        <br>
        <br>

        <form action="../../controlador/amigo/almacenar_amigo.php" id="formularioCrearAmigo" method="post" autocomplete="off">
          <div id="datosPersonales">

            <?php include '../../controlador/amigo/obtener_paises.php' ?>

            <select class="entradaFormulario texto30" id="selectPaises" name="pais">
              <optgroup label="Selecciona un país:">
                <?php foreach ($paises as $p) { ?>
                  <option data-texto-pais="<?= $p['pais'] ?>" value="<?= $p['pais_cod'] ?>" <?= ($p['pais'] === 'COLOMBIA') ? 'selected' : '' ?>>
                    <?= utf8_encode($p['pais']) ?> (<?= $p['indicativo_pais'] ?>)
                  </option>
                <?php } ?>
              </optgroup>
            </select>

            <input class="entradaFormulario" type="hidden" name="cedula" value="<?= $_GET['cedula'] ?>">


            <input class="entradaFormulario" type="hidden" name="cedula_lider" value="<?= $_GET['cedula_lider'] ?>">

            <input class="entradaFormulario" type="text" name="nombre" id="nombre" placeholder="Nombre" required>

            <input class="entradaFormulario" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>

            <div class="opcionRadio">
              <h2 id="textoGenero">Género</h2>

              <label>
                M
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="1">
              </label>

              <label>
                F
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="0">
              </label>

              <label>
                Otro
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="2">
              </label>
            </div>

            <input class="entradaFormulario" type="number" name="celular" id="celular" placeholder="Celular de contacto">

            <input class="entradaFormulario" type="number" name="telefono" id="telefono" placeholder="Teléfono">

            <input class="entradaFormulario" type="email" name="email" placeholder="E-mail">
            <label for="fecha_nac">
              <img src="../../recursos/img/iconos/calendar.png" alt="" style="width: 120px; height:120px">
            </label>

            <p style="font-size: 22pt;">Fecha de nacimiento </p>
            <input class="entradaFormulario textoBlanco" type="date" id="fecha_nac" name="fecha_nac" placeholder="Fecha de Nacimiento" required>

            <p style="font-size: 22pt;">Leer bien antes de continuar</p>
            <?php
              $sitioBase = ($_SERVER['REQUEST_SCHEME'] .
                          '://' .
                          $_SERVER['SERVER_NAME']
              );
            ?>
            <div class="">
              <a href="<?= $sitioBase ?>" class="espacioDerecha" >
                <input class="botonSiguiente" id="irIncio" type="button" value="Salir">
              </a>            
              
              <input class="botonSiguiente" id="guardarDatosPersonales" type="button" value="Siguiente">
            </div>
          </div>

          <div id="datosDireccion" class="ocultar">
            <!-- AQUI SE DEBEN CARGAR LOS CAMPOS DE DIRECCIONES -->
            <select class="entradaFormulario" id="selectDptos" name="dpto">
              <optgroup label="Selecciona un departamento:">
              </optgroup>
            </select>

            <select class="entradaFormulario" id="selectMunicipios" name="municipio">
              <optgroup label="Selecciona un municipio:">
              </optgroup>
            </select>

            <p style="font-size: 22pt;">Si no encuentras el barrio, escoge "<b>Barrio no encontrado</b>" y digita el barrio</p>

            <select class="entradaFormulario" id="selectBarrios" name="barrio" style="color:gray">
              <optgroup label="Selecciona un barrio:">
              </optgroup>
            </select>

            <textarea class="entradaFormularioNoEditable" row="10" col="4" id="comuna_loc" disabled>Comuna/Localidad: Popular ABC</textarea>

            <input class="entradaFormulario ocultar" type="text" name="barrio_opcional" placeholder="Digite el nombre del barrio" id="barrio_opcional">

            <input class="entradaFormulario" type="text" name="direccion" placeholder="Dirección" id="direccion">

            <!-- AQUI SE DEBEN CARGAR LOS CAMPOS DE DIRECCIONES -->
            <p style="font-size: 22pt;">Leer bien antes de continuar</p>

            <div class="botones">
              <input class="botonSiguiente" id="anteriorDireccion" type="button" value="Anterior">
              &nbsp;&nbsp;
              <input class="botonSiguiente" id="siguienteDireccion" type="button" value="Siguiente">
            </div>

          </div>

          <div id="datosPuestoVotacion" class="ocultar">
            <h2 class="letraNormal">Puesto de votación</h2>
            <a href="https://wsp.registraduria.gov.co/censo/consultar" target="_blank">
              Si no sabes donde votar Toca Aquí
            </a>
            <br>
            <br>
            <select class="entradaFormulario texto30" id="selectPuestosVotacion" name="puesto_votacion">
              <optgroup label="Selecciona un puesto de votación:">
              </optgroup>
            </select>

            <h2 class="letraNormal">
              <span id="textoSector"></span><br><span id="textoDireccionPuestoVotacion"></span>
            </h2>

            <br>

            <h2 class="letraNormal">
              Seleccione la mesa de votación del 1 al <span id="textoMesa"></span>
            </h2>

            <select class="entradaFormulario selectPequeno" id="selectMesas" name="mesa"></select>

            <br>

            <div class="opcionRadio">
              <h2 id="textoPuedeVotar">¿Puede votar? </h2>

              <label for="">
                Si
                <input class="entradaRadio" type="radio" name="puede_votar" id="puede_votar" value="1">
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="puede_votar" id="puede_votar" value="0">

              </label>
            </div>

            <a href="https://infovotantescongreso.registraduria.gov.co/home" target="_blank">
              Toca Aquí para consultar si eres jurado
            </a>
            <br>
            <br>
            <div class="opcionRadio">
              <h2 id="textoJurado">¿Es jurado? </h2>
              <label for="">
                Si
                <input class="entradaRadio" type="radio" name="jurado" id="jurado" value="1">
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="jurado" id="jurado" value="0">

              </label>
            </div>

            <div class="opcionRadio">
              <h2 id="textoTestigo">¿Es testigo? </h2>

              <label for="">
                Si
                <input class="entradaRadio" type="radio" name="testigo" id="testigo" value="1">
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="testigo" id="testigo" value="0">

              </label>
            </div>

            <br>
            <hr>
            <br>

            <div>
              <h2>
                <a href="../../manejo_datos.php" target="_blank">Toca Aquí</a> <span id="restanteTocaAqui">para leer términos de manejo de datos.<span>
              </h2>

            </div>

            <div class="manejoDatos">
              <input type="checkbox" id="manejoDatosMarcable">
              <h2><a href="../../manejo_datos.php" target="_blank">Acepto el manejo de datos</a>
              </h2>

            </div>

            <br><br><br>



            <div class="botones">
              <input class="botonSiguiente" id="anteriorPuestoVotacion" type="button" value="Anterior">
              &nbsp;&nbsp;
              <input class="botonSiguiente" id="siguientePuestoVotacion" type="button" value="Registrarte">
            </div>
          </div>
        </form>
      </div>

    </div>
    <!-- FIN GRABAR DATOS -->

  </div>

  <script src="../../recursos/js/crear_amigo.js"></script>
</body>

</html>