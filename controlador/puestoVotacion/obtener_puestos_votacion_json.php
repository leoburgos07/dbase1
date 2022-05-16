<?php

require '../../conexion.php';

$municipio_cod = mysqli_real_escape_string($conexion, $_GET['municipio_cod']);

$consulta = "SELECT * FROM puesto_votacion WHERE municipio_cod = $municipio_cod";
$puestos_votacion = $conexion->query($consulta);

if ($puestos_votacion->num_rows === 0) {
  echo '{}';
  exit;
}

$puestos_votacion_json = '{';

foreach ($puestos_votacion as $index => $puesto_votacion) {
  $puesto_votacion_json = (
    '"' . $index . '": ' . '{' .
      '"municipio_cod": ' . $puesto_votacion['municipio_cod'] . ',' .
      '"puesto_cod": ' . $puesto_votacion['puesto_cod'] . ',' .
      '"puesto_de_votacion": "' . utf8_encode($puesto_votacion['puesto_de_votacion']) . '",' .
      '"mesas_puesto": ' . $puesto_votacion['mesas_puesto'] . ',' .
      '"sector": "' . utf8_encode($puesto_votacion['sector']) . '",' .
      '"direccion_puesto": "' . utf8_encode($puesto_votacion['direccion_puesto']) . '"},'
  );

  $puestos_votacion_json .= $puesto_votacion_json;
}

$puestos_votacion_json[strlen($puestos_votacion_json) - 1] = '}';

echo $puestos_votacion_json;
