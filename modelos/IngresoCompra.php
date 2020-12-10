<?php
//Incluimos inciialmente la conexion a la base de datos 
require "../config/Conexion.php";

//creando clase
Class IngresoCompra
{
    public function __construct()
    {

    }

    //Implementamos un metodo para insertar registros
    public function insertar($rut, $dv, $tipodocumento, $nrodcto, $razonsocial, $neto, $iva, $total, $fecha_dcto, $fecha_proceso, $estado, $idempresa, $idusuario)
    {
        $sql = "INSERT INTO usuario (nombre, rut, direccion, telefono, email, cargo, login, clave, imagen, condicion)
                VALUES ('$nombre','$rut', '$direccion', '$telefono', '$email', '$cargo', '$login', '$clave', '$imagen', '1')";
        //return ejecutarConsulta($sql);
        $idusuarionew=ejecutarConsulta_retornarID($sql);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos))
        {
          $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES ('$idusuarionew', '$permisos[$num_elementos]')";
          ejecutarConsulta($sql_detalle) or $sw = false;

          $num_elementos=$num_elementos + 1;
        }
        return $sw;
    }

    public function editar($idusuario, $nombre, $rut, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos)
    {
        $sql="UPDATE usuario SET nombre = '$nombre',
                                    rut = '$rut',
                              direccion = '$direccion',
                               telefono = '$telefono',
                                  email = '$email',
                                  cargo = '$cargo',
                                  login = '$login',
                                  clave = '$clave',
                                 imagen = '$imagen'
              WHERE idusuario='$idusuario'";
        ejecutarConsulta($sql);  

        //eliminamos todos los permisos asignados para volverlos a registrar
        $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
        ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos))
        {
          $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES ('$idusuario', '$permisos[$num_elementos]')";
          ejecutarConsulta($sql_detalle) or $sw = false;

          $num_elementos=$num_elementos + 1;
        }
        return $sw;           
    }

    //implementar un metodo para desactivar categoria
    public function desactivar($idusuario)
    {
        $sql="UPDATE usuario SET condicion='0'
              WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

     public function activar($idusuario)
    {
        $sql="UPDATE usuario SET condicion='1'
              WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para mostrar los datos de un registro o modificar
    public function mostrar($idusuario)
    {
        $sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM usuario";
        return ejecutarConsulta($sql);
    }

    public function listarmarcados($idusuario)
    {
        $sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function verificar($login, $clave)
    {
      $sql="SELECT idusuario, nombre, rut, telefono, email, cargo, imagen, login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1' ";

      return ejecutarConsulta($sql);
    }

}
?>