<?php

$EMPRESA=$_GET['empleador'];

	class general{
		
		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($EMPRESA){

			$sql = "SELECT * FROM empresas WHERE idEmpresa='$EMPRESA' ";
			if($result = mysqli_query($this->db->connect(), $sql)){
		        $rows = array();
				while($r = mysqli_fetch_array($result)) {
				    $rows[] = $r;
			    }

				echo json_encode($rows);

			}else{
				echo "problema de conexion DB";
			}

		}

	}


$objPersona = new general();
$objPersona -> obtener($EMPRESA);

?>