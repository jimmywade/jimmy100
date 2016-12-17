<?php

$data = json_decode(file_get_contents("php://input"));
$idAcademica = $data->idAcadem;


require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE academicas SET estadoAcademica=0 WHERE idAcademica='$idAcademica' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>