<?php

$data = json_decode(file_get_contents("php://input"));
$cargo = $data->cargo;
$inicial = $data->inicial;
$final = $data->final;
$empresa = $data->empresa;
$pais3 = $data->pais3;
$ciudad3 = $data->ciudad3;
$idPersona = $data->Persona;
$el=1;


require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($conn->query("INSERT INTO laborales (estadoLaboral, idPersona, empresaLaboral, cargoLaboral, inicioLaboral, finalizacionLaboral, idPais, idCiudad) 
	VALUES ('".$el."', '".$idPersona."', '".$empresa."', '".$cargo."', '".$inicial."', '".$final."', '".$pais3."', '".$ciudad3."')") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>