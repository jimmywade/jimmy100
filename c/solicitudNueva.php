<?php

$data = json_decode(file_get_contents("php://input"));

$Vacante = $data->Vacante;
$Empresa = $data->Empresa;
$Persona = $data->psn;
$eP =1;
$eE =0;

require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("INSERT INTO solicitudes (idVacante, idPersona, idEmpresa, estadoPersona, estadoEmpresa) 
	VALUES ('".$Vacante."', '".$Persona."', '".$Empresa."', '".$eP."', '".$eE."')") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>