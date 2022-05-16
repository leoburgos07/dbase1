<?php

require '../../conexion.php';

$pais_cod = mysqli_real_escape_string($conexion, $_GET['pais_cod']);

$consulta = "SELECT * FROM dpto WHERE pais_cod = $pais_cod";
$departamentos = $conexion->query($consulta);

if ($departamentos->num_rows === 0) {
  echo '{}';
  exit;
}

$departamentos_json = '{';

foreach ($departamentos as $index => $departamento) {
  $departamento_json = (
    '"' . $index . '": ' . '{' .
      '"dpto": "' . utf8_encode($departamento['dpto']) . '",' .
      '"dpto_cod": ' . $departamento['dpto_cod'] . ',' .
      '"region_cod": ' . $departamento['region_cod'] .
    '},'
  );

  $departamentos_json .= $departamento_json;
}

$departamentos_json[strlen($departamentos_json) - 1] = '}';

echo $departamentos_json;
