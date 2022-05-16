<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>DBase Target - Ejemplo: Candidato ALVARO DAVID / Cámara</title>
  <meta name="keywords" content="candidato a camara, candidato, partido conservador, conservador, camara conservadora, camara, politico, congreso, senado, congresista, control electoral, vigilancia electoral, blindaje electoral, informacion votantes, elecciones 2022, alcalde, gobernador">
  <meta name="description" content="Ejemplo para una campaña a Cámara o Senado, de un software de recolección de datos" />
  <meta http-equiv="Content-Language" content="es" />
  <meta name="rating" content="General">
  <meta name="Robots" content="index, follow, all" />
  <meta http-equiv="expires" content="86400" />
  <meta name="googlebot">
  <meta name="Author" content="Harvey Restrepo" />
  <meta name="copyright" content="Pasoancho Editores" />
  <meta name="owner" content="DBase Target">
  <meta name="Locality" content="Colombia" />
  <meta name="category" content="congress" />
  <meta name="page-topic" content="elections" />
  <meta name="viewport" content="width=device-width" />

  <link href="./recursos/css/style.css" rel="stylesheet" type="text/css" media="screen" />

  <style type="text/css">
    #portada {
      height: 1171px;
      width: 750px;
      float: left;
      background-image: url(recursos/img/1.jpg);
    }

    #menuserv {
      height: 82px;
      width: 750px;
      float: left;
      margin-top: 900px;
      margin-left: 0px;
    }

    #barra-social {
      font-size: 1.5rem;
      height: 70px;
      width: 550px;
      margin-left: auto;
      margin-right: auto;
      left: auto;
      right: auto;
    }

    #social {
      margin-left: auto;
      margin-right: auto;
    }
  </style>

</head>

<body>
  <div id="container">

    <!-- header -->


    <!-- header -->
    <?php require './compartido/cabecera.php' ?>
    <!-- FIN header -->

    <!-- MENU -->
    <div class="mt-64" id="portada" align="center">
      <div id="menuserv" align="center">

        <a href="vistas/amigo/cedula_amigo.php"><img src="recursos/img/a.png" width="350" height="82" alt="" /></a>

        <a href="vistas/lider/crear_lider.php"><img src="recursos/img/b.png" width="350" height="82" alt="" /></a>

        <a href="propuestas.php"><img src="recursos/img/c.png" width="350" height="82" alt="" /></a>

        <a href="historia.php"><img src="recursos/img/d.png" width="350" height="82" alt="" /></a>

        <a href="https://wsp.registraduria.gov.co/censo/consultar/" target="new"><img src="recursos/img/e.png" width="350" height="82" alt="" /></a>

        <a href="https://infovotantescongreso.registraduria.gov.co/home" target="new"><img src="recursos/img/f.png" width="350" height="82" alt="" /></a>

      </div>
    </div>
    <!-- FIN MENU -->

    <input type="hidden" class="jsEnlace" value="<?= ($_SERVER['REQUEST_SCHEME'] .
                                                    '://' .
                                                    $_SERVER['SERVER_NAME']
                                                  ) ?>" />

    <!-- BARRA REDES SOCIALES -->
    <div id="social">
      <div id="barra-social">
        <a href="https://www.instagram.com/dbasetarget/" target="new"><img src="recursos/img/iconos/1.png" width="100" height="70" alt="" /></a>

        <a href="https://www.facebook.com/dbasetarget"><img src="recursos/img/iconos/2.png" width="100" height="70" alt="" /></a>


        <a class="accion jsComparteEnlace"><img src="recursos/img/iconos/0.png" width="100" height="70" alt="" /></a>

        <a href="https://twitter.com/DbaseTarget"><img src="recursos/img/iconos/3.png" width="100" height="70" alt="" /></a>

        <a href="https://www.youtube.com/embed/" target="new"><img src="recursos/img/iconos/4.png" width="100" height="70" alt="" /></a>
      </div>
    </div>
    <!-- FIN BARRA REDES SOCIALES -->
  </div>


  <script src="./recursos/js/compartir_enlace.js"></script>
</body>

</html>
