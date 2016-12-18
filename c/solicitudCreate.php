<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$idVacante=$data->idVacante;
	$idEmpresa=$data->idEmpresa;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$idVacante=$_REQUEST['idVacante'];
	$idEmpresa=$_REQUEST['idEmpresa'];
}


require_once '../m/Solicitud.php';
$Create = new Solicitud();
$CREATE = $Create->solicitudCreate($idPersona,$idVacante,$idEmpresa);





?>