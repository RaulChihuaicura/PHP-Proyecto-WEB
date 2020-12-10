<?php
require_once "../modelos/Permiso.php";

$permiso=new Permiso();

//evaluacion de operacion para ejecutar
switch ($_GET["op"]){
    case 'listar':
        $rspta=$permiso->listar();
        //vamos a declarar un array
        $data= Array();

         while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0" =>$reg->nombre,

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