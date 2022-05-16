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
			margin-top: 150px;
		}
	</style>

</head>

<body>
	<div id="container">
		<!-- LOGIN -->
		<div id="portada" align="center">

			<div class="login-box">
				<h1>
          El amigo con cédula <i><?= $_GET['cedula'] ?></i> ya está registrado(a)
        </h1>
				<br><br>
				<a href="cedula_amigo.php">
					<button name="boton10" class="boton">Regresar</button>
				</a>
			</div>

		</div>
		<!-- FIN LOGIN -->

	</div>
</body>

</html>
