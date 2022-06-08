<?php

require '../../conexion.php';

session_start();

$cedula_lider = $_SESSION['usuarioCedula'];

$consulta = (
  "SELECT " .
      "p.pais, " .
      "d.dpto, " .
      "m.municipio, " .
      "b.barrio, " .
      "GROUP_CONCAT( " .
        "CONCAT( " .
          "a.cedula, " .
          "';;;', " .
          "a.nombre, " .
          "';;;', " .
          "a.apellidos " .       
        ") " .
        "SEPARATOR '|||' " .
    ") amigos " .
  "FROM " .
      "amigos a " .
      "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
  "WHERE a.estado = 1 " .
  "GROUP BY m.municipio, b.barrio " .
  "ORDER BY p.pais ASC, d.dpto ASC, m.municipio ASC, b.barrio ASC "
);


$resultados = $conexion->query($consulta);
$amigosPorMunicipios = [];
if ($resultados->num_rows) { // Hay registros
  foreach ($resultados as $resultado) {
    $amigosPorMunicipio = [
      'pais' => $resultado['pais'],
      'dpto' => $resultado['dpto'],
      'municipio' => $resultado['municipio'],
      'barrio' => $resultado['barrio'],
      'amigos' => []
    ];

    $amigos = [];
    $amigosCodificados = explode('|||' , $resultado['amigos']);

    foreach ($amigosCodificados as $amigoCodificado) {
      $amigoSegmentos = explode(';;;' , $amigoCodificado);
      $amigo = [
        'cedula' => $amigoSegmentos[0],
        'nombre' => $amigoSegmentos[1],
        'apellidos' => $amigoSegmentos[2],
      ];

      $amigos[] = $amigo;
    }

    $amigosPorMunicipio['amigos'] = $amigos;
    
    $amigosPorMunicipios[] = $amigosPorMunicipio;
    
  }
  // echo json_encode($amigosPorMunicipio[]);
}

$consultaLideres = (
  "SELECT CONCAT(a.nombre, ' ',a.apellidos) 'NombreCompleto', a.cedula " . 
  "FROM amigos a " .
  "JOIN clave_lider c ON a.cedula = c.cedula_lider " . 
  "WHERE a.estado = 1"
);
$resultadosLideres = $conexion->query($consultaLideres);
$contadorLideres = [];
 if($resultadosLideres->num_rows){
     
    foreach($resultadosLideres as $lider){
      array_push($contadorLideres,$lider);
    }
 }



$consultaTotalAmigos = (
  "SELECT count(*) as cantidad FROM amigos  where estado = 1"
);
$resultadoTotalAmigos = $conexion->query($consultaTotalAmigos);
$cantAmigos = [];

if($resultadoTotalAmigos->num_rows){
  foreach($resultadoTotalAmigos as $result){
    array_push($cantAmigos,$result);
  }
}

$consultaLideresPorBarrio = (
  "SELECT " .
      "p.pais, " .
      "d.dpto, " .
      "m.municipio, " .
     "b.barrio, " .
      "GROUP_CONCAT( " .
        "CONCAT( " .
          "a.cedula, " .
          "';;;', " .
          "a.nombre, " .
          "';;;', " .
          "a.apellidos " .
        ") " .
        "SEPARATOR '|||' " .
   " ) lideres " .
  "FROM " .
      "amigos a " .
     "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
      "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
      "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
      "JOIN pais p ON p.pais_cod = d.pais_cod " .
     " JOIN clave_lider c ON a.cedula = c.cedula_lider " .
  "WHERE a.estado = 1 " .
  "GROUP BY m.municipio, b.barrio " .
  "ORDER BY p.pais ASC, d.dpto ASC, m.municipio ASC, b.barrio ASC "
);
$resultadoLideresPorBarrio = $conexion->query($consultaLideresPorBarrio);
$lideresPorBarrios = [];

if($resultadoLideresPorBarrio->num_rows){
  foreach($resultadoLideresPorBarrio as $lider){
    $lideresPorBarrio = [
      'pais' => $lider['pais'],
      'dpto' => $lider['dpto'],
      'municipio' => $lider['municipio'],
      'barrio' => $lider['barrio'],
      'lideres' => []
    ];
    $lideres = [];
    $lideresCodificados = explode('|||', $lider['lideres']);
    foreach($lideresCodificados as $liderCodificado)
    {
      $liderSegmentos = explode(';;;', $liderCodificado);
      $lider = [
        'cedula' => $liderSegmentos[0],
        'nombre' => $liderSegmentos[1],
        'apellidos' => $liderSegmentos[2]
      ];
      $lideres[] = $lider;
    }

    $lideresPorBarrio['lideres'] = $lideres;
    $lideresPorBarrios[] = $lideresPorBarrio;
  }
}





