<?php

include_once 'validaciones.php';

class ValidacionErrores extends Validaciones
{
    /* Funcion para validar que tipo de error puede venir, pudiendo venir datos vacios */
    public function validacion_errores($envio_formulario, array $datos_validar ) : array{
        
        if(!isset($envio_formulario)){
            return ["fail", "Los datos no han sido enviados por el formulario"];
        }
        foreach ($datos_validar as $dato){
            if(!($this->validarEntradas($dato))){
                return ["fail", "Los datos están incompletos"];
            }
            if(!($this->validarSize($dato))){
                return ["fail", "Los tamaños no son correctos"];
            }
        }

        return ["success", "Los datos han sido enviados correctamente"];
    }

}

?>