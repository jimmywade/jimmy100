<?php






class correo{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}

	public function mailPersona($idPersona,$tituloMail,$mensajeMail){

		$sql = "SELECT * FROM solicitudes ";
		if($result = mysqli_query($this->db->connect(), $sql)){

			$destinatario = "edibmx1@gmail.com"; 
			$asunto = "Este mensaje es de prueba"; 
			$cuerpo = ' 
			<html> 
			<head> 
			   <title>Prueba de correo</title> 
			</head> 
			<body> 
			<h1>Hola amigos!</h1> 
			<p> 
			<b>Bienvenidos a mi correo electrónico de prueba</b>. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
			</p> 
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 


			$headers .= "From: Eudes Mazo  <servicios@starapps.org>\r\n"; 

			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			$headers .= "Reply-To: starapps01@gmail.com\r\n"; 

			//ruta del mensaje desde origen a destino 
			$headers .= "Return-path: eudesmazo@hotmail.com\r\n"; 


			mail($destinatario,$asunto,$cuerpo,$headers);


			echo '<h2>Mensaje enviado</h2>';


		}else{
			echo "problema de conexion DB";
		}

	}

}













?>