
var contenedorDatosPersonales = document.querySelector('#datosPersonales');
var contenedorDireccion = document.querySelector('#datosDireccion');
var contenedorPuestoVotacion = document.querySelector('#datosPuestoVotacion');

var textoPais = document.querySelector('#textoPais');
var textoDpto = document.querySelector('#textoDpto');
var textoMunicipio = document.querySelector('#textoMunicipio');
var textoComunaLocalidad = document.querySelector('#comuna_loc');
var textoSector = document.querySelector('#textoSector');
var textoDireccionPuestoVotacion = document.querySelector('#textoDireccionPuestoVotacion');
var textoMesa = document.querySelector('#textoMesa');
var textoTestigo = document.querySelector('#textoTestigo');
var textoJurado = document.querySelector('#textoJurado');
var textoPuedeVotar = document.querySelector('#textoPuedeVotar');
var textoGenero = document.querySelector('#textoGenero');

var listaPaises = document.querySelector('#selectPaises');
var listaDepartamentos = document.querySelector('#selectDptos');
var listaMunicipios = document.querySelector('#selectMunicipios');
var listaBarrios = document.querySelector('#selectBarrios');
var listaPuestosVotacion = document.querySelector('#selectPuestosVotacion');
var listaMesas = document.querySelector('#selectMesas');

var barrioOpcional = document.querySelector('#barrio_opcional');

var campoNombre = document.querySelector('#nombre');
var campoApellidos = document.querySelector('#apellidos');
var campoCelular = document.querySelector('#celular');
var campoTelefono = document.querySelector('#telefono');
var campoFechaNacimiento = document.querySelector('#fecha_nac');
var campoBarrioOpcional = document.querySelector('#barrio_opcional');
var campoDireccion = document.querySelector('#direccion');

// Informacion relacionada al amigo
var amigo = document.querySelector('#amigo').dataset;

function validarDatosPersonales() {
  var nombre = campoNombre.value.trim();
  var apellidos = campoApellidos.value.trim();
  var celular = campoCelular.value.trim();
  var telefono = campoTelefono.value.trim();
  var fechaNacimiento = campoFechaNacimiento.value.trim();

  var datosValidos = true;

  if (nombre.length == 0) {
    datosValidos = false;
    campoNombre.classList.add('error');
  } else {
    campoNombre.classList.remove('error');
  }

  if (apellidos.length == 0) {
    datosValidos = false;
    campoApellidos.classList.add('error');
  } else {
    campoApellidos.classList.remove('error');
  }


  if (document.querySelector('#genero:checked')) {
    textoGenero.classList.remove('errorTexto');
  } else {
    datosValidos = false;
    textoGenero.classList.add('errorTexto');
  }

  if (celular.length >= 10) {
    campoCelular.classList.remove('error');
  } else {
    datosValidos = false;
    campoCelular.classList.add('error');
  }

  if ((telefono.length == 0) || (telefono.length >= 7)) {
    campoTelefono.classList.remove('error');
  } else {
    datosValidos = false;
    campoTelefono.classList.add('error');
  }


  if (fechaNacimiento.length == 0) {
    datosValidos = false;
    campoFechaNacimiento.classList.add('error');
  } else {
    campoFechaNacimiento.classList.remove('error');
  }


  return datosValidos;
}

document.querySelector('#guardarDatosPersonales').addEventListener(
  'click',
  function() {
    // validarDatosPersonales();
    if (validarDatosPersonales()) {
      contenedorDatosPersonales.classList.add('ocultar');
      contenedorDireccion.classList.remove('ocultar');
      textoPais.classList.remove('ocultar');
    }
  }
);

function anteriorDireccion() {
  contenedorDireccion.classList.add('ocultar');
  contenedorDatosPersonales.classList.remove('ocultar');
  textoPais.classList.add('ocultar');
}

document.querySelector('#anteriorDireccion').addEventListener(
  'click',
  anteriorDireccion
);

function validarDireccionDatos() {
  var datosValidos = true;
  if (listaBarrios[listaBarrios.selectedIndex].innerText == 'Barrio no encontrado') {
    console.log(listaBarrios[listaBarrios.selectedIndex].innerText);
    if (campoBarrioOpcional.value.trim().length == 0) {
      campoBarrioOpcional.classList.add('error');
      datosValidos = false;
    } else {
      campoBarrioOpcional.classList.remove('error');
    }
  }

  if (campoDireccion.value.trim().length == 0) {
    campoDireccion.classList.add('error');
    datosValidos = false;
  } else {
    campoDireccion.classList.remove('error');
  }

  return datosValidos;
}

