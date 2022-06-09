var dBuscarPorCedula = document.querySelector("#buscarPorCedula");
var dEditarAmigo = document.querySelector("#editarAmigo");
var dCedula = document.querySelector("#cedula");
var dCedulaLider = document.querySelector(".cedulaLider");
var dResultadoContenedor = document.querySelector(".resultadoContenedor");
var dTablaResultado = document.querySelector(".tablaResultado");
var dCedulaEncontrada = document.querySelector("#cedulaEncontrada");
var ningunLider = document.querySelector("#ningunLiderEncontrado");
var perfilUsuario = document.querySelector('#perfil');
var botonEliminarAmigo = document.querySelector('#eliminarAmigo')

function validarCedula() {
  var cedula = dCedula.value.trim();
  var cedulaValida = true;
  if (cedula.length == 0) {
    cedulaValida = false;
    dCedula.classList.add("error");
  } else {
    dCedula.classList.remove("error");
  }

  return cedulaValida;
}

function consultarPorCedula() {
  if (validarCedula()) {
    var peticionDatos = {
      cedula: dCedula.value.trim(),
      cedula_lider: dCedulaLider.value.trim(),
      perfil_usuario : perfilUsuario.value.trim()
    };

    $.ajax({
      type: "POST",
      url: `../../controlador/lider/consultar_por_cedula_json.php`,
      dataType: "JSON",
      data: peticionDatos,
      success: function (amigo) {
        if(amigo){
          if(amigo.length == 0){
            ningunLider.classList.remove("ocultar");
          }else{
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
        console.log(err);
      },
    });
  }
}

dBuscarPorCedula.addEventListener("click", consultarPorCedula);

function editarAmigo() {
  window.location.href =
    document.querySelector("#sitioEditar").value + dCedulaEncontrada.value;
}
function eliminarAmigo(){
  var peticionDatos = {
    cedula: dCedula.value.trim()
  };
  
  $.ajax({
    type: "POST",
    url: `../../controlador/lider/eliminar_amigo.php`,
    dataType: "JSON",
    data: peticionDatos,
    success: function () {
      alert("Amigo eliminado correctamente");
      location.reload();
    },
    error: function (err) {
      console.log(err);
    },
  });
}

//botonEliminarAmigo.addEventListener("click",eliminarAmigo);
dEditarAmigo.addEventListener("click", editarAmigo);
