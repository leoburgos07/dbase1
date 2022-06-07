<?php

require '../../conexion.php';

$texto = mysqli_real_escape_string($conexion, $_POST['texto']);

$consulta = (
  "SELECT " .
    "a.cedula, " .
    "CONCAT(a.nombre, ' ', a.apellidos) nombreCompleto, " .
    "a.celular, " .
    "CONCAT(p.pais, ' - ', d.dpto) paisDpto, " .
    "m.municipio " .
  "FROM " .
    "amigos a " .
    "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
    "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
    "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
    "JOIN pais p ON p.pais_cod = d.pais_cod " .
    "JOIN clave_lider cl ON cl.cedula_lider = a.cedula " .
  "WHERE " .
    "CONCAT(a.nombre, ' ', a.apellidos) LIKE '%$texto%' OR " .
    "a.nombre LIKE '%$texto%' OR " .
    "a.apellidos LIKE '%$texto%'"
);

$lideres = $conexion->query($consulta);
$lideres_json = [];

foreach ($lideres as $lider) {
  $lideres_json[] = $lider;
}


