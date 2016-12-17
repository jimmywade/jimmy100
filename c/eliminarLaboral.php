<?php

$data = json_decode(file_get_contents("php://input"));
$idLaboral = $data->idLab;




require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE laborales SET estadoLaboral=0 WHERE idLaboral='$idLaboral' ") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


$conn->close();

?>