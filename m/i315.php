<?php
	

	class laClase{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function elMetodo(){
		

			$sql = " SELECT * FROM ciudades AS c INNER JOIN paises AS p ON c.idPais=p.idPais ";
			if($result = mysqli_query($this->db->connect(), $sql)){

		        $rows = array();
				  while($r = mysqli_fetch_array($result)) {
				    $rows[] = $r;
			    }


				echo json_encode($rows);

				//$row = mysqli_fetch_array($result);
			    //return $row;

			    //while ($fila = mysqli_fetch_array($result)){
                //    echo $fila['nombrePersona'];
                //}

			}else{
				echo "problema de conexion DB";
			}

		}

	}



	$objPersona = new laClase();
    $objPersona -> elMetodo();



?>