<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$idCivil=$data->idCivil;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$idCivil=$_REQUEST['idCivil'];
}


require_once '../m/Persona.php';
$Update = new Persona();
$UPDATE = $Update->civilUpdate($idPersona,$idCivil);


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