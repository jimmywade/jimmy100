<?php

$idPersona=$_GET['ssg'];

	class persona{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function infoPersona($idPersona){
		
			$sql = " SELECT * FROM personas AS p INNER JOIN paises AS pa ON p.idPais=pa.idPais INNER JOIN ciudades AS c ON p.idCiudad=c.idCiudad INNER JOIN civiles AS ci ON p.idCivil=ci.idCivil WHERE p.idPersona='$idPersona' ";
			if($result = mysqli_query($this->db->connect(), $sql)){
                
                $bajo = 1;
                $alto = 1000000;
		        $rows = array();
				while($r = mysqli_fetch_array($result)){
                    
                    //define que imagen se mostrara
					if($r['imgPersona']==NULL || $r['imgPersona']=='' || !isset($r['imgPersona'])){
                        $r['laFoto']='1.png';
				  	}else{
				  	    $r['laFoto']=$r['imgPersona'];	
				  	}
                    
                    //se envian dos identificadores unicos
                    $bajo=$bajo+1;
                    $alto=$alto+1;
                    $r['bajo']=$bajo;
                    $r['alto']=$alto;
                     

				    $rows[] = $r;
			    }

				echo json_encode($rows);


			}else{
				echo "problema de conexion DB";
			}

		}

	}



	$objPersona = new persona();
    $objPersona -> infoPersona($idPersona);



?>