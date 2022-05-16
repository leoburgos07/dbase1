<?php

require '../../conexion.php';

$cedula = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);

$consulta = "SELECT * FROM amigos WHERE cedula='$cedula'";
$amigos = $conexion->query($consulta);

$respuesta = [
  'existe' => ($amigos->num_rows > 0),
  'cedula' => $cedula
];

foreach ($amigos as $amigo) {
  $respuesta['nombreCompleto'] = (
    $amigo['nombre'] .
    ' ' .
    $amigo['apellidos']
  );
}



echo json_encode($respuesta);