document.querySelector('#siguienteDireccion').addEventListener(
  'click',
  function() {
    // validarDireccionDatos();
    if (validarDireccionDatos()) {
      contenedorDireccion.classList.add('ocultar');
      contenedorPuestoVotacion.classList.remove('ocultar');
      textoDpto.classList.remove('ocultar');
      textoMunicipio.classList.remove('ocultar');
    }
  }
);

document.querySelector('#anteriorPuestoVotacion').addEventListener(
  'click',
  function() {
    contenedorDireccion.classList.remove('ocultar');
    contenedorPuestoVotacion.classList.add('ocultar');
    textoDpto.classList.add('ocultar');
    textoMunicipio.classList.add('ocultar');
  }
);

function validarPuestoVotacionDatos() {
  var datosValidos = true;

  if (document.querySelector('#testigo:checked')) {
    textoTestigo.classList.remove('errorTexto');
  } else {
    datosValidos = false;
    textoTestigo.classList.add('errorTexto');
  }

  if (document.querySelector('#jurado:checked')) {
    textoJurado.classList.remove('errorTexto');
  } else {
    datosValidos = false;
    textoJurado.classList.add('errorTexto');
  }

  if (document.querySelector('#puede_votar:checked')) {
    textoPuedeVotar.classList.remove('errorTexto');
  } else {
    datosValidos = false;
    textoPuedeVotar.classList.add('errorTexto');
  }

  return datosValidos;
}

document.querySelector('#siguientePuestoVotacion').addEventListener(
  'click',
  function() {
    if (validarPuestoVotacionDatos()) {
      document.querySelector('#formularioEditarAmigo').submit();
    }
  }
);


function obtenerDptos(pais_cod) {
  $.ajax({
    url: `../../controlador/departamento/obtener_departamentos_json.php?pais_cod=${pais_cod}`,
    dataType: 'JSON',
    success: function(departamentos) {
      var contenidoHtml = `<optgroup label="Selecciona un departamento:" >`;
      for (indice in departamentos) {
        contenidoHtml += (
          `<option
            value="${departamentos[indice]['dpto_cod']}"
            ${ departamentos[indice]['dpto_cod'] == amigo.dpto ? 'selected' : '' }
          >
            ${departamentos[indice]['dpto']}
          </option>`
        );
      }
      contenidoHtml += `</optgroup>`;
      listaDepartamentos.innerHTML = contenidoHtml;

      obtenerMunicipios(listaDepartamentos[listaDepartamentos.selectedIndex].value);

      textoDpto.innerHTML =  ', ' + listaDepartamentos[listaDepartamentos.selectedIndex].innerText;
    }
  });
}

listaPaises.addEventListener(
  'change',
  function() {
    textoPais.innerHTML = this.options[this.selectedIndex].dataset.textoPais;
    obtenerDptos(this.options[this.selectedIndex].value);
  }
);

function obtenerMunicipios(dpto_cod) {
  $.ajax({
    url: `../../controlador/municipio/obtener_municipios_json.php?dpto_cod=${dpto_cod}`,
    dataType: 'JSON',
    success: function(municipios) {
      var contenidoHtml = `<optgroup label="Selecciona un municipio:" >`;
      for (indice in municipios) {
        contenidoHtml += (
          `<option
            value="${municipios[indice]['municipio_cod']}"
            ${ municipios[indice]['municipio_cod'] == amigo.municipio ? 'selected' : '' }
          >${municipios[indice]['municipio']}</option>`
        );
      }
      contenidoHtml += `</optgroup>`;
      listaMunicipios.innerHTML = contenidoHtml;

      obtenerBarrios(listaMunicipios[listaMunicipios.selectedIndex].value);
      obtenerPuestosVotacion(listaMunicipios[listaMunicipios.selectedIndex].value);

      textoMunicipio.innerText = listaMunicipios[listaMunicipios.selectedIndex].innerText;
    }
  });
}

listaDepartamentos.addEventListener(
  'change',
  function() {
    obtenerMunicipios(this.options[this.selectedIndex].value);
    textoDpto.innerHTML = ', ' + listaDepartamentos[listaDepartamentos.selectedIndex].innerText;
  }
);

