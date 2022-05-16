<?php

require '../../conexion.php';

$consulta = 'SELECT * FROM pais';
$paises = $conexion->query($consulta);
