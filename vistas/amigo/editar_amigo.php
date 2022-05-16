<?php include '../../controlador/amigo/obtener_amigo.php' ?>

<input type="hidden" id="amigo" data-pais="<?= $amigo['pais_cod'] ?>" data-dpto="amigoDpto" value="<?= $amigo['dpto_cod'] ?>" data-municipio="<?= $amigo['municipio_cod'] ?>" data-barrio="<?= $amigo['barrio_cod'] ?>" data-puesto="<?= $amigo['puesto_cod'] ?>" data-mesa="<?= $amigo['mesa'] ?>">

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
        <p style="font-size: 22pt;">ACTUALICE CAMPOS:</p>
        <hr />
        <br>
        <br>

        <form action="../../controlador/amigo/actualizar_amigo.php" id="formularioEditarAmigo" method="post" autocomplete="off">
          <div id="datosPersonales">

            <?php include '../../controlador/amigo/obtener_paises.php' ?>

            <select class="entradaFormulario texto30" id="selectPaises" name="pais">
              <optgroup label="Selecciona un país:">
                <?php foreach ($paises as $p) { ?>
                  <option data-texto-pais="<?= $p['pais'] ?>" value="<?= $p['pais_cod'] ?>" <?= ($p['pais_cod'] === $amigo['pais_cod']) ? 'selected' : '' ?>>
                    <?= utf8_encode($p['pais']) ?> (<?= $p['indicativo_pais'] ?>)
                  </option>
                <?php } ?>
              </optgroup>
            </select>

            <input class="entradaFormulario" type="hidden" name="cedula" value="<?= $_GET['cedula'] ?>">


            <input class="entradaFormulario" type="hidden" name="cedula_lider" value="<?= $amigo['cedula_lider'] ?>">

            <input class="entradaFormulario" type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $amigo['nombre'] ?>" required>

            <input class="entradaFormulario" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?= $amigo['apellidos'] ?>" required>

            <div class="opcionRadio">
              <h2 id="textoGenero">Género</h2>

              <label>
                M
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="1" <?= ($amigo['genero'] == 1) ? 'checked' : '' ?>>
              </label>

              <label>
                F
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="0" <?= ($amigo['genero'] == 0) ? 'checked' : '' ?>>
              </label>

              <label>
                Otro
                <input class="entradaRadio" type="radio" name="genero" id="genero" value="2" <?= ($amigo['genero'] == 2) ? 'checked' : '' ?>>
              </label>
            </div>

            <input class="entradaFormulario" type="number" name="celular" id="celular" placeholder="Celular de contacto" value="<?= $amigo['celular'] ?>">

            <input class="entradaFormulario" type="number" name="telefono" id="telefono" placeholder="Teléfono" value="<?= $amigo['telefono'] ?>">

            <input class="entradaFormulario" type="email" name="email" placeholder="E-mail" value="<?= $amigo['email'] ?>">
            <label for="fecha_nac">
              <img src="../../recursos/img/iconos/calendar.png" alt="" style="width: 120px; height:120px">
            </label>
            <p style="font-size: 22pt;">Fecha de nacimiento</p>
            <input class="entradaFormulario textoBlanco" type="date" id="fecha_nac" name="fecha_nac" placeholder="Fecha de Nacimiento" value="<?= $amigo['fecha_nac'] ?>" required>

            <p style="font-size: 22pt;">Leer bien antes de continuar</p>
            <?php
               $sitioBase = ($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);
            ?>
            <div class="botones">
              <a href="<?= $sitioBase ?>">
                <input class="botonSiguiente espacioDerecha" type="button" value="Cancelar" id="irInicio">
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

            <input class="entradaFormulario ocultar" type="text" name="barrio_opcional" placeholder="Digite el nombre del barrio" id="barrio_opcional" value="<?= $amigo['barrio_opcional'] ?>">

            <input class="entradaFormulario" type="text" name="direccion" placeholder="Dirección" value="<?= $amigo['direccion'] ?>" id="direccion">

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
                <input class="entradaRadio" type="radio" name="puede_votar" id="puede_votar" value="1" <?= ($amigo['puede_votar'] == 1) ? 'checked' : '' ?>>
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="puede_votar" id="puede_votar" value="0" <?= ($amigo['puede_votar'] == 0) ? 'checked' : '' ?>>

              </label>
            </div>

            <a href="https://wsp.registraduria.gov.co/jurados_atipicas/consultar_jurados.php" target="_blank">
              Toca Aquí para consultar si eres jurado
            </a>
            <br>
            <br>
            <div class="opcionRadio">
              <h2 id="textoJurado">¿Es jurado? </h2>
              <label for="">
                Si
                <input class="entradaRadio" type="radio" name="jurado" id="jurado" value="1" <?= ($amigo['jurado'] == 1) ? 'checked' : '' ?>>
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="jurado" id="jurado" value="0" <?= ($amigo['jurado'] == 0) ? 'checked' : '' ?>>

              </label>
            </div>

            <div class="opcionRadio">
              <h2 id="textoTestigo">¿Es testigo? </h2>

              <label for="">
                Si
                <input class="entradaRadio" type="radio" name="testigo" id="testigo" value="1" <?= ($amigo['testigo'] == 1) ? 'checked' : '' ?>>
              </label>

              <label for="">
                No
                <input class="entradaRadio" type="radio" name="testigo" id="testigo" value="0" <?= ($amigo['testigo'] == 0) ? 'checked' : '' ?>>

              </label>
            </div>

            <br>
            <hr>
            <br><br><br>



            <div class="botones">
              <input class="botonSiguiente" id="anteriorPuestoVotacion" type="button" value="Anterior">
              &nbsp;&nbsp;
              <input class="botonSiguiente" id="siguientePuestoVotacion" type="button" value="Actualizar">
            </div>
          </div>
        </form>
        <br><br>
      </div>

    </div>
    <!-- FIN GRABAR DATOS -->

  </div>

  <script src="../../recursos/js/editar_amigo.js"></script>
</body>

</html>