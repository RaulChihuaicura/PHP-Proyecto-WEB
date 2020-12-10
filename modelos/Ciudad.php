<?php
//Incluimos inciialmente la conexion a la base de datos 
require "../config/Conexion.php";

//creando clase
Class Ciudad
{
    public function __construct()
    {

    }

    //Implementamos un metodo para insertar registros
    public function insertar($descripcion)
    {
        $sql = "INSERT INTO ciudad (descripcion)
                VALUES ('$descripcion')";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para mostrar los datos de un registro o modificar
    public function mostrar($idciudad)
    {
        $sql="SELECT * FROM ciudad WHERE idciudad='$idciudad'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listarc()
    {
        $sql="SELECT * FROM ciudad";
        return ejecutarConsulta($sql);
    }

    //listar los registros para mostrar en SELECT
    public function select()
    {
        $sql="SELECT * FROM ciudad";
        return ejecutarConsulta($sql);
    }

}
?>