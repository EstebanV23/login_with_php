<?php 

class RolDao extends Connection
{
    public function __construct()
    {
        $this->conectar();
    }
    //Funcion para insertar un nuevo usuario
    public function insertar(Rol $rol)
    {
        $sql = mysqli_query($this->connected, "INSERT INTO tbl_rol(rol_nom, rol_des) VALUES ('{$rol->getNombre()}','{$rol->getDescripcion()}');");
        //Retornamos la query para saber si se hizo correctamente o no
        return $sql;
    }

    //Funcion para traer a todos los Usuarios
    public function listar_todos_roles_disponibles($rol_peticion = 1)
    {
        $query = "SELECT * FROM tbl_rol WHERE rol_est = 1 ";
        if($rol_peticion == 2){
            $query = $query . "AND rol_id != $rol_peticion AND rol_id != 3;";
        }
        if($rol_peticion == 3){
            $query = $query . " AND rol_id != $rol_peticion";
        }
        
        $sql = mysqli_query($this->connected, $query);//Retornamos la query para saber si retorna filas
        $lista_roles = [];//Creamos un array para guardar los objetos
        if($sql->num_rows > 0){
            while ($row = mysqli_fetch_array($sql)) {
                $rol = new Rol(); //Creamos un nuevo objeto rol
                //En sus metodos set llenamos los valores para crear el objeto
                $rol->setId($row['rol_id']);
                $rol->setNombre($row['rol_nom']);
                $rol->setDescripcion($row['rol_des']);
                $rol->setEstado($row['rol_est']);
                
                //Guardamos el objeto en el array para devolverlo
                array_push($lista_roles, $rol);
            }
        }
        return $lista_roles;
    }

}

?>