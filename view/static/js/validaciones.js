const username = document.getElementById('username');
const password = document.getElementById('password');
const enviar = document.getElementById('enviar');
const mensajeUsername = document.getElementById('mensajeUsername');
const mensajePassword = document.getElementById('mensajePassword');

const patron = /^\w{4,}/;
const espaciosBlancos = /\s/;


const validarGeneral = (elemento, espacioMensaje, mensajePositivo, mensajeNegativo) =>
{
    elemento.value = elemento.value.trim();
    if(patron.test(elemento.value) && !espaciosBlancos.test(elemento.value))
    {
        espacioMensaje.innerHTML = mensajePositivo;
        espacioMensaje.setAttribute("class", "realizado");
        return true;
    }else
    {
        espacioMensaje.innerHTML = mensajeNegativo;
        espacioMensaje.setAttribute("class", "error");
    }
    return false;
}

const validarTexto = (elemento, espacioMensaje, mensajePositivo, mensajeNegativo) =>
{
    if(patron.test(elemento.value))
    {
        espacioMensaje.innerHTML = mensajePositivo;
        espacioMensaje.setAttribute("class", "realizado");
        return true;
    }else
    {
        espacioMensaje.innerHTML = mensajeNegativo;
        espacioMensaje.setAttribute("class", "error");
    }
    return false;
}

let validacionUsername = () => validarGeneral(username, mensajeUsername, "Valores correctos", "Valores incorrectos");

let validacionPassword = () => validarGeneral(password, mensajePassword, "Valores correctos", "Valores incorrectos");

username.addEventListener('input', validacionUsername);

password.addEventListener('input', validacionPassword);

function validar()
{
    if(validacionUsername() && validacionPassword()) enviar.type = "submit";
    else enviar.type = "button";
}

let cambioPassword = true;
const visibilidad = document.getElementById("visibilidad");


function cambiar(elemento, cambio)
{
    if(cambio)
    {
        visibilidad.innerHTML = "visibility_off";
        elemento.type = "text";
    }else
    {
        visibilidad.innerHTML = "visibility";
        elemento.type = "password";
    }
    return !cambio;
}

visibilidad.addEventListener("click", () =>
{
    
    if(typeof passwordConfirmada == "undefined")
    {
        cambioPassword = cambiar(password, cambioPassword)
    }else
    {
        cambiar(passwordConfirmada, cambioPassword);
        cambioPassword = cambiar(password, cambioPassword);
    }
})

