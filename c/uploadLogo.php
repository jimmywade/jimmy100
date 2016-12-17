<?php

//RUTA DONDE SE GUARDARAN LOS ARCHIVOS
$destino = 'logos';
$idEmpresa=$_POST['idEmpresa'];

//SE DEFINEN LOS DATOS DEL ARCHIVO
$nombre_archivo = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$tamano = $_FILES['archivo']['size'];

//CONSTRUIMOS UN CODIGO UNICO PARA RENOMBRAR
$codigo_fecha = date("YmdHis");         
$no_aleatorio = rand(100, 999); //GENERAMOS TRES DIGITOS PARA INCORPORARLO AL FINAL DEL CODIGO
$codigo = $codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS

//RENOMBRAMOS EL ARCHIVO SUBIDO
list($nombre, $ext) = explode(".", $nombre_archivo);
$nombre_actual = "$codigo"."."."$ext" ;

//GUARDAMOS EL ARCHIVOS
move_uploaded_file ($_FILES ['archivo']['tmp_name'], $destino . '/' . $nombre_actual);

$ubicacion = $_FILES ['archivo']['tmp_name'];
$ubicacion = $destino . '/' . $nombre_actual;



require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("UPDATE empresas SET imgEmpresa='$nombre_actual' WHERE idEmpresa='$idEmpresa' ") === TRUE) {
    echo "guardado correctamente";
} else {
    echo "no guardado, por favor intente nuevamente <br> ". $conn->error;
}


$conn->close();



?>