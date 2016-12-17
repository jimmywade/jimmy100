<?php


$data = json_decode(file_get_contents("php://input"));

$cargo5 = $data->cargo5;
$descripcion = $data->descripcion;
$pais5 = $data->pais5;
$ciudad5 = $data->ciudad5;
$contrato = $data->contrato;
$salario = $data->salario;
$fecha5 = $data->fecha5;
$hora5 = $data->hora5;
$sweb = $data->sweb;
$adicional = $data->adicional;
$direccion5 = $data->direccion5;
$referencia = $data->referencia;
$email5 = $data->email5;
$telefono = $data->telefono;
$fin5 = $data->fin5;
$cantidad = $data->cantidad;
$idEmpresa = $data->idCompany;
$modalidad = $data->modalidad;
$ev=1;



require_once '../db/b.php';


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($conn->query("INSERT INTO vacantes (estadoVacante, tituloVacante, descripcionVacante, idEmpresa, fechaFinalizacion, idPais, idCiudad, modalidadEntrevista, servicioEntrevista, aspirantesVacante, adicionalEntrevista, fechaEntrevista, horaEntrevista, direccionEntrevista, referenciaEntrevista, salarioVacante, contratoVacante, emailEntrevista, telefonoEntrevista) 
	VALUES ('".$ev."', '".$cargo5."', '".$descripcion."', '".$idEmpresa."', '".$fin5."', '".$pais5."', '".$ciudad5."', '".$modalidad."', '".$sweb."', '".$cantidad."', '".$adicional."', '".$fecha5."', '".$hora5."', '".$direccion5."', '".$referencia."', '".$salario."', '".$contrato."', '".$email5."', '".$telefono."')") === TRUE) {
    echo "OK";
} else {
    echo "FALLO <br> ". $conn->error;
}


//OJO,  code-parcial, en ese pequeño intervalo de tiempo muchas cosas pueden pasar

$result=$conn->query("SELECT idVacante FROM vacantes ORDER BY idVacante DESC ");
$r = mysqli_fetch_array($result);


	    $Vacante=$r["idVacante"];
		$Empresa=$idEmpresa;
		$Persona=0;
		$eP=0;
		$eE=0;
		if ($conn->query("INSERT INTO solicitudes (idVacante, idPersona, idEmpresa, estadoPersona, estadoEmpresa) 
			VALUES ('".$Vacante."', '".$Persona."', '".$Empresa."', '".$eP."', '".$eE."')") === TRUE) {
		    echo "OK3";
		} else {
		    echo "FALLO3". $conn->error;
		}
        



$conn->close();

?>