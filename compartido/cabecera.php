<?php
$sitioBase = ($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']
  //           https://localhost


);
?>


<header class="fijo">
  <div id="botones">
    <a href="<?= $sitioBase ?>">
      <button name="boton1" class="boton">
        Inicio
      </button>
    </a>

    <a href="https://wa.me/573184473141">
      <button name="boton2" class="boton">WhatsApp</button>
    </a>

    <a href="agenda.php">
      <button name="boton3" class="boton">Agenda</button>
    </a>


    <?php if (
      in_array(
        $_SERVER['REQUEST_URI'],
        [
          '/vistas/lider/estadisticas_lider.php',
          '/vistas/lider/listado_amigos_lider.php',
          '/vistas/lider/consulta_por_cedula.php',
          '/vistas/lider/consulta_por_nombre.php',
          '/vistas/lider/multinivel_lideres.php'
        ]
      )
    ) { ?>
      <a href="<?= $sitioBase ?>/vistas/lider/informe_lider.php">
        <button name="boton4" class="boton fondoRojo">
          Volver
        </button>
      </a>

    <?php } else if (in_array(
      $_SERVER['REQUEST_URI'],
      [
        '/vistas/lider/estadisticas_candidato.php',
        '/vistas/lider/listado_total.php',
        '/vistas/lider/consulta_por_cedula_total.php',
        '/vistas/lider/consulta_por_nombre_total.php',
        '/vistas/lider/multinivel_lideres.php'
      ]
    ) && $_SESSION["usuarioPerfil"] == "1") { ?>

      <a href="<?= $sitioBase ?>/vistas/lider/informe_candidato.php">
        <button name="boton4" class="boton fondoRojo">
          Volver
        </button>
      </a>


    <?php } else { ?>
      <a href="<?= $sitioBase ?>/vote-asi.php">
        <button name="boton4" class="boton">
          Vote Así
        </button>
      </a>
    <?php } ?>
  </div>
  <a href="#container"> <img src="/dbasetarget/recursos/img/iconos/flecha.png" alt=""/></a>
</header>