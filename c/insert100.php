<?php


$data = json_decode(file_get_contents("php://input"));
$titulo = $data->titulo;
$inicio = $data->inicio;
$fin = $data->fin;
$institucion = $data->institucion;
$pais2 = $data->pais2;
$ciudad2 = $data->ciudad2;
$idPersona = $data->Persona;
$ea =1;



/*
$titulo = 'Pruba';
$inicio = '2010-11-11';
$fin = '2010-11-11';
$institucion = 'SENH';
$pais2 = '46';
$ciudad2 = '130';
$idPersona = '1';
$ea =1;
*/



require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($conn->query("INSERT INTO academicas (estadoAcademica, idPersona, institucionAcademica, inicioAcademica, finalizacionAcademica, tituloAcademica, idPais, idCiudad) 
	VALUES ('".$ea."', '".$idPersona."', '".$institucion."', '".$inicio."', '".$fin."', '".$titulo."', '".$pais2."', '".$ciudad2."')") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>