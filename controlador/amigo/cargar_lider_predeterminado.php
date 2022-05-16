<?php
require '../../conexion.php';

// Nombre completo, departamento, municipio, celular

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
  "WHERE a.cedula = 1001"
);
$resultados = $conexion->query($consulta);


$lider = [];
foreach ($resultados as $resultado) {
  $lider = $resultado;
  break;
}

// echo json_encode($lider);
