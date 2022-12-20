let passwordConfirmada = document.getElementById("passwordConfirmada");
let mensajePasswordConfirmada = document.getElementById("mensajePasswordConfirmada");
let nombre = document.getElementById("nombre");
let mensajeNombre = document.getElementById("mensajeNombre");
let apellido = document.getElementById("apellido");
let mensajeApellido = document.getElementById("mensajeApellido");
let email = document.getElementById("email");
let mensajeEmail = document.getElementById("mensajeEmail");
let registro = document.getElementById("registro");
let borrar = document.getElementById("borrar");

const patronEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

const validarEmail = (elemento, espacioMensaje, mensajePositivo, mensajeNegativo) =>
{
    elemento.value = elemento.value.trim();
    if(patronEmail.test(elemento.value) && !espaciosBlancos.test(elemento.value))
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

const validarConfirmarPassword = (passwordPrincipal, passwordConfirmar, espacioMensaje, mensajePositivo, mensajeNegativo) =>
{
    if(passwordPrincipal.value === passwordConfirmar.value)
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

const validacionNombre = () => validarTexto(nombre, mensajeNombre, "Campo Correcto", "Valores no válidos");

const validacionApellido = () => validarTexto(apellido, mensajeApellido, "Campo Correcto", "Valores no válidos");

const validacionEmail = () => validarEmail(email, mensajeEmail, "Campo Correcto", "El email debe contener @ y contener un ., sin espacios en blanco");

const validacionIgualPassword = () => validarConfirmarPassword(password, passwordConfirmada, mensajePasswordConfirmada, "Contraseña correcta", "Las contraseñas no coinciden");

nombre.addEventListener("input", ()=>
{
    validacionNombre();
})

apellido.addEventListener("input", ()=>
{
    validacionApellido();
})

email.addEventListener("input", ()=>
{
    validacionEmail();
})

function validarRegistro()
{
    (validacionNombre() && validacionApellido() && validacionEmail() && validacionUsername() && validacionPassword() && validacionIgualPassword()) ? registro.type = "submit" : registro.type = "button";
}

function limpiar(...props)
{
    props.forEach(prop => {
        prop.innerHTML = "";
    })
}

borrar.addEventListener("click", () =>{
    limpiar(mensajeApellido, mensajeEmail, mensajeUsername, mensajeNombre, mensajePasswordConfirmada, mensajePassword);
})
