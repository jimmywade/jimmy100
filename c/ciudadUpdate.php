<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$idCiudad=$data->idCiudad;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$idCiudad=$_REQUEST['idCiudad'];
}


require_once '../m/Persona.php';
$Update = new Persona();
$UPDATE = $Update->ciudadUpdate($idPersona,$idCiudad);



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



