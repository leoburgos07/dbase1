<?php require '../../controlador/lider/contador_lideres.php'; ?>

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
                <h1>Estructura de líderes</h1>

                <?php
                if ($perfilUsuario != "1" &&  $perfilUsuario != "2") {
                ?>
                    <p class="texto40 errorTexto m-0">
                        <?= $_SESSION['usuarioNombreCompleto']; ?>
                    </p>
                    <p class="texto40 mt-0"><?= $cedula_lider ?> <br> <?= $_SESSION["usuarioMunicipio"] ?></p>
                <?php } ?>

                <div class="contenedorResultados">
                    <h1 class="tituloTabla textoVerde">Por País</h1>
                    <table class="tablaResultado">
                        <tr class="ancho25">
                            <th>País</th>
                            <th>Cantidad de líderes</th>
                        </tr>
                        <?php foreach ($lideres as $item) { ?>
                            <tr class="columnaBorderInferior">
                                <td><?= $item['pais'] ?></td>
                                <td class="textoCentrado"><?= $item['cantidadLideres'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <br />
                    <br />
                </div>
                <div class="contenedorResultados">
                    <h1 class="tituloTabla textoVerde">Por Departamento</h1>
                    <table class="tablaResultado">
                        <tr class="ancho25">
                            <th>País</th>
                            <th>Departamento</th>
                            <th>Cantidad de líderes</th>
                        </tr>
                        <?php foreach ($lideresPorDpto as $item) { ?>
                            <tr class="columnaBorderInferior">
                                <td><?= $item['pais'] ?></td>
                                <td><?= $item['dpto'] ?></td>
                                <td class="textoCentrado"><?= $item['cantidadLideres'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <br />
                    <br />
                </div>
                <div class="contenedorResultados">
                    <h1 class="tituloTabla textoVerde">Por Municipio</h1>
                    <table class="tablaResultado">
                        <tr class="ancho25">
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Cantidad de líderes</th>
                        </tr>
                        <?php foreach ($lideresPorMunicipio as $item) { ?>
                            <tr class="columnaBorderInferior">
                                <td><?= $item['dpto'] ?></td>
                                <td><?= $item['municipio'] ?></td>
                                <td class="textoCentrado"><?= $item['cantidadLideres'] ?></td>
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

</body>

</html>