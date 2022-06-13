var botonBuscarPorNombre = document.querySelector("#buscarPorNombre");
var botonEditarAmigo = document.querySelector("#editarAmigo");
var campoNombre = document.querySelector("#nombre");
var campoCedulaLider = document.querySelector(".cedulaLider");
var divResultadoContenedor = document.querySelector(".resultadoContenedor");
var tablaResultado = document.querySelector(".tablaResultado");
var cedulaEncontrada = document.querySelector("#cedulaEncontrada");
var listaLideres = document.querySelector("#selectLideres");
var sitioEditar = document.querySelector("#sitioEditar");
var ningunLider = document.querySelector("#ningunLiderEncontrado");
var perfilUsuario = document.querySelector('#perfil');

function validarCampoNombre() {
  var esValido = true;
  var nombreV = campoNombre.value.trim();

  if (nombreV.length == 0) {
    esValido = false;
    campoNombre.classList.add("error");
  } else {
    campoNombre.classList.remove("error");
  }

  return esValido;
}

function consultarLiderPorNombre({ indiceLista }) {
  if (validarCampoNombre()) {
    var peticionDatos = {
      nombre: campoNombre.value.trim(),
      cedula_lider: campoCedulaLider.value.trim(),
      perfil_usuario : perfilUsuario.value.trim()
    };

    $.ajax({
      type: "POST",
      url: `../../controlador/lider/consultar_por_nombre_json.php`,
      dataType: "JSON",
      data: peticionDatos,
      success: function (amigos) {
        if (amigos.length > 0) {
          divResultadoContenedor.classList.remove("ocultar");
          listaLideres.classList.remove("ocultar");
          ningunLider.classList.add("ocultar");
        } else {
          listaLideres.classList.add("ocultar");
          divResultadoContenedor.classList.add("ocultar");
          ningunLider.classList.remove("ocultar");
        }

        var contenidoHtml = `<optgroup label="Selecciona un amigo:" >`;

        for (var indice in amigos) {
          if (indiceLista != undefined) {
            if (
              amigos[indice]["NombreCompleto"] ==
              amigos[indiceLista]["NombreCompleto"]
            ) {
              contenidoHtml += `<option
              value="${amigos[indice]["cedula"]}"
              data-celular="${amigos[indice]["celular"]}"
              data-pais-dpto="${amigos[indice]["paisDpto"]}"
              data-municipio="${amigos[indice]["municipio"]}"
              data-nombre-completo="${amigos[indice]["NombreCompleto"]}"
              data-cedula="${amigos[indice]["cedula"]}"
            selected>${amigos[indice]["NombreCompleto"]}</option>`;
            } else {
              contenidoHtml += `<option
              value="${amigos[indice]["cedula"]}"
              data-celular="${amigos[indice]["celular"]}"
              data-pais-dpto="${amigos[indice]["paisDpto"]}"
              data-municipio="${amigos[indice]["municipio"]}"
              data-nombre-completo="${amigos[indice]["NombreCompleto"]}"
              data-cedula="${amigos[indice]["cedula"]}"
            >${amigos[indice]["NombreCompleto"]}</option>`;
              actualizarTablaResultado(amigos[indiceLista]);
            }
          } else {
            contenidoHtml += `<option
              value="${amigos[indice]["cedula"]}"
              data-celular="${amigos[indice]["celular"]}"
              data-pais-dpto="${amigos[indice]["paisDpto"]}"
              data-municipio="${amigos[indice]["municipio"]}"
              data-nombre-completo="${amigos[indice]["NombreCompleto"]}"
              data-cedula="${amigos[indice]["cedula"]}"
            >${amigos[indice]["NombreCompleto"]}</option>`;
          }
        }
        contenidoHtml += `</optgroup>`;
        listaLideres.innerHTML = contenidoHtml;
      },
      error: function (err) {
        console.log(err);
      },
    });
  } else {
    return;
  }
}

function actualizarTablaResultado(amigo) {
  var tablaContenido = `<tr>
  <td class="ancho30">Cédula</td>
  <td class="texto30">${amigo.cedula}</td>
</tr>
<tr>
  <td>Nombre</td>
  <td class="texto30">${amigo.NombreCompleto}</td>
</tr>
<tr>
  <td>Genero</td>
  <td class="texto30">${amigo.genero}</td>
</tr>

<tr>
  <td>Celular</td>
  <td class="texto30">${amigo.celular}</td>
</tr>
<tr>
  <td>Teléfono</td>
  <td class="texto30">${amigo.telefono}</td>
</tr>
<tr>
  <td>Correo</td>
  <td class="texto30">${amigo.correo}</td>
</tr>
<tr>
  <td>Fecha de nac.</td>
  <td class="texto30">${amigo.fechaNacimiento}</td>
</tr>
<tr>
  <td>Pais</td>
  <td class="texto30">${amigo.pais}</td>
</tr>
<tr>
  <td>Dpto</td>
  <td class="texto30">${amigo.dpto}</td>
</tr>
<tr>
  <td>Municipio</td>
  <td class="texto30">${amigo.municipio}</td>
</tr>
<tr>
  <td>Barrio</td>
  <td class="texto30">${amigo.barrio}</td>
</tr>
<tr>
  <td>Barrio opcional</td>
  <td class="texto30">${amigo.barrioOpcional}</td>
</tr>

<tr>
  <td>Direccion</td>
  <td class="texto30">${amigo.direccion}</td>
</tr>

<tr>
  <td>Puesto vot.</td>
  <td class="texto30">${amigo.puestoDeVotacion}</td>
</tr>

<tr>
  <td>Mesa</td>
  <td class="texto30">${amigo.mesa}</td>
</tr>

<tr>
  <td>Puede votar</td>
  <td class="texto30">${amigo.puedeVotar}</td>
</tr>

<tr>
  <td>Es jurado</td>
  <td class="texto30">${amigo.esJurado}</td>
</tr>

<tr>
  <td>Es testigo</td>
  <td class="texto30">${amigo.esTestigo}</td>
</tr>`;
  tablaResultado.innerHTML = tablaContenido;
  campoCedulaLider.value = amigo.cedula;
}

listaLideres.addEventListener("change", function () {
  var indice = listaLideres.selectedIndex;
  consultarLiderPorNombre({ indiceLista: indice });
});
botonBuscarPorNombre.addEventListener("click", consultarLiderPorNombre);

botonEditarAmigo.addEventListener("click", editarAmigo);

function editarAmigo() {
  alert(sitioEditar.value + campoCedulaLider.value);
  location.href = sitioEditar.value + campoCedulaLider.value;
}
