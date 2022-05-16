<?php

require '../../conexion.php';

session_start();

$cedula_lider = $_SESSION['usuarioCedula'];

//Estadistica total de amigos

$consulta = (
  "SELECT " .
  " COUNT(*) amigosCantidad " .
  "FROM " . 
  " amigos " . 
  " WHERE estado = 1"
);
$resultados = $conexion->query($consulta);
$totalAmigos;

if($resultados->num_rows){ 
  foreach($resultados as $resultado){
    $totalAmigos = $resultado["amigosCantidad"];
  }
}



// Estadistica de amigos por pais
$consulta = (
  "SELECT " .
      "p.pais, " .
      "COUNT(DISTINCT a.cedula) amigosCantidad " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE a.estado = 1 " .
  "GROUP BY pais " .
  "ORDER BY pais ASC"
);

$resultados = $conexion->query($consulta);

$estadisticaAmigosPorPais = [];

if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    $estadisticaAmigosPorPais[] = [
      'pais' => $resultado['pais'],
      'amigosCantidad' => $resultado['amigosCantidad'],
    ];
  }
}

// Estadistica de amigos por departamento
$consulta = (
  "SELECT " .
      "p.pais, " .
      "d.dpto, " .
      "COUNT(DISTINCT a.cedula) amigosCantidad " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE a.estado = 1 " .
  "GROUP BY d.dpto " .
  "ORDER BY pais, dpto, municipio ASC"
);
$resultados = $conexion->query($consulta);

$estadisticaAmigosPorDepartamento = [];

if ($resultados->num_rows) { // Hay registros
  
  foreach ($resultados as $resultado) {
    
    $estadisticaAmigosPorDepartamento[] = [
      'pais' => $resultado['pais'],
      'dpto' => $resultado['dpto'],
      'amigosCantidad' => $resultado['amigosCantidad'],
    ];
  }
}

// Estadistica de amigos por municipios
$consulta = (
  "SELECT " .
      "p.pais, " .
      "d.dpto, " .
      "m.municipio, " .
      "COUNT(DISTINCT a.cedula) amigosCantidad " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE a.estado = 1 " .
  "GROUP BY m.municipio " .
  "ORDER BY pais, dpto, municipio ASC"
);

$resultados = $conexion->query($consulta);

$estadisticaAmigosPorMunicipio = [];

if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    
    $estadisticaAmigosPorMunicipio[] = [
      'pais' => $resultado['pais'],
      'dpto' => $resultado['dpto'],
      'municipio' => $resultado['municipio'],
      'amigosCantidad' => $resultado['amigosCantidad'],
    ];
  }
}


// Estadistica de amigos por barrios
$consulta = (
  "SELECT " .
      "d.dpto, " .
      "m.municipio, " .
      "b.barrio, " .
      "COUNT(DISTINCT a.cedula) amigosCantidad " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE a.estado = 1 " .
  "GROUP BY b.barrio, m.municipio " .
  "ORDER BY pais, dpto, municipio, barrio ASC"
);

$resultados = $conexion->query($consulta);

$estadisticaAmigosPorBarrio = [];

if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    $estadisticaAmigosPorBarrio[] = [
      'barrio' => $resultado['barrio'],
      'dpto' => $resultado['dpto'],
      'municipio' => $resultado['municipio'],
      'amigosCantidad' => $resultado['amigosCantidad'],
    ];
  }
}
