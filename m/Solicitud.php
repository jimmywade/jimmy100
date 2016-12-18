<?php
class Solicitud{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}



    private $sql;



    public function solicitudCreate($idPersona,$idVacante,$idEmpresa){
    	$sql = "
        INSERT INTO solicitudes (idVacante, idPersona, idEmpresa, estadoPersona, estadoEmpresa)
        VALUES ('".$idVacante."','".$idPersona."','".$idEmpresa."','1','0')
    	";
    	$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
        if($result==true){
        	$r['success']=1;
			$r['insertado']=true;
			$rows[] = $r;
        }else{
        	$r['success']=0;
			$r['insertado']=false;
			$rows[] = $r;
        }
	    echo json_encode($rows);
    }





    public function soicitudUpdate($idVacante){
            $sql = "
    	    UPDATE personas
            SET nombrePersona='$nombrePersona'
			WHERE idPersona='$idPersona'
			AND estadoPersona = 1
			";
			$update = mysqli_query($this->db->connect(), $sql);
			return $update;
    }





}