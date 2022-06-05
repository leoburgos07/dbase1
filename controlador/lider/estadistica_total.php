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
$labelsPais = [];
$valuesPais = [];

if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    array_push($labelsPais, $resultado['pais']);
    array_push($valuesPais, $resultado['amigosCantidad']);
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
$labelsDepartamento = [];
$valuesDepartamento = [];

if ($resultados->num_rows) { // Hay registros
  
  foreach ($resultados as $resultado) {
    array_push($labelsDepartamento, $resultado['dpto']);
    array_push($valuesDepartamento, $resultado['amigosCantidad']);
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
$labelsMunicipios = [];
$valuesMunicipios = [];
if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    array_push($labelsMunicipios, $resultado['municipio']);
    array_push($valuesMunicipios, $resultado['amigosCantidad']);
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
$labelsBarrios = [];
$valuesBarrios = [];

if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    array_push($labelsBarrios, $resultado['barrio']);
    array_push($valuesBarrios, $resultado['amigosCantidad']);
    $estadisticaAmigosPorBarrio[] = [
      'barrio' => $resultado['barrio'],
      'dpto' => $resultado['dpto'],
      'municipio' => $resultado['municipio'],
      'amigosCantidad' => $resultado['amigosCantidad'],
    ];
  }
}
