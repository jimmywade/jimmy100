<?php


$data = json_decode(file_get_contents("php://input"));
$com = $data->com;
$sector = $data->sector;
$pais = $data->pais;
$ciudad = $data->ciudad;
$zona = $data->zona;
$dir = $data->dir;
$tel = $data->tel;
$mail = $data->mail;
$pass = $data->pass;
$ee =1;


/*
$com = 'LASANTE';
$pais = '46';
$ciudad = '130';
$zona = 'centro';
$dir = 'centro cll 40';
$tel = '59993838';
$mail = 'eee45@gmail.com';
$pass = '123';
$ee =1;
*/


	class nuevaEmpresa{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($com,$sector,$pais,$ciudad,$zona,$dir,$tel,$mail,$pass,$ee){
            
            //verificar cuantas coincidencias de email hay para la empresa que se esta inscribiendo

			$sqle = "SELECT idEmpresa, emailEmpresa FROM empresas WHERE emailEmpresa='$mail' AND estadoEmpresa=1 ";

			if($resulta = mysqli_query($this->db->connect(), $sqle)){

                $registros = mysqli_num_rows($resulta);

              	//si el numero de coincidencias es zero lo inserta
                if($registros==0){

                    $sql = "INSERT INTO empresas (estadoEmpresa, emailEmpresa, contraseniaEmpresa, comercialEmpresa, idSector, idPais, idCiudad, direccionEmpresa, zonaEmpresa, telefonoEmpresa) 
		                     VALUES ('".$ee."', '".$mail."', '".$pass."', '".$com."', '".$sector."', '".$pais."', '".$ciudad."', '".$dir."', '".$zona."', '".$tel."')";
		            $result = mysqli_query($this->db->connect(), $sql);
		            
		            //echo 'inserto';

                }else{
                
                	    // else , es decir, si el numero de coincidencias es mayor a zero devolvera un array Json llamado shadowsEmpresa con valor 0
					    $rows = array();

						$r['shadowsEmpresa'] =0;

						$rows[] = $r;
					    
						echo json_encode($rows);
                }
					


			}else{
				echo "problema de conexion DB";
			}

		}

	}



$objEmpresa = new nuevaEmpresa();
$objEmpresa -> obtener($com,$sector,$pais,$ciudad,$zona,$dir,$tel,$mail,$pass,$ee);




?>