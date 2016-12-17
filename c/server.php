<?php


//----------------------------------------------------
$file = $_FILES["file"]["name"];

/*
if(!is_dir("files/"))
	mkdir("files/", 0777);
*/
//------------------------------------------------------



$idCertificacion=$_POST['IDACADEMICA'];

$cadena=$_FILES['file']['type'];




//verificamos si el formato es jpeg
$posicion=stripos($cadena, 'jpeg');
$extension=substr($cadena, $posicion);

	//si la variable extension es jpeg lo igualamos a jpg de lo contrario verificamos los demas formatos
	if($extension=='jpeg'){
	  $extension='jpg';
	}else{
		$formatos= array('pdf', 'jpg', 'png');
		foreach ($formatos as $formato){
		    if(stripos($cadena, $formato)){
				$posicion=stripos($cadena, $formato);
				$extension=substr($cadena, $posicion); 	
		    }
		}
	}



//FORMATOS SOPOTADOS OJO AMPLIAR PARA DAR RESPUESTA JSON!
if($extension!='pdf' && $extension!='jpg' && $extension!='jpeg' && $extension!='png'){ 
	//pendiente aqui: notificar al usuario que este formato no es soportado
    header('Location: ../v/main.php');
    exit;
}


//CONSTRUIMOS UN CODIGO UNICO PARA RENOMBRAR
$codigo_fecha = date("YmdHis");         
$no_aleatorio = rand(100, 999); //GENERAMOS TRES DIGITOS PARA INCORPORARLO AL FINAL DEL CODIGO
$codigo = $codigo_fecha.$no_aleatorio; //CODIGO DE 17 DIGITOS


$nombre_actual=$codigo.'.'.$extension;




//--------------------------------------------------------------

if($file && move_uploaded_file($_FILES["file"]["tmp_name"], "certificacionesAcademicas/".$nombre_actual))
{

	require_once '../db/b.php';


	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	if ($conn->query("UPDATE academicas SET certificacionAcademica='$nombre_actual' WHERE idAcademica='$idCertificacion' ") === TRUE) {
	    $paraImprimir = "guardada correctamente";
	} else {
	    $paraImprimir = "no guardada, por favor intente nuevamente <br> ". $conn->error;
	}


	$conn->close();

}

//--------------------------------------------------------------



header('Location: ../v/main.php');
exit;





?>