<?php

require '../../conexion.php';

$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
$clave = sha1(mysqli_real_escape_string($conexion, $_POST['clave']));
//$perfil_cod = 5;

$consulta = ("SELECT cl.perfil_cod, a.*, m.municipio FROM clave_lider cl " .
              "JOIN amigos a ON a.cedula = cl.cedula_lider " .
              "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
              "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
              "WHERE cl.cedula_lider = '$cedula_lider' AND cl.clave = '$clave'");

$resultado = $conexion->query($consulta);

session_start();

if ($resultado->num_rows > 0) {
  var_dump($resultado);
  foreach ($resultado as $lider) {
    $_SESSION['usuarioCedula'] = $lider['cedula'];
    $_SESSION['usuarioNombreCompleto'] = (
      $lider['nombre'] .
      ' ' .
      $lider['apellidos']
    );
    $_SESSION['usuarioCelular'] = $lider['celular'];
    $_SESSION['usuarioCorreo'] = $lider['email'];
    $_SESSION["usuarioPerfil"] = $lider['perfil_cod'];
    $_SESSION["usuarioMunicipio"] = $lider["municipio"];
    break;
  }

  var_dump($_SESSION);

  if($_SESSION["usuarioPerfil"] == "1" ){
    header("Location: ../../vistas/lider/informe_candidato.php");
  }else{
    header("Location: ../../vistas/lider/informe_lider.php");
  }

  
} else {
  header("Location: ../../vistas/lider/crear_lider.php?error=clave");
  session_destroy();
}
