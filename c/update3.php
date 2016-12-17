<?php

$data = json_decode(file_get_contents("php://input"));
$idPais = $data->pais3;
$idciudad = $data->ciudad3;
$idEmpresa=$data->empresa;


require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE empresas SET idPais='idPais' WHERE idEmpresa='$idEmpresa' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


if ($conn->query("UPDATE empresas SET idCiudad='$idciudad' WHERE idEmpresa='$idEmpresa' ") === TRUE) {
    echo "OK 2";
} else {
    echo "FALLO 2 <br> ". $conn->error;
}


$conn->close();

?>