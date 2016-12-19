<?php

	class Academica{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}


	    private $sql;



	    public function academicaRead($idPersona){
			$sql = " 
            SELECT * FROM academicas,ciudades,paises
			WHERE academicas.idPersona='3' 
			AND academicas.estadoAcademica=1
            AND academicas.idPais = paises.idPais
            AND academicas.idCiudad = ciudades.idCiudad
			ORDER BY academicas.idAcademica DESC
			";
			$result = mysqli_query($this->db->connect(), $sql);
	        $rows = array();
            $numRows = mysqli_num_rows($result);
            if($numRows>0){
            	while($r = mysqli_fetch_array($result)){
            		$r['success']=1;
	                $rows[] = $r;
		        }
            }else{
            	$r['success']=0;
            	$rows[] = $r;
            }
				
		    echo json_encode($rows);
	    }






	}