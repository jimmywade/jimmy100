<?php

$data = json_decode(file_get_contents("php://input"));
$Descripcion = $data->Descripcion;
$Vacante = $data->Vacante;

require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE vacantes SET descripcionVacante='$Descripcion' WHERE idVacante='$Vacante' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>