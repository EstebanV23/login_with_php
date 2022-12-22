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

function limpiar(...props)
{
    props.forEach(prop => {
        prop.innerHTML = "";
    })
}

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