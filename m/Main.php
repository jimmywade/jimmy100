<?php
	class Main{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}


	    private $sql;

	    public function MainRead(){
			$sql = " 
			SELECT * FROM vacantes,empresas,ciudades,paises
			WHERE vacantes.estadoVacante = 1
			AND vacantes.idEmpresa = empresas.idEmpresa
			AND empresas.idCiudad = ciudades.idCiudad
			AND empresas.idPais = paises.idPais
			ORDER BY vacantes.fechaPublicacion DESC
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



	    public function MainRead_hh(){
			$sql = " 
			SELECT * FROM vacantes,empresas,ciudades,paises
			WHERE vacantes.estadoVacante = 1
			AND vacantes.idEmpresa = empresas.idEmpresa
			AND empresas.idCiudad = ciudades.idCiudad
			AND empresas.idPais = paises.idPais
			ORDER BY vacantes.fechaPublicacion DESC
			";
			$result = mysqli_query($this->db->connect(), $sql);
	        $rows = array();
				while($r = mysqli_fetch_array($result)){
	                $rows[] = $r;
		        }
		        echo json_encode($rows);
	    }





	    public function proyectoCreate(
			$codigoProyecto,
			$codigoTema,
			$nombreProyecto,
			$problemaProyecto,
			$objetivoProyecto,
			$especificoProyecto,
			$actividadProyecto,
			$resultadoProyecto,
			$beneficiarioProyecto,
			$areaProyecto,
			$valorProyecto,
			$duracionProyecto){
	    	$sql = "
		    INSERT INTO proyectos (codigoProyecto, codigoTema, nombreProyecto, problemaProyecto, objetivoProyecto, especificoProyecto, actividadProyecto, resultadoProyecto, beneficiarioProyecto, areaProyecto, valorProyecto, duracionProyecto) 
		    VALUES ('".$codigoProyecto."','".$codigoTema."','".$nombreProyecto."','".$problemaProyecto."','".$objetivoProyecto."','".$especificoProyecto."','".$actividadProyecto."','".$resultadoProyecto."','".$beneficiarioProyecto."','".$valorProyecto."','".$areaProyecto."','".$duracionProyecto."')
	    	";
	    	
			$result = mysqli_query($this->db->connect(), $sql);
			var_dump($result);
	    }




		public function proyectoUpdate($codigoProyecto,$nombreProyecto,$codigoTema,$problemaProyecto,$objetivoProyecto,$especificoProyecto,$resultadoProyecto,$actividadProyecto,$beneficiarioProyecto,$areaProyecto,$valorProyecto,$duracionProyecto){
			$sql = "
			UPDATE proyectos
            SET nombreProyecto='$nombreProyecto',
                codigoTema='$codigoTema',
                problemaProyecto='$problemaProyecto',
                objetivoProyecto='$objetivoProyecto',
                especificoProyecto='$especificoProyecto',
                resultadoProyecto='$resultadoProyecto',
                actividadProyecto='$actividadProyecto',
                beneficiarioProyecto='$beneficiarioProyecto',
                areaProyecto='$areaProyecto',
                valorProyecto='$valorProyecto',
                duracionProyecto='$duracionProyecto'
			WHERE codigoProyecto='$codigoProyecto'
	    	";

			$result = mysqli_query($this->db->connect(), $sql);
			var_dump($result);
		}



		public function proyectoDelete($codigoProyecto){
			$sql = "
			UPDATE proyectos
            SET estadoProyecto='0'
			WHERE codigoProyecto='$codigoProyecto'
	    	";

			$result = mysqli_query($this->db->connect(), $sql);
			var_dump($result);
		}








	}