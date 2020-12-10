<?php
//Incluimos inciialmente la conexion a la base de datos 
require "../config/Conexion.php";

//creando clase
Class Permiso
{
    public function __construct()
    {

    }

    //Implementar un metodo para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }


}
?>