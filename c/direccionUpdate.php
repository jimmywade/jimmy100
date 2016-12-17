<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$direccionPersona=$data->direccionPersona;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$direccionPersona=$_REQUEST['direccionPersona'];
}


require_once '../m/Persona.php';
$Update = new Persona();
$UPDATE = $Update->direccionUpdate($idPersona,$direccionPersona);


if($UPDATE == true){
	$Read = new Persona();
	$READ = $Read->profileReload($idPersona);
}else{
	$rows = array();
	$r['success']=0;
	$r['message']='no se pudo ejecutar la consulta UPDATE';
    $rows[] = $r;
    echo json_encode($rows);
}





?>