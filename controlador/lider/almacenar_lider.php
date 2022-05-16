<?php

require '../../conexion.php';

$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
$clave = sha1(mysqli_real_escape_string($conexion, $_POST['clave']));
$perfil_cod = 5;

if (isset($_POST['perfil_cod'])) {
  $perfil_cod = mysqli_real_escape_string($conexion, $_POST['perfil_cod']);
}

$consulta = "INSERT INTO clave_lider (cedula_lider, clave, perfil_cod) VALUES ('$cedula_lider', '$clave', '$perfil_cod');
";

$resultado = $conexion->query($consulta);

header("Location: ../../index.php");
