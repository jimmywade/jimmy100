<?php

if(json_decode(file_get_contents("php://input"))){
	$data = json_decode(file_get_contents("php://input"));
	$idPersona=$data->idPersona;
}else{
	$idPersona=$_REQUEST['idPersona'];
}


//RUTA DONDE SE GUARDARAN LOS ARCHIVOS
$destino = '../media/persons/profilePictures';

//SE DEFINEN LOS DATOS DEL ARCHIVO
$nombre_archivo = $_FILES['file']['name'];
$tipo = $_FILES['file']['type'];
$tamano = $_FILES['file']['size'];

//CONSTRUIMOS UN CODIGO UNICO PARA RENOMBRAR
$codigo_fecha = date("YmdHis");         
$no_aleatorio = rand(100, 999);
$codigo = $codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS

//RENOMBRAMOS EL ARCHIVO SUBIDO
list($nombre, $ext) = explode(".", $nombre_archivo);
$nombre_actual = "$codigo"."."."$ext" ;

//GUARDAMOS EL ARCHIVO
move_uploaded_file ($_FILES ['file']['tmp_name'], $destino . '/' . $nombre_actual);

$ubicacion = $_FILES ['file']['tmp_name'];
$ubicacion = $destino . '/' . $nombre_actual;

/*
echo '<h1>'.$nombre_actual.'</h1>';
echo '<h1>'.$esteEstudiante.'</h1>';
exit();
*/


require_once '../m/Imagen.php';
$Imagen = new Imagen;
$IMAGEN = $Imagen->imagenUpdate($nombre_actual,$idPersona);
var_dump($nombre_actual);
echo "<br>";
var_dump($idPersona);




?>