function obtenerBarrios(municipio_cod) {

  $.ajax({
    url: `../../controlador/barrio/obtener_barrios_json.php?municipio_cod=${municipio_cod}`,
    dataType: 'JSON',
    success: function(barrios) {
      var contenidoHtml = `<optgroup label="Selecciona un barrio:" >`;
      for (indice in barrios) {
        contenidoHtml += (
          `<option
            value="${barrios[indice]['barrio_cod']}"
            data-comuna_loc="${ barrios[indice]['comuna_numero'] + (barrios[indice]['nombre_comuna_loc'] == 0? '' : ' ' + barrios[indice]['nombre_comuna_loc']) }"
            ${ barrios[indice]['barrio_cod'] == amigo.barrio ? 'selected' : '' }
          >${ barrios[indice]['barrio'] }</option>`
        );
      }
      contenidoHtml += `</optgroup>`;
      listaBarrios.innerHTML = contenidoHtml;

      textoComunaLocalidad.innerHTML = 'Comuna/Localidad: ' + listaBarrios.options[listaBarrios.selectedIndex].dataset.comuna_loc;

      alternarVisibilidadCampoBarrio();
    }
  });
}

function obtenerPuestosVotacion(municipio_cod) {
  $.ajax({
    url: `../../controlador/puestoVotacion/obtener_puestos_votacion_json.php?municipio_cod=${municipio_cod}`,
    dataType: 'JSON',
    success: function(puestosVotacion) {
      var contenidoHtml = `<optgroup label="Selecciona un puesto de votación:" >`;
      for (indice in puestosVotacion) {
        contenidoHtml += (
          `<option
            value="${puestosVotacion[indice]['puesto_cod']}"
            data-mesas-puesto="${puestosVotacion[indice]['mesas_puesto']}"
            data-sector="${puestosVotacion[indice]['sector']}"
            data-direccion-puesto-votacion="${puestosVotacion[indice]['direccion_puesto']}"
            ${ puestosVotacion[indice]['puesto_cod'] == amigo.puesto ? 'selected' : '' }
          >${ puestosVotacion[indice]['puesto_de_votacion'] }</option>`
        );
      }
      contenidoHtml += `</optgroup>`;
      listaPuestosVotacion.innerHTML = contenidoHtml;
      actualizarSectorYDireccionPuestoVotacion();
    }
  });
}

function actualizarSectorYDireccionPuestoVotacion() {
  textoSector.innerText = listaPuestosVotacion[listaPuestosVotacion.selectedIndex].dataset.sector;

  textoDireccionPuestoVotacion.innerText = listaPuestosVotacion[listaPuestosVotacion.selectedIndex].dataset.direccionPuestoVotacion;

  textoMesa.innerText = listaPuestosVotacion[listaPuestosVotacion.selectedIndex].dataset.mesasPuesto;

  generarDatosMesaNumero(parseInt(listaPuestosVotacion[listaPuestosVotacion.selectedIndex].dataset.mesasPuesto));
}

function generarDatosMesaNumero(mesasPuesto) {
  var contenidoHtml = `<optgroup label="Selecciona un # de mesa:" >`;
  for (indice = 1; indice <= mesasPuesto; indice++) {
    contenidoHtml += (
      `<option
        value="${ indice }"
        ${ indice == amigo.mesa? "selected" : ""}
      >${ indice }</option>`
    );
  }
  contenidoHtml += `</optgroup>`;

  listaMesas.innerHTML = contenidoHtml;
}



listaPuestosVotacion.addEventListener(
  'change',
  function() {
    actualizarSectorYDireccionPuestoVotacion();
    generarDatosMesaNumero(parseInt(listaPuestosVotacion[listaPuestosVotacion.selectedIndex].dataset.mesasPuesto));
  }
);

function alternarVisibilidadCampoBarrio() {
  if (listaBarrios[listaBarrios.selectedIndex].innerText == 'Barrio no encontrado') {
    barrioOpcional.classList.remove('ocultar');
  } else {
    barrioOpcional.classList.add('ocultar');
  }
}

listaMunicipios.addEventListener(
  'change',
  function() {
    obtenerBarrios(this.options[this.selectedIndex].value);
    textoMunicipio.innerText = listaMunicipios[listaMunicipios.selectedIndex].innerText;
  }
);

listaBarrios.addEventListener(
  'change',
  function() {
    textoComunaLocalidad.innerHTML = 'Comuna/Localidad: ' + this.options[this.selectedIndex].dataset.comuna_loc;
    alternarVisibilidadCampoBarrio();
  }
);

(function() {
  console.log(amigo);
  obtenerDptos(parseInt(amigo.pais));
}());
