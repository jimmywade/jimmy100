<?php

$idPersona=$_GET['psn'];

	class general{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($idPersona){

			$sql = "SELECT * FROM solicitudes AS s INNER JOIN vacantes AS v ON s.idVacante = v.idVacante INNER JOIN empresas AS e ON v.idEmpresa = e.idEmpresa INNER JOIN paises AS p ON v.idPais = p.idPais INNER JOIN ciudades AS c ON v.idCiudad = c.idCiudad WHERE s.idPersona='$idPersona' AND s.estadoEmpresa=0 AND s.estadoPersona=1 AND v.estadoVacante=1 ORDER BY s.idSolicitud DESC ";
			if($result = mysqli_query($this->db->connect(), $sql)){


		        $rows = array();
		          $nv=500000;
		          $ni=600000;
				  while($r = mysqli_fetch_array($result)) {

                        $nv=$nv+1;
                        $ni=$ni+1;
                        

					  	if (strlen($r["descripcionVacante"]) > 200){
					  		 $r["descripcionMini"] = substr($r["descripcionVacante"],0,200).'...';
					  	}else{ $r["descripcionMini"]=$r["descripcionVacante"]; }

					  	$r["nuevoVisible"]=$nv;
					  	$r["nuevoInvisible"]=$ni.'A';

				    $rows[] = $r;
			    }

				echo json_encode($rows);


			}else{
				echo "problema de conexion DB";
			}

		}

	}


$objPersona = new general();
$objPersona -> obtener($idPersona);


?>