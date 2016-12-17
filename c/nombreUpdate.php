<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$nombrePersona=$data->nombrePersona;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$nombrePersona=$_REQUEST['nombrePersona'];
}


require_once '../m/Persona.php';
$Update = new Persona();
$UPDATE = $Update->nombreUpdate($idPersona,$nombrePersona);


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