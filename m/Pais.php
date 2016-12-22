<?php
	


class Pais{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}


    private $sql;


	public function paisesRead(){
		$sql = "SELECT * FROM paises "; 
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



/*
	public function imagenUpdate($imgPersona,$idPersona){
		$sql = "UPDATE personas SET imgPersona='$imgPersona' WHERE idPersona='$idPersona' "; 
		$result = mysqli_query($this->db->connect(), $sql);

		if($result==true){
		    $r['success']=1;
		    $r['exito']='imagen insertada correctamente';
		}else{
			$r['success']=0;
		    $r['exito']='no se pudo insertar la imagen';
		}

		echo json_encode($r);

	}
*/
}
