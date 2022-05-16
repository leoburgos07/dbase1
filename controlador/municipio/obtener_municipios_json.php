<?php

require '../../conexion.php';

$dpto_cod = mysqli_real_escape_string($conexion, $_GET['dpto_cod']);

$consulta = "SELECT * FROM municipio WHERE dpto_cod = $dpto_cod";
$municipios = $conexion->query($consulta);

if ($municipios->num_rows === 0) {
  echo '{}';
  exit;
}

$municipios_json = '{';

foreach ($municipios as $index => $municipio) {
  $municipio_json = (
    '"' . $index . '": ' . '{' .
      '"municipio": "' . utf8_encode($municipio['municipio']) . '",' .
      '"dpto_cod": ' . $municipio['dpto_cod'] . ',' .
      '"municipio_cod": ' . $municipio['municipio_cod'] .
    '},'
  );

  $municipios_json .= $municipio_json;
}

$municipios_json[strlen($municipios_json) - 1] = '}';

echo $municipios_json;
