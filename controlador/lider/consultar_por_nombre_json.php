<?php

require '../../conexion.php';

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
$perfil = mysqli_real_escape_string($conexion, $_POST['perfil_usuario']);

if($perfil == "1" || $perfil == "2"){
    $consulta = (
        "SELECT  " .
        "a.cedula, " .
        "CONCAT(a.nombre, ' ', a.apellidos) as NombreCompleto, " .
        "IF ( " .
            "a.genero = 0, " .
            "'Femenino', " .
            "IF ( " .
              "a.genero = 1, " .
              "'Masculino', " .
              "'Otro' " .
            ") " .
        ") genero, " .
        "a.celular, " .
        "a.telefono, " .
        "a.cedula_lider, ".
        "a.email correo, " .
        "a.fecha_nac fechaNacimiento, " .
        "p.pais, " .
        "d.dpto, " .
        "m.municipio, " .
        "b.barrio, " .
        "a.barrio_opcional barrioOpcional, " .
        "a.direccion, " .
        "pv.puesto_de_votacion puestoDeVotacion, " .
        "a.mesa, " .
        "IF (a.puede_votar = 1, 'SI', 'NO') puedeVotar, " .
        "IF (a.jurado = 1, 'SI', 'NO') esJurado, " .
        "IF (a.testigo = 1, 'SI', 'NO') esTestigo, " .
        "a.fecha_registro fechaRegistro " .
      "FROM " .
          "amigos a " .
          "JOIN puesto_votacion pv ON pv.puesto_cod = a.puesto_cod " .
          "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
          "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
          "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
          "JOIN pais p ON p.pais_cod = d.pais_cod " .
      "WHERE a.estado = 1 AND CONCAT(a.nombre, ' ', a.apellidos) LIKE '%$nombre%' " .
      "ORDER BY pais, dpto, municipio, barrio ASC "
        
    );
}else{
    $consulta = (
        "SELECT  " .
        "a.cedula, " .
        "CONCAT(a.nombre, ' ', a.apellidos) as NombreCompleto, " .
        "IF ( " .
            "a.genero = 0, " .
            "'Femenino', " .
            "IF ( " .
              "a.genero = 1, " .
              "'Masculino', " .
              "'Otro' " .
            ") " .
        ") genero, " .
        "a.celular, " .
        "a.telefono, " .
        "a.cedula_lider, ".
        "a.email correo, " .
        "a.fecha_nac fechaNacimiento, " .
        "p.pais, " .
        "d.dpto, " .
        "m.municipio, " .
        "b.barrio, " .
        "a.barrio_opcional barrioOpcional, " .
        "a.direccion, " .
        "pv.puesto_de_votacion puestoDeVotacion, " .
        "a.mesa, " .
        "IF (a.puede_votar = 1, 'SI', 'NO') puedeVotar, " .
        "IF (a.jurado = 1, 'SI', 'NO') esJurado, " .
        "IF (a.testigo = 1, 'SI', 'NO') esTestigo, " .
        "a.fecha_registro fechaRegistro " .
      "FROM " .
          "amigos a " .
          "JOIN puesto_votacion pv ON pv.puesto_cod = a.puesto_cod " .
          "JOIN barrio b ON b.barrio_cod = a.barrio_cod " .
          "JOIN municipio m ON m.municipio_cod = b.municipio_cod " .
          "JOIN dpto d ON d.dpto_cod = m.dpto_cod " .
          "JOIN pais p ON p.pais_cod = d.pais_cod " .
      "WHERE a.cedula_lider = '$cedula_lider' AND a.estado = 1 AND CONCAT(a.nombre, ' ', a.apellidos) LIKE '%$nombre%' " .
      "ORDER BY pais, dpto, municipio, barrio ASC "
        
    );
}



$resultados = $conexion->query($consulta);

$amigos = [];

if($resultados->num_rows > 0){
    foreach($resultados as $resultado){
        array_push($amigos, $resultado);
    }
}

echo json_encode($amigos)



?>