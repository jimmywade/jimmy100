<?php


if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPais=$data->idPais;
}else{
	$idPais=$_REQUEST['idPais'];
}



require_once '../m/Ciudad.php';
$Update = new Ciudad();
$UPDATE = $Update->ciudadesRead($idPais);