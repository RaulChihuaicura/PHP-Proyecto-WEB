<?php
require_once "../modelos/Ciudad.php";

$ciudad=new Ciudad();

$idciudad = isset($_POST["idciudad"])? limpiarCadena($_POST["idciudad"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

//evaluacion de operacion para ejecutar
switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idciudad)){
            $rspta=$ciudad->insertar($descripcion);
            echo $rspta ? "Ciudad registrada" : "Ciudad no se pudo registrar";
        }
        else
        {
            $rspta=$ciudad->editar($idciudad, $descripcion);
            echo $rspta ? "Ciudad actualizada" : "Ciudad no se pudo actualizar";
        }
    break;

    case 'eliminar':
            $rspta=$ciudad->eliminar($idciudad);
            echo $rspta ? "Ciudad Eliminada" : "Ciudad no se pudo Eliminar";
    break;

    case 'mostrar':
            $rspta=$ciudad->mostrar($idciudad);
            echo json_encode($rspta); 
    break;

    case 'listar':
        $rspta=$ciudad->listarc();
        //vamos a declarar un array
        $data= Array();
           while ($reg=$rspta->fetch_object()){
            $data[]=array(
            	"0"=>$reg->descripcion,
                "1"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idciudad.')"><i class="fas fa-edit"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idciudad.')"><i class="far fa-trash-alt"></i></button>'
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