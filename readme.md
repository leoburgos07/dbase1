## Método de los controladores
 - index - listado de registros
 - create - formulario de creacion
 - store - operacion de guardar en bd
 - edit - formulario de edicion
 - update - operacion de edicion en bd
 - delete - operacion de borrado (fuerte o debil)


## Verbos mas usados HTTP/HTTPS
 - POST
 - GET
 - PATCH
 - DELETE

## API: Application Programming Interface
## AJAX - Asynchornous JAvascript Xtension
 - JSON: JavaScript Object Notation
  JSON Viewer Pro
  Llave: valor
  Llorar: Acción y efecto de llorar

  {
    "nombre": "Juan Camilo",
    "apellidos": "Lopez Luna",
    "edad": 15,
    "vehiculo": {
      tipo: "Moto",
      placa: "ACF7UJ"
    }
  }

## Pasos para el registo y autenticación de líderes
1. Digitar la cédula (AJAX)
2. Validaciones
   2.1. Exista la cedula registrada en la tabla de amigos
     2.1.1. Existe como amigo
        2.1.1.1 Validar si existe como lider
           A. Existe, debe pedir la contraseña e iniciar sesion
           B. No existe, pedir contraseña y confirmacion de la contraseña
     2.1.2 No existe como amigo: le podemos mostrar un mensaje con un enlace para que se registre como amigo
