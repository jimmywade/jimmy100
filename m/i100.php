<?php

$idPersona=$_GET['ssg'];


	class academicas{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($idPersona){
		
			$sql = " SELECT * FROM academicas AS a INNER JOIN ciudades AS c ON a.idCiudad=c.idCiudad INNER JOIN paises AS p ON a.idPais=p.idPais WHERE a.idPersona='$idPersona' AND a.estadoAcademica=1 ";
			if($result = mysqli_query($this->db->connect(), $sql)){
                
                $bajo2=2000000;
                //$medio2=3000000;
                //$alto2=4000000;
		        
		        $rows = array();

				  while($r = mysqli_fetch_array($result)) {

				  	if($r['certificacionAcademica']==NULL || $r['certificacionAcademica']=='' || !isset($r['certificacionAcademica'])){
                        //definimos el nombre del boton en el caso de que este vacia
                        $r['addAcademica']='agregar certificacion';
                        $r['addAcademicaEstado']='false';
				  	}else{
				  		//extraemos el formato
				  		$certificacionAcademica=$r['certificacionAcademica'];
                        $formato = substr($certificacionAcademica, -3);

                        if($formato=='pdf' || $formato=='PDF'){
                            $r['rutaAcademica']="../c/certificacionesAcademicas/".$certificacionAcademica;
                        }else{
                        	$r['rutaAcademica']="viewfinder.php?boots=../c/certificacionesAcademicas/".$certificacionAcademica;
                        }

				  		//definimos el nombre del boton en el caso de que exista un file
				  	    $r['addAcademica']='ver certificacion';
				  	    $r['addAcademicaEstado']='true';
				  	}




				  	$bajo2=$bajo2+1;
				  	//$medio2=$medio2+1;
				  	//$alto2=$alto2+1;
				  	
				  	$r['bajo2']=$bajo2;
				  	//$r['medio2']=$medio2;
				  	//$r['alto2']=$alto2;				  	


				    $rows[] = $r;
			    }

				echo json_encode($rows);

			}else{
				echo "problema de conexion DB";
			}

		}

	}



$objPersona = new academicas();
$objPersona -> obtener($idPersona);






?>