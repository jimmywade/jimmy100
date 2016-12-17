<?php

$data = json_decode(file_get_contents("php://input"));
$pais = $data->country;
$ciudad = $data->city;
$idPersona = $data->person;


require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE personas SET idPais='$pais' WHERE idPersona='$idPersona' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}



if ($conn->query("UPDATE personas SET idCiudad='$ciudad' WHERE idPersona='$idPersona' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}



$conn->close();

?>