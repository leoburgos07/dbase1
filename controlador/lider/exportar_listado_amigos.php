<?php

require '../../conexion.php';
require_once '../../librerias/spout/src/Spout/Autoloader/autoload.php';

session_start();
$cedula_lider = $_SESSION['usuarioCedula'];

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
  "WHERE a.cedula_lider = '$cedula_lider' AND a.estado = 1 " .
  "ORDER BY pais, dpto, municipio, barrio ASC "
);

$amigos = $conexion->query($consulta);

$disenoExcel = [
  [
    '#',
    'Cédula',
    'Nombre',
    'Apellidos',
    'Genero',
    'Celular',
    'Teléfono',
    'Correo',
    'Fecha de nacimiento',
    'Pais',
    'Departamento',
    'Municipio',
    'Barrio',
    'Barrio opcional',
    'Direccion',
    'Puesto de votacion',
    'Mesa', // Numero de la mesa
    'Puede votar',
    'Es jurado',
    'Es testigo',
    'Fecha de registro'
  ]
];

$fila = 1;
foreach ($amigos as $amigo) {
  $disenoExcel[$fila] = [
    $fila,
    $amigo['cedula'],
    $amigo['nombre'],
    $amigo['apellidos'],
    $amigo['genero'],
    $amigo['celular'],
    $amigo['telefono'],
    $amigo['correo'],
    $amigo['fechaNacimiento'],
    $amigo['pais'],
    $amigo['dpto'],
    $amigo['municipio'],
    $amigo['barrio'],
    $amigo['barrioOpcional'],
    $amigo['direccion'],
    $amigo['puestoDeVotacion'],
    $amigo['mesa'],
    $amigo['puedeVotar'],
    $amigo['esJurado'],
    $amigo['esTestigo'],
    $amigo['fechaRegistro'],
  ];

  $fila++;
}

$escritor = (
  Box\Spout\Writer\Common\Creator\WriterEntityFactory::createXLSXWriter()
);

// Descargar automaticamente el archivo desde el navegador
(
  $escritor
  ->openToBrowser(
    'listado de amigos por municipio - ' .
    date('Ymd_His', time()) .
    '.xlsx'
  )
);

// // Crear una hoja de calculo
$hoja = $escritor->getCurrentSheet();
$hoja->setName('Amigos por municipio y barrio');

foreach ($disenoExcel as $dato) {
  $datoFila = (
    Box\Spout\Writer\Common\Creator\WriterEntityFactory
    ::createRowFromArray($dato)
  );
  $escritor->addRow($datoFila);
}

$escritor->close();
