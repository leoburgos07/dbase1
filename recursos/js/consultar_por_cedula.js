const dBuscarPorCedula = document.querySelector("#buscarPorCedula");
const dEditarAmigo = document.querySelector("#editarAmigo");
const dCedula = document.querySelector("#cedula");
const dCedulaLider = document.querySelector(".cedulaLider");
const dResultadoContenedor = document.querySelector(".resultadoContenedor");
const dTablaResultado = document.querySelector(".tablaResultado");
const dCedulaEncontrada = document.querySelector("#cedulaEncontrada");
const ningunLider = document.querySelector("#ningunLiderEncontrado");
const perfilUsuario = document.querySelector("#perfil");
const botonEliminarAmigo = document.querySelector("#eliminarAmigo");
var sitioEditar = document.querySelector('#sitioEditar');


function validarCedula() {
  let cedula = dCedula.value.trim();
  let cedulaValida = true;
  if (cedula.length == 0) {
    cedulaValida = false;
    dCedula.classList.add("error");
  } else {
    dCedula.classList.remove("error");
  }

  return cedulaValida;
}

function consultarPorCedula() {
  const cedulaValidada = validarCedula();
  if (cedulaValidada) {
    let peticionDatos = {
      cedula: dCedula.value.trim(),
      cedula_lider: dCedulaLider.value.trim(),
      perfil_usuario: perfilUsuario.value.trim(),
    };
    $.ajax({
      type: "POST",
      url: `../../controlador/lider/consultar_por_cedula_json.php`,
      dataType: "JSON",
      data: peticionDatos,
      success: function (amigo) {
        if (amigo) {
          if (amigo.length == 0) {
            ningunLider.classList.remove("ocultar");
          } else {
            ningunLider.classList.add("ocultar");
          }
        }

        if (amigo["cedula"] !== undefined) {
          dCedulaEncontrada.value = amigo.cedula;
          dResultadoContenedor.classList.remove("ocultar");

          var tablaContenido = `<tr>
              <td class="ancho30">Cédula</td>
              <td class="texto30">${amigo.cedula}</td>
            </tr>
            <tr>
              <td>Nombre</td>
              <td class="texto30">${amigo.nombre + " " + amigo.apellidos}</td>
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
          dTablaResultado.innerHTML = tablaContenido;
        } else {
          dResultadoContenedor.classList.add("ocultar");
        }
      },
      error: function (err) {
        console.error(err);
      },
    });
  }
}
dBuscarPorCedula.addEventListener("click", consultarPorCedula);

function editarAmigo() {
  location.href = sitioEditar.value + dCedulaEncontrada.value;
}
// function eliminarAmigo() {
//   var peticionDatos = {
//     cedula: dCedula.value.trim(),
//   };

//   $.ajax({
//     type: "POST",
//     url: `../../controlador/lider/eliminar_amigo.php`,
//     dataType: "JSON",
//     data: peticionDatos,
//     success: function () {
//       alert("Amigo eliminado correctamente");
//       location.reload();
//     },
//     error: function (err) {
//       console.log(err);
//     },
//   });
// }
dEditarAmigo.addEventListener("click", editarAmigo);
//botonEliminarAmigo.addEventListener("click",eliminarAmigo);

