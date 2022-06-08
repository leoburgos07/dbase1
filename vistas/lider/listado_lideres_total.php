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

        <!-- header  -->
        <?php require '../../compartido/cabecera.php' ?>
        <!-- FIN header -->


        <!-- LOGIN -->
        <div class="mt-45" id="portada" align="center">

            <div class="login-box">
                <h2 style="padding-bottom:0px; font-size: 35px">Líderes por barrio</h2>
                <h1> Total <?= count($contadorLideres) ?> Lideres </h1>
                <h2 class="errorTexto" style="font-size:2.2em"> <?= $_SESSION["usuarioNombreCompleto"] ?> </h2>

                <div class="contenedorResultados">
                    <?php foreach ($lideresPorBarrios as $liderPorBarrio) { ?>

                        <table class="tablaResultado" style="margin-bottom:2em">
                            <tr class="borderNone">
                                <th colspan="4" class="texto35 errorTexto">
                                    <?= $liderPorBarrio['pais'] ?>
                                </th>
                            </tr>
                            <tr class="borderNone">
                                <th colspan="4" class="texto30">
                                    <?= $liderPorBarrio['dpto'] ?>
                                </th>
                            </tr>
                            <tr class="borderNone" style="border-bottom:1px solid white !important">
                                <th colspan="4" class="textoVerde">
                                    <?= $liderPorBarrio['municipio'] ?>
                                </th>
                            </tr>
                            <tr class="borderNone" style="border-bottom:1px solid white !important">
                                <th colspan="4">
                                    <?= $liderPorBarrio['barrio'] ?> <br>
                                    <span class="errorTexto"> <?= count($liderPorBarrio['lideres']) ?> </span> Amigos
                                </th>
                            </tr>
                            <tr class="ancho25">
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                            </tr>
                            <?php foreach ($liderPorBarrio['lideres'] as $lider) { ?>

                                <tr class="columnaBorderInferior">
                                    <td style="color:green; border-color:green"><?= $lider['cedula'] ?></td>
                                    <td style="color:green; border-color:green"><?= $lider['nombre'] ?></td>
                                    <td style="color:green; border-color:green"><?= $lider['apellidos'] ?></td>
                                </tr>
                            <?php } ?>

                        <?php } ?>
                        </table>

                </div>

            </div>
            <!-- FIN LOGIN -->

        </div>


        <script src="../../recursos/js/lider.js"></script>

</body>

</html>