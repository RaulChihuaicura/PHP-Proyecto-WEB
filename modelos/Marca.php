<?php
//Incluimos inciialmente la conexion a la base de datos 
require "../config/Conexion.php";

//creando clase
Class Marca
{
    public function __construct()
    {

    }

    //Implementamos un metodo para insertar registros
    public function insertar($descripcion)
    {
        $sql = "INSERT INTO marca (descripcion)
                VALUES ('$descripcion')";
        return ejecutarConsulta($sql);
    }

    public function editar($idmarca, $descripcion)
    {
        $sql="UPDATE marca SET descripcion='$descripcion'
              WHERE idmarca='$idmarca'";
        return ejecutarConsulta($sql);             
    }

    //implementar un metodo para desactivar categoria
    public function eliminar($idmarca)
    {
        $sql="DELETE FROM marca WHERE idmarca='$idmarca'";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para mostrar los datos de un registro o modificar
    public function mostrar($idmarca)
    {
        $sql="SELECT * FROM marca WHERE idmarca='$idmarca'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM marca";
        return ejecutarConsulta($sql);
    }

    //listar los registros para mostrar en SELECT
    public function select()
    {
        $sql="SELECT * FROM marca";
        return ejecutarConsulta($sql);
    }

}
?>