<?php


$data = json_decode(file_get_contents("php://input"));
$residencia = $data->residencia;
$idPersona=$data->person;


require_once '../db/b.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE personas SET direccionPersona='$residencia' WHERE idPersona='$idPersona' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>