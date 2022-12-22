let id = document.getElementById('id');
let nombre = document.getElementById('nombre');
let apellido = document.getElementById('apellido');
let email = document.getElementById('email');
let username = document.getElementById('username');
let nombreMensaje = document.getElementById('nombreMensaje');
let apellidoMensaje = document.getElementById('apellidoMensaje');
let emailMensaje = document.getElementById('emailMensaje');
let usernameMensaje = document.getElementById('usernameMensaje');
let botonEnviar = document.getElementById('botonEnviar');

const validarNombreActualizar = () => validarTexto(nombre, nombreMensaje, 'Datos correctos', 'El nombre no puede estar vacío');

const validarApellidoActualizar = () => validarTexto(apellido, apellidoMensaje, 'Datos correctos', 'El apellido no puede estar vacío');

const validarEmailActualizar = () => validarEmail(email, emailMensaje, 'Datos correctos', 'El email debe contener @ y terminar en un dominio válido');

const validarUsernameActualizar = () => validarGeneral(username, usernameMensaje, 'Datos correctos', 'El username no puede tener espacios y no debe estar vacío');

function validarActualizacion(){

    (validarNombreActualizar() && validarApellidoActualizar() && validarEmailActualizar() && validarUsernameActualizar())? botonEnviar.type = 'submit' : botonEnviar.type = 'button';
}

function limpiarFormulario(){
    limpiar(nombreMensaje, apellidoMensaje, emailMensaje, usernameMensaje)
}