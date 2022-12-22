const username = document.getElementById('username');
const password = document.getElementById('password');
const enviar = document.getElementById('enviar');
const mensajeUsername = document.getElementById('mensajeUsername');
const mensajePassword = document.getElementById('mensajePassword');

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

