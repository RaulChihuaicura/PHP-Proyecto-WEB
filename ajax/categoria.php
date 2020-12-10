<?php
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

$idcategoria = isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$condicion = isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]):"";


//evaluacion de operacion para ejecutar
switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idcategoria)){
            $rspta=$categoria->insertar($nombre, $condicion);
            echo $rspta ? "Categoria registrada" : "Categoria no se pudo registrar";
        }
        else
        {
            $rspta=$categoria->editar($idcategoria, $nombre);
            echo $rspta ? "Categoria actualizada" : "Categoria no se pudo actualizar";
        }
    break;

    case 'desactivar':
            $rspta=$categoria->desactivar($idcategoria);
            echo $rspta ? "Categoria Desactivada" : "Categoria no se pudo desactivar";
    break;

    case 'activar':
            $rspta=$categoria->activar($idcategoria);
            echo $rspta ? "Categoria Activada" : "Categoria no se pudo activar";
    break;

    case 'mostrar':
            $rspta=$categoria->mostrar($idcategoria);
            echo json_encode($rspta); 
    break;

    case 'listar':
        $rspta=$categoria->listar();
        //vamos a declarar un array
        $data= Array();

         while ($reg=$rspta->fetch_object()){
            $data[]=array(
                  
                "0" =>$reg->nombre,
                "1" =>$reg->condicion?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>',
                "2"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fas fa-edit"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="far fa-trash-alt"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fas fa-edit"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>'
        );
    }
    $results = array(
        "sEcho"=>1, //informacion para el datatables
        "iTotalRecords"=>count($data), //enviamos el total registros al databable
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
    echo json_encode($results);
    
    break;
}



?>