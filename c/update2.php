<?php

$data = json_decode(file_get_contents("php://input"));
$social = $data->social;
$idEmpresa=$data->empresa;

require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE empresas SET socialEmpresa='$social' WHERE idEmpresa='$idEmpresa' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>