<?php

require '../../conexion.php';

$cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);

$consulta = "SELECT * FROM amigos WHERE cedula='$cedula'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows === 0) {
  $cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
  $cedula_lider = ($cedula_lider ?: 1);

  $consultaLider = "SELECT * FROM clave_lider WHERE cedula_lider='$cedula_lider'";
  $resultadoLider = $conexion->query($consultaLider);

  if ($resultadoLider->num_rows === 1) {
    header("Location: ../../vistas/amigo/crear_amigo.php?cedula=$cedula&cedula_lider=$cedula_lider");
  } else {
    header("Location: ../../vistas/amigo/no_existe_lider.php?cedula=$cedula_lider");
  }

  exit;
} else {
  header("Location: ../../vistas/amigo/existe_amigo.php?cedula=$cedula");
}
