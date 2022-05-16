<?php

require '../../conexion.php';


session_start();

$cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);

$consulta = ("UPDATE amigos SET estado = 0 WHERE cedula = '$cedula'");

$resultados = $conexion->query($consulta);

echo json_encode($resultados);
