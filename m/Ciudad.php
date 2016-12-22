<?php
class Persona{

	private $db;

	function __construct() {
		require_once '../db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	function __destruct() {}


    private $sql;


    public function updateCiudad($idCiudad){
    	$sql = "
        INSERT INTO personas (idCiudad)
        VALUES ('".$codigoPersona."','".$codigoInstitucion."','".$nombrePersona."','".$emailPersona."','".$passwordPersona."','".$imagenPersona."')
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





    public function loginPersona($emailPersona, $contraseniaPersona) {
		$sql = " SELECT 
		personas.idPersona, 
		personas.emailPersona, 
		personas.celularPersona, 
		personas.nacimientoPersona, 
		personas.sexoPersona, 
		personas.nombrePersona, 
		personas.direccionPersona, 
		personas.imgPersona,
		civiles.nombreCivil,
		ciudades.nombreCiudad,
		paises.nombrePais
        FROM personas,civiles,ciudades,paises
		WHERE personas.emailPersona = '$emailPersona' 
		AND personas.contraseniaPersona = '$contraseniaPersona'
		AND estadoPersona= 1
		AND personas.idCivil = civiles.idCivil
		AND personas.idCiudad = ciudades.idCiudad
		AND personas.idPais = paises.idPais		
		";

		$result = mysqli_query($this->db->connect(), $sql);

        $numRows = mysqli_num_rows($result);

        $rows = array();

		if($numRows==1){
		    $r = mysqli_fetch_array($result);
			$r['success']=1;
            $rows[] = $r;
        }else{
            $r = mysqli_fetch_array($result);
			$r['success']=0;
            $rows[] = $r;
        }

	    echo json_encode($rows);
	}


  




    public function profileReload($idPersona){
		$sql = " SELECT 
		personas.idPersona, 
		personas.emailPersona, 
		personas.celularPersona, 
		personas.nacimientoPersona, 
		personas.sexoPersona, 
		personas.nombrePersona, 
		personas.direccionPersona, 
		personas.imgPersona,
		civiles.nombreCivil,
		ciudades.nombreCiudad,
		paises.nombrePais
        FROM personas,civiles,ciudades,paises
		WHERE personas.idPersona = '$idPersona' 
		AND estadoPersona= 1
		AND personas.idCivil = civiles.idCivil
		AND personas.idCiudad = ciudades.idCiudad
		AND personas.idPais = paises.idPais		
		";

		$result = mysqli_query($this->db->connect(), $sql);

        $numRows = mysqli_num_rows($result);

        $rows = array();

		if($numRows==1){
		    $r = mysqli_fetch_array($result);
			$r['success']=1;
            $rows[] = $r;
        }else{
            $r = mysqli_fetch_array($result);
			$r['success']=0;
            $rows[] = $r;
        }

	    echo json_encode($rows);
	}







    public function nombreUpdate($idPersona,$nombrePersona){
            $sql = "
    	    UPDATE personas
            SET nombrePersona='$nombrePersona'
			WHERE idPersona='$idPersona'
			AND estadoPersona = 1
			";
			$update = mysqli_query($this->db->connect(), $sql);
			return $update;
    }






    public function nacimientoUpdate($idPersona,$nacimientoPersona){
            $sql = "
    	    UPDATE personas
            SET nacimientoPersona='$nacimientoPersona'
			WHERE idPersona='$idPersona'
			AND estadoPersona = 1
			";
			$update = mysqli_query($this->db->connect(), $sql);
			return $update;
    }






    public function civilUpdate($idPersona,$idCivil){
            $sql = "
    	    UPDATE personas
            SET idCivil='$idCivil'
			WHERE idPersona='$idPersona'
			AND estadoPersona = 1
			";
			$update = mysqli_query($this->db->connect(), $sql);
			return $update;
    }





    public function direccionUpdate($idPersona,$direccionPersona){
            $sql = "
    	    UPDATE personas
            SET direccionPersona='$direccionPersona'
			WHERE idPersona='$idPersona'
			AND estadoPersona = 1
			";
			$update = mysqli_query($this->db->connect(), $sql);
			return $update;
    }









/*
    public function loginPersona_hh($emailPersona, $passwordPersona) {
		$sql = " SELECT codigoPersona FROM Personas 
		WHERE emailPersona = '$emailPersona' 
		AND passwordPersona = '$passwordPersona'
		AND estadoPersona= 1
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
			while($r = mysqli_fetch_array($result)){
				$r['success']=1;
                $rows[] = $r;
	        }
	    echo json_encode($rows);
	}
*/









	public function myprofiRead($esteToken){
		$sql = " SELECT * FROM Personas,instituciones,ciudades,paises
		WHERE Personas.codigoPersona = '$esteToken'
		AND Personas.codigoInstitucion = instituciones.codigoInstitucion
		AND instituciones.codigoPais = paises.codigoPais 
		AND instituciones.codigoCiudad = ciudades.codigoCiudad 
		AND Personas.estadoPersona = 1
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
			while($r = mysqli_fetch_array($result)){
				$r['success']=1;
                $rows[] = $r;
	        }
	    echo json_encode($rows);
	}




    /*
	public function misproRead_hh($estePersona){
		$sql = "SELECT * FROM participantes,proyectos,imagenes,Personas
			WHERE participantes.codigoProyecto = proyectos.codigoProyecto 
			AND proyectos.codigoProyecto = imagenes.codigoProyecto
		    AND participantes.codigoPersona = '$estePersona' 
			AND proyectos.estadoProyecto = 1
			AND participantes.estadoParticipante = 1
		    AND Personas.estadoPersona = 1 
		    ORDER BY proyectos.fechaProyecto DESC
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
			while($r = mysqli_fetch_array($result)){
				$r['success']=1;
                $rows[] = $r;
	        }
	    echo json_encode($rows);
	}
    */



    /*
	public function misproRead_hh($estePersona){
		$sql = "
		    SELECT * FROM participantes,proyectos,imagenes,Personas,instituciones,ciudades,paises
			WHERE Personas.codigoPersona = '$estePersona'
			AND participantes.liderParticipante = 1
			AND participantes.codigoProyecto = proyectos.codigoProyecto
			AND proyectos.codigoProyecto = imagenes.codigoProyecto
			AND participantes.codigoPersona = Personas.codigoPersona
			AND Personas.codigoInstitucion = instituciones.codigoInstitucion
			AND instituciones.codigoCiudad = ciudades.codigoCiudad
			AND instituciones.codigoPais = paises.codigopais
			AND proyectos.estadoProyecto = 1
			ORDER BY fechaProyecto DESC
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
			while($r = mysqli_fetch_array($result)){
				$r['success']=1;
                $rows[] = $r;
	        }
	    echo json_encode($rows);
	}
    */



    public function misproRead($codigoPersona){
		$sql = " 
		SELECT * FROM participantes,proyectos,temas,imagenes,Personas,instituciones,ciudades,paises
		WHERE participantes.liderParticipante = 1
		AND participantes.codigoProyecto = proyectos.codigoProyecto
		AND temas.codigoTema = proyectos.codigoTema
		AND proyectos.codigoProyecto = imagenes.codigoProyecto
		AND participantes.codigoPersona = Personas.codigoPersona
		AND Personas.codigoPersona = '$codigoPersona'
		AND Personas.codigoInstitucion = instituciones.codigoInstitucion
		AND instituciones.codigoCiudad = ciudades.codigoCiudad
		AND instituciones.codigoPais = paises.codigopais
		AND proyectos.estadoProyecto = 1
		ORDER BY fechaProyecto DESC
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();
			while($r = mysqli_fetch_array($result)){
                $rows[] = $r;
	        }
	        echo json_encode($rows);
    }






    public function picanteUpdate($img,$estePersona){
        $sql = " UPDATE Personas
        SET imagenPersona='$img'
        WHERE codigoPersona='$estePersona'
		";
		$result = mysqli_query($this->db->connect(), $sql);
        $rows = array();

        if($result==true){
        	$r['success']=1;
			$r['insertado']=true;
        }else{
        	$r['success']=0;
			$r['insertado']=false;
        }

	    echo json_encode($rows);
    }



}