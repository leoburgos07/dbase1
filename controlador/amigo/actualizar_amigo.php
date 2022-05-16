<?php


require '../../conexion.php';

$cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);
$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
$pais = mysqli_real_escape_string($conexion, $_POST['pais']);
$celular = mysqli_real_escape_string($conexion, $_POST['celular']);
$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$fecha_nac = mysqli_real_escape_string($conexion, $_POST['fecha_nac']);
$dpto = mysqli_real_escape_string($conexion, $_POST['dpto']);
$municipio = mysqli_real_escape_string($conexion, $_POST['municipio']);
$barrio = mysqli_real_escape_string($conexion, $_POST['barrio']);
$barrio_opcional = mysqli_real_escape_string($conexion, $_POST['barrio_opcional']);
$direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
$puesto_votacion = mysqli_real_escape_string($conexion, $_POST['puesto_votacion']);
$mesa = mysqli_real_escape_string($conexion, $_POST['mesa']);
$puede_votar = mysqli_real_escape_string($conexion, $_POST['puede_votar']);
$jurado = mysqli_real_escape_string($conexion, $_POST['jurado']);
$testigo = mysqli_real_escape_string($conexion, $_POST['testigo']);
$genero = mysqli_real_escape_string($conexion, $_POST['genero']);

$consulta = (
  "UPDATE amigos  " .
  "SET " .
    "cedula = '$cedula', " .
    "nombre = '$nombre', " .
    "apellidos = '$apellidos', " .
    "genero = $genero, " .
    "celular = '$celular', " .
    "telefono = '$telefono', " .
    "email = '$email', " .
    "fecha_nac = '$fecha_nac', " .
    "barrio_cod = '$barrio', " .
    "barrio_opcional = '$barrio_opcional', " .
    "direccion = '$direccion', " .
    "puesto_cod = '$puesto_votacion', " .
    "mesa = '$mesa', " .
    "puede_votar = $puede_votar, " .
    "jurado = $jurado, " .
    "testigo = $testigo, " .
    "cedula_lider = '$cedula_lider' " .
  "WHERE cedula = '$cedula';"
);

$resultado = $conexion->query($consulta);


// if ($resultado) { // Grabación exitosa
//   header("Location: ../../vistas/amigo/");
// } else {
//   header("Location: ../../vistas/amigo/");
// }

header("Location: ../../index.php");
