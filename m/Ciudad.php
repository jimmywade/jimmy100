<?php

class Ciudad{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}


    private $sql;






	public function ciudadesRead($idPais){
		$sql = "SELECT * FROM ciudades 
		WHERE idPais = '$idPais' "; 
		$result = mysqli_query($this->db->connect(), $sql);
		if($result != false){
	        $rows = array();
				while($r = mysqli_fetch_array($result)){
	                $rows[] = $r;
		        }
		        echo json_encode($rows);
		}else{
			echo 'problema al consultar en la bd';
		}

	}








}