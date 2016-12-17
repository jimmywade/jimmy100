<?php


$idPERSONA=$_GET['psn'];


	class general{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($idPERSONA){

			//$sql = "SELECT DISTINCT * FROM solicitudes AS s RIGHT JOIN vacantes AS v ON s.idVacante = v.idVacante INNER JOIN empresas AS e ON v.idEmpresa = e.idEmpresa INNER JOIN paises AS p ON v.idPais = p.idPais INNER JOIN ciudades AS c ON v.idCiudad = c.idCiudad WHERE v.estadoVacante=1 AND s.idPersona!='$idPERSONA' ";
			
			$sql = " SELECT * FROM vacantes AS v INNER JOIN empresas AS e ON v.idEmpresa = e.idEmpresa INNER JOIN paises AS p ON v.idPais = p.idPais INNER JOIN ciudades AS c ON v.idCiudad = c.idCiudad WHERE v.estadoVacante=1 AND idVacante NOT IN (SELECT idVacante FROM solicitudes WHERE idPersona='$idPERSONA') ORDER BY v.idVacante DESC ";
			
			if($result = mysqli_query($this->db->connect(), $sql)){

		        $rows = array();
		        $nv=1000000;
		        $ni=5000000;
				while($r = mysqli_fetch_array($result)) {

				  	/*
				  	echo $r["idVacante"];
				  	echo '<br>';
				  	echo $r["tituloVacante"];
                    echo '<br>';
				  	echo 'solicitudes id vacante: '.$r["idvacante"];
                    echo '<br><br><br>';
                    */
                    
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
$objPersona -> obtener($idPERSONA);


?>