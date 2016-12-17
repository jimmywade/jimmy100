<?php

$idEmpresa=$_GET['empleador'];


	class laClase{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function consultar($idEmpresa){
		
			$sql = " SELECT * FROM empresas AS e INNER JOIN paises AS p ON e.idPais=p.idPais INNER JOIN ciudades AS c ON e.idCiudad=c.idCiudad WHERE e.idEmpresa='$idEmpresa' ";
			if($result = mysqli_query($this->db->connect(), $sql)){

		        $rows = array();
				  while($r = mysqli_fetch_array($result)){

				  	if($r['imgEmpresa']==NULL || $r['imgEmpresa']=='' || !isset($r['imgEmpresa'])){
                        $r['imagen']='iconLogo.png';
				  	}else{
				  	    $r['imagen']=$r['imgEmpresa'];	
				  	}

				    $rows[] = $r;
			    }

				echo json_encode($rows);

			}else{
				echo "problema de conexion DB";
			}

		}

	}



	$objPersona = new laClase();
    $objPersona -> consultar($idEmpresa);



?>