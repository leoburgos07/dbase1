<?php

require '../../conexion.php';

$cedula = mysqli_real_escape_string($conexion, $_GET['cedula']);

$consulta = (
  "SELECT  " .
    "a.*, " .
    "b.barrio_cod, " .
    "m.municipio_cod, " .
    "d.dpto_cod, " .
    "p.pais_cod " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE cedula = $cedula"
);
$resultadosAmigo = $conexion->query($consulta);

$amigo = [];
foreach ($resultadosAmigo as $resultadoAmigo) {
  $amigo = $resultadoAmigo;
}

// echo json_encode($amigo);
