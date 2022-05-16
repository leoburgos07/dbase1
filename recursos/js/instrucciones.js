function captura_cedula() {
  var cedula_var_id = document.querySelector('#cedula_id').value;
  var cedula_verificada = document.getElementById("cedula_verificada");


  localStorage.setItem('cedula', cedula_var_id);

  cedula_verificada.innerHTML = cedula_var_id.value;
}

// document.querySelector('#cedula_id').value
// document.querySelector('.cedula_id').value

// document.getElementById('cedula_id').value
// document.getElementByClass('cedula_id').value
