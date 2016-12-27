<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
	$idCiudad=$data->idCiudad;
	$idPais=$data->idPais;
}else{
	$idPersona=$_REQUEST['idPersona'];
	$idCiudad=$_REQUEST['idCiudad'];
	$idPais=$_REQUEST['idPais'];
}


require_once '../m/Persona.php';
$Update = new Persona();
$UPDATE = $Update->ciudadUpdate($idPersona,$idCiudad);



require_once '../m/Persona.php';
$UpdatePais = new Persona();
$UPDATEPAIS = $UpdatePais->paisUpdate($idPersona,$idPais);



if($UPDATE == true && $UPDATEPAIS == true){
	$Read = new Persona();
	$READ = $Read->profileReload($idPersona);
}else{
	$rows = array();
	$r['success']=0;
	$r['message']='no se pudo ejecutar la consulta UPDATE';
    $rows[] = $r;
    echo json_encode($rows);
}



