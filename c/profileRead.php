<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$emailPersona=$data->emailPersona;
	$contraseniaPersona=$data->contraseniaPersona;
}else{
	$emailPersona=$_REQUEST['emailPersona'];
	$contraseniaPersona=$_REQUEST['contraseniaPersona'];
}



//var_dump($emailEstudiante); 
//var_dump($contraseniaEstudiante);


require_once '../m/Persona.php';
$Persona = new Persona();
$PERSONA = $Persona->loginPersona($emailPersona, $contraseniaPersona);



?>