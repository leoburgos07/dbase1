<?php

require '../../conexion.php';

$municipio_cod = mysqli_real_escape_string($conexion, $_GET['municipio_cod']);

$consulta = "SELECT * FROM barrio WHERE municipio_cod = $municipio_cod";
$barrios = $conexion->query($consulta);

if ($barrios->num_rows === 0) {
  echo '{}';
  exit;
}

$barrios_json = '{';

foreach ($barrios as $index => $barrio) {
  $barrio_json = (
    '"' . $index . '": ' . '{' .
      '"barrio": "' . utf8_encode($barrio['barrio']) . '",' .
      '"municipio_cod": ' . $barrio['municipio_cod'] . ',' .
      '"comuna_numero": ' . $barrio['comuna_numero'] . ',' .
      '"comuna_loc_cod": ' . $barrio['comuna_loc_cod'] . ',' .
      '"nombre_comuna_loc": "' . utf8_encode($barrio['nombre_comuna_loc']) . '",' .
      '"barrio_cod": ' . $barrio['barrio_cod'] .
    '},'
  );

  $barrios_json .= $barrio_json;
}

$barrios_json[strlen($barrios_json) - 1] = '}';

echo $barrios_json;
