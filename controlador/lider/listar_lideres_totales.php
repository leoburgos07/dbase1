<?php

require '../../conexion.php';

session_start();

$cedula_lider = $_SESSION['usuarioCedula'];


$consulta = (
    "SELECT CONCAT(a.nombre, ' ', a.apellidos) nombreCompleto, a.cedula_lider lider, a.cedula, p.pais, d.dpto, m.municipio " .
    "FROM clave_lider c " .
    "JOIN amigos a ON a.cedula = c.cedula_lider " .
    "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
    "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
    "JOIN dpto d ON m.dpto_cod = d.dpto_cod  " .
    "JOIN pais p ON d.pais_cod = p.pais_cod " .
    "WHERE a.estado = 1  " .
    "GROUP BY p.pais "
);

$resultados = $conexion->query($consulta);
$lideres = [];

if($resultados->num_rows >0){
    foreach ($resultados as $resultado ) {
        array_push($lideres,$resultado);
    }
}