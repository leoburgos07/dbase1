"use strict";

(function () {
  var listaLideres = document.querySelector("#selectLideres");
  var dBuscarLideres = document.querySelector(".jsBuscarLideres");
  var dTablaResultado = document.querySelector(".tablaResultado");
  var dCedulaLider = document.querySelector(".jsCedulaLider");
  var dCedulaNoTieneLider = document.querySelector(".jsCedulaNoTieneLider");
  var dCedulaLiderAux = document.querySelector("#cedulaLiderAux");

  function actualizarTablaResultado() {
    var lider = listaLideres[listaLideres.selectedIndex].dataset;
    var tablaContenido = `<tr>
        <td>Nombre</td>
        <td class="texto30">${lider.nombreCompleto}</td>
      </tr>
      <tr>
        <td>Celular</td>
        <td class="texto30">${lider.celular}</td>
      </tr>

      <tr>
        <td>Pais - Dpto</td>
        <td class="texto30">${lider.paisDpto}</td>
      </tr>
      <tr>
        <td>Municipio</td>
        <td class="texto30">${lider.municipio}</td>
      </tr>`;
    dTablaResultado.innerHTML = tablaContenido;
    dCedulaLider.value = lider.cedula;
  }

  function obtenerLideres() {
    var texto = document.querySelector("#cedulaLiderAux").value.trim();

    if (texto.length === 0) {
      alert("Campo de nombre de lider vacio");
      return;
    }

    $.ajax({
      type: "POST",
      url: `../../controlador/lider/obtener_lideres_json.php`,
      data: { texto: texto },
      dataType: "JSON",
      success: function (lideres) {
        if (lideres.length === 0) {
          dTablaResultado.textContent = "";
          listaLideres.innerHTML = "";
          return;
        }
        var contenidoHtml = `<optgroup label="Selecciona un líder:" >`;
        for (var indice in lideres) {
          contenidoHtml += `<option
              value="${lideres[indice]["cedula"]}"
              data-celular="${lideres[indice]["celular"]}"
              data-pais-dpto="${lideres[indice]["paisDpto"]}"
              data-municipio="${lideres[indice]["municipio"]}"
              data-nombre-completo="${lideres[indice]["nombreCompleto"]}"
              data-cedula="${lideres[indice]["cedula"]}"
            >${lideres[indice]["nombreCompleto"]}</option>`;
        }
        contenidoHtml += `</optgroup>`;
        listaLideres.innerHTML = contenidoHtml;
        actualizarTablaResultado();
      },
    });
  }

  listaLideres.addEventListener("change", actualizarTablaResultado);

  dBuscarLideres.addEventListener("click", obtenerLideres);

  function actualizarNoTieneLiderContenedor() {
    var tieneLider = parseInt(
      document.querySelector(".jsTieneLider:checked").value
    );

    if (tieneLider) {
      // Si es igual 1
      document.querySelector(".noTieneLider ").classList.remove("ocultar");
      dTablaResultado.textContent = "";
      listaLideres.innerHTML = "";
      dCedulaLiderAux.value = "";
    } else {
      document.querySelector(".noTieneLider ").classList.add("ocultar");
      dCedulaLider.value = dCedulaNoTieneLider.value;
    }
  }

  Array.prototype.forEach.call(
    document.querySelectorAll(".jsTieneLider"),
    function (dTieneLider) {
      dTieneLider.addEventListener("click", actualizarNoTieneLiderContenedor);
    }
  );

  console.log("Cargado!");
})();
