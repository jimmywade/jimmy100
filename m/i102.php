<?php

$idPersona=$_GET['ssg'];


class laboral{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}

	public function obtener($idPersona){
	
		$sql = " SELECT * FROM laborales AS l INNER JOIN ciudades AS c ON l.idCiudad=c.idCiudad INNER JOIN paises AS p ON l.idPais=p.idPais WHERE l.idPersona='$idPersona' AND l.estadoLaboral=1 ";
		if($result = mysqli_query($this->db->connect(), $sql)){
            
            $bajo3=3000000;
	        $rows = array();
			  while($r = mysqli_fetch_array($result)) {

			  	if($r['recomendacionLaboral']==NULL || $r['recomendacionLaboral']=='' || !isset($r['recomendacionLaboral'])){
			  		//definimos el nombre del boton en el caso de que este vacia
                    $r['addLaboral']='agregar recomendacion';
                    $r['addLaboralEstado']='false';
			  	}else{
                    //extraemos el formato
			  	    $recomendacionLaboral=$r['recomendacionLaboral'];
			        $formato = substr($recomendacionLaboral, -3);

			        if($formato=='pdf' || $formato=='PDF'){
			            $r['rutaLaboral']="../c/certificacionesLaborales/".$recomendacionLaboral;
			        }else{
			        	$r['rutaLaboral']="viewfinder.php?boots=../c/certificacionesLaborales/".$recomendacionLaboral;
			        }

			  		//definimos el nombre del boton en el caso de que exista un file
			  	    $r['addLaboral']='ver recomendacion';
			  	    $r['addLaboralEstado']='true';
			  	}


                
			  	$bajo3=$bajo3+1;
			  	
			  	$r['bajo3']=$bajo3;


			    $rows[] = $r;
		    }

			echo json_encode($rows);

		}else{
			echo "problema de conexion DB";
		}

	}

}


$objPersona = new laboral();
$objPersona -> obtener($idPersona);





?>