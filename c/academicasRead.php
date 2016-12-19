<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
}else{
	$idPersona=$_REQUEST['idPersona'];
}


require_once '../m/Academica.php';
$Academica = new Academica();
$ACADEMICA = $Academica->academicaRead($idPersona);



?>