<?php

require '../../conexion.php';

session_start();
$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
$cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);

$perfil = mysqli_real_escape_string($conexion, $_POST['perfil_usuario']);

if($perfil == "1" || $perfil == "2"){
  $consulta = (
    "SELECT  " .
      "a.cedula, " .
      "a.nombre, " .
      "a.apellidos, " .
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
    "WHERE a.estado = 1 AND a.cedula = $cedula " .
    "ORDER BY pais, dpto, municipio, barrio ASC "
  );
}else{
  $consulta = (
    "SELECT  " .
      "a.cedula, " .
      "a.nombre, " .
      "a.apellidos, " .
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
    "WHERE a.cedula_lider = '$cedula_lider' AND a.estado = 1 AND a.cedula = $cedula " .
    "ORDER BY pais, dpto, municipio, barrio ASC "
  );
}




$resultados = $conexion->query($consulta);
$amigo = [];

if ($resultados->num_rows > 0) {
  foreach ($resultados as $resultado) {
    $amigo = $resultado;
  }
}



