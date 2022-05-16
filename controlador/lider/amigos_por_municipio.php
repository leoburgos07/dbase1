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
  "WHERE a.cedula_lider = '$cedula_lider' AND a.estado = 1 " .
  "GROUP BY m.municipio, b.barrio " .
  "ORDER BY p.pais ASC, d.dpto ASC, m.municipio ASC, b.barrio ASC "
);
$consultaLideres = (
  "SELECT CONCAT(a.nombre, ' ',a.apellidos) 'NombreCompleto', a.cedula " . 
  "FROM amigos a " .
  "JOIN clave_lider c ON a.cedula = c.cedula_lider " . 
  "WHERE a.cedula_lider = '$cedula_lider' AND a.estado = 1"
);


$resultadosLideres = $conexion->query($consultaLideres);
$resultados = $conexion->query($consulta);

$amigosPorMunicipios = [];
$lideres = [];
 if($resultadosLideres->num_rows){
    foreach($resultadosLideres as $lider){
      array_push($lideres,$lider);
    }
 }

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


  //echo json_encode($amigosPorMunicipios[0]["amigos"][0]["nombre"]);
}



