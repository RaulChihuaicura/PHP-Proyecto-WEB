<?php
//Incluimos inciialmente la conexion a la base de datos 
require "../config/Conexion.php";

//creando clase
Class Categoria
{
    public function __construct()
    {

    }

    //Implementamos un metodo para insertar registros
    public function insertar($nombre, $condicion)
    {
        $sql = "INSERT INTO categoria (nombre, condicion)
                VALUES ('$nombre','$condicion')";
        return ejecutarConsulta($sql);
    }

    public function editar($idcategoria, $nombre)
    {
        $sql="UPDATE categoria SET nombre='$nombre'
              WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);             
    }

    //implementar un metodo para desactivar categoria
    public function desactivar($idcategoria)
    {
        $sql="UPDATE categoria SET condicion='0'
              WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

     public function activar($idcategoria)
    {
        $sql="UPDATE categoria SET condicion='1'
              WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para mostrar los datos de un registro o modificar
    public function mostrar($idcategoria)
    {
        $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }

    //listar los registros para mostrar en SELECT
    public function selectcategoria()
    {
        $sql="SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }

    //SUB - CATEGORIA
    public function insertarsub($idcategoria, $nombre, $condicion)
    {
        $sql = "INSERT INTO subcategoria (categoria, nombre, condicion)
                VALUES ($idcategoria, '$nombre', $condicion)";
        return ejecutarConsulta($sql);
    }

    public function editarsub($idsubcategoria, $categoria, $nombre)
    {
        $sql="UPDATE subcategoria SET categoria='$categoria', nombre='$nombre'
              WHERE idsubcategoria='$idsubcategoria'";
        return ejecutarConsulta($sql);             
    }

    //implementar un metodo para desactivar categoria
    public function desactivarsub($idsubcategoria)
    {
        $sql="UPDATE subcategoria SET condicion='0'
              WHERE idsubcategoria='$idsubcategoria'";
        return ejecutarConsulta($sql);
    }

     public function activarsub($idsubcategoria)
    {
        $sql="UPDATE subcategoria SET condicion='1'
              WHERE idsubcategoria='$idsubcategoria'";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para mostrar los datos de un registro o modificar
    public function mostrarsub($idsubcategoria)
    {
        $sql="SELECT * FROM subcategoria WHERE idsubcategoria='$idsubcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listarsub()
    {
        $sql="SELECT SC.idsubcategoria, C.nombre as categoria, SC.nombre, SC.condicion
              FROM subcategoria as SC
              INNER JOIN CATEGORIA as C
              ON SC.categoria = C.idcategoria
              order by C.nombre asc";
        return ejecutarConsulta($sql);
    }

    //listar los registros para mostrar en SELECT
    public function selectsub()
    {
        $sql="SELECT * FROM subcategoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
    
    public function selectsubcategoria($padre)
    {
        $sql="SELECT idsubcategoria, nombre FROM subcategoria WHERE categoria='$padre' ORDER BY nombre asc";
        return ejecutarConsulta($sql);
    }
}
?>