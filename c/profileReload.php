<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
}else{
	$idPersona=$_REQUEST['idPersona'];
}



require_once '../m/Persona.php';
$Reload = new Persona();
$RELOAD = $Reload->profileReload($idPersona);



?>