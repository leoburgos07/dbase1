<?php

require '../../conexion.php';

session_start();

$cedula_lider = $_SESSION['usuarioCedula'];
$perfilUsuario = $_SESSION["usuarioPerfil"];

if ($perfilUsuario == "1" || $perfilUsuario == "2") {
    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 " .
        "GROUP BY p.pais "
    );

$resultados = $conexion->query($consulta);
$lideres = [];
$total = 0;

if ($resultados->num_rows > 0) { //Encontró registros
    foreach ($resultados as $resultado) {
        $total += $resultado['cantidadLideres'];
        array_push($lideres, $resultado);
    }
}


$consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais, d.dpto " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 " .
        "GROUP BY p.pais, d.dpto " .
        "ORDER BY p.pais, d.dpto "
    );

    $resultados = $conexion->query($consulta);
    $lideresPorDpto = [];

    if ($resultados->num_rows > 0) { //Encontró registros
        foreach ($resultados as $resultado) {
            array_push($lideresPorDpto, $resultado);
        }
    }

    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais, d.dpto, m.municipio " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 " .
        "GROUP BY p.pais, d.dpto, m.municipio " .
        "ORDER BY p.pais, d.dpto, m.municipio "
    );

    $resultados = $conexion->query($consulta);
    $lideresPorMunicipio = [];

    if ($resultados->num_rows > 0) {
        foreach ($resultados as $resultado) {
            array_push($lideresPorMunicipio, $resultado);
        }
    }

    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais, d.dpto, m.municipio, b.barrio " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 " .
        "GROUP BY p.pais, d.dpto, m.municipio, b.barrio " .
        "ORDER BY p.pais, d.dpto, m.municipio, b.barrio "
    );
    $resultados = $conexion->query($consulta);
    $lideresPorBarrio = [];
    if ($resultados->num_rows > 0) {
        foreach ($resultados as $resultado) {
            array_push($lideresPorBarrio, $resultado);
        }
    }
} else {
    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 AND a.cedula_lider = '$cedula_lider' " .
        "GROUP BY p.pais "
    );

    $resultados = $conexion->query($consulta);
    $lideres = [];

    if ($resultados->num_rows > 0) { //Encontró registros
        foreach ($resultados as $resultado) {
            array_push($lideres, $resultado);
        }
    }


    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais, d.dpto " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 AND a.cedula_lider = '$cedula_lider' " .
        "GROUP BY p.pais, d.dpto " .
        "ORDER BY p.pais, d.dpto "
    );

    $resultados = $conexion->query($consulta);
    $lideresPorDpto = [];

    if ($resultados->num_rows > 0) { //Encontró registros
        foreach ($resultados as $resultado) {
            array_push($lideresPorDpto, $resultado);
        }
    }

    $consulta = ("SELECT COUNT(a.cedula) cantidadLideres , p.pais, d.dpto, m.municipio " .
        "FROM clave_lider c " .
        "JOIN amigos a ON a.cedula = c.cedula_lider " .
        "JOIN barrio b ON a.barrio_cod = b.barrio_cod " .
        "JOIN municipio m ON b.municipio_cod = m.municipio_cod " .
        "JOIN dpto d ON m.dpto_cod = d.dpto_cod " .
        "JOIN pais p ON d.pais_cod = p.pais_cod " .
        "WHERE a.estado = 1 AND a.cedula_lider = '$cedula_lider'  " .
        "GROUP BY p.pais, d.dpto, m.municipio " .
        "ORDER BY p.pais, d.dpto, m.municipio "
    );

    $resultados = $conexion->query($consulta);
    $lideresPorMunicipio = [];

    if ($resultados->num_rows > 0) {
        foreach ($resultados as $resultado) {
            array_push($lideresPorMunicipio, $resultado);
        }
    }
}
