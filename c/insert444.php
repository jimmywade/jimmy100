<?php


$data = json_decode(file_get_contents("php://input"));
$nom = $data->com;
$ncm = $data->nacim;
$sxp = $data->sxp;
$civ = $data->civ;
$pais = $data->pais;
$ciu = $data->ciudad;
$dir = $data->dir;
$cel = $data->tel;
$mail = $data->mail;
$pass = $data->pass;
$ep =1;



/*
$nom = 'eude';
$ncm = '2010-04.18';
$sxp = '1';
$civ = '2';
$pais = '46';
$ciu = '130';
$dir = 'clle';
$cel = '309828282';
$mail = 'edi@gmail.com';
$pass = '123';
$ep =1;
*/




	class nuevaPersona{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($nom,$ncm,$sxp,$civ,$pais,$ciu,$dir,$cel,$mail,$pass,$ep){
            
            //verificar cuantas coincidencias de email hay para la empresa que se esta inscribiendo

			$sqle = "SELECT idPersona, emailPersona FROM personas WHERE emailPersona='$mail' AND estadoPersona=1 ";

			if($resulta = mysqli_query($this->db->connect(), $sqle)){

                $registros = mysqli_num_rows($resulta);

              	//si el numero de coincidencias es zero lo inserta
                if($registros==0){

                    $sql = "INSERT INTO personas (estadoPersona, emailPersona, contraseniaPersona, celularPersona, nacimientoPersona, sexoPersona, nombrePersona, idCivil, idPais, idCiudad, direccionPersona) 
	                        VALUES ('".$ep."', '".$mail."', '".$pass."', '".$cel."', '".$ncm."', '".$sxp."', '".$nom."', '".$civ."', '".$pais."', '".$ciu."', '".$dir."')";
		            $result = mysqli_query($this->db->connect(), $sql);

		            //echo 'inserto';

                }else{

                	    // else , es decir, si el numero de coincidencias es mayor a zero devolvera un array Json llamado shadowsPersona con valor 0
					    $rows = array();

						$r['shadowsPersona'] =0;

						$rows[] = $r;
					    
						echo json_encode($rows);
                }
					


			}else{
				echo "problema de conexion DB";
			}

		}

	}



$objEmpresa = new nuevaPersona();
$objEmpresa -> obtener($nom,$ncm,$sxp,$civ,$pais,$ciu,$dir,$cel,$mail,$pass,$ep);




?>