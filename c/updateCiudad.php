<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idCiudad=$data->idCiudad;
}else{
	$idCiudad=$_REQUEST['idCiudad'];
}


require_once '../m/Ciudad.php';
$Update = new Ciudad();
$UPDATE = $Update->updateCiudad($idCiudad);

?>