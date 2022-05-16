<?php

require '../../conexion.php';

$cedula_lider = mysqli_real_escape_string($conexion, $_POST['cedula_lider']);

$consulta = "SELECT * FROM clave_lider WHERE cedula_lider='$cedula_lider'";
$resultado = $conexion->query($consulta);


echo json_encode([
        'existe' => ($resultado->num_rows > 0),
        'cedula' => $cedula_lider
        ]);
