<?php


$EMPRESA=$_GET['empleador'];




	class general{

		private $db;

		function __construct() {
			require_once '../db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function obtener($EMPRESA){
            
            
			$EMPRESA=$EMPRESA;

			$sql = " SELECT * FROM vacantes WHERE idEmpresa='$EMPRESA' AND estadoVacante=1 ";
			if($result = mysqli_query($this->db->connect(), $sql)){
                
                //obtener el numero de registros
                $numeroDeRegistros=mysqli_num_rows($result);

		        while($r = mysqli_fetch_array($result)) {
		        	//define el idi de la vacante que se actualiza
		        	$EV=$r['idVacante'];
		        	$fechaFIN = $r['fechaFinalizacion'];
		        	$fechaNOW = date(DATE_W3C);
		        	$hoy=substr($fechaNOW,0,-15);

		        	$ASPIRANTES=$r['aspirantesVacante'];
		        	$ASPIRANTESACEPTADOS=$r['aspirantesAceptado'];

		        
				    //comparamos si la fecha finalizacion ya paso y si es asi se cambia el estado a ZERO
                    if($fechaFIN < $hoy || $ASPIRANTESACEPTADOS>=$ASPIRANTES){
			            $sql2 = " UPDATE vacantes SET estadoVacante=0 WHERE idVacante='$EV' ";
						if($result2 = mysqli_query($this->db->connect(), $sql2)){
	                        //echo 'estado vacante actualizado';
						}
					
					} 
                    


			    }
			}    






			$sql = "SELECT DISTINCT * FROM vacantes AS v INNER JOIN paises AS p ON v.idPais = p.idPais INNER JOIN ciudades AS c ON v.idCiudad = c.idCiudad INNER JOIN empresas AS e ON v.idEmpresa = e.idEmpresa WHERE v.estadoVacante=1 AND v.idEmpresa='$EMPRESA' ";
			if($result = mysqli_query($this->db->connect(), $sql)){

		        $rows = array();
		          $nv=0;
		          $ni=100000;
				  while($r = mysqli_fetch_array($result)) {
				  	   
                        $nv=$nv+1;
                        $ni=$ni+1;
                        

					  	if (strlen($r["descripcionVacante"]) > 200){
					  		 $r["descripcionMini"] = substr($r["descripcionVacante"],0,200).'...';
					  	}

					  	$r["nuevoVisible"]=$nv;
					  	$r["nuevoInvisible"]=$ni.'A';
					  	

					  	if($r["modalidadEntrevista"]==1){ $r["way"]='presencial'; }
					  	if($r["modalidadEntrevista"]==2){ $r["way"]='virtual'; }

                    



				    $rows[] = $r;
			    }
                


                //si no hay ninguna vacante, se muestra solo los datos de la empresa
                if($numeroDeRegistros==0){
                	$sql = " SELECT * FROM empresas WHERE idEmpresa='$EMPRESA' ";
			        $result = mysqli_query($this->db->connect(), $sql);
			        $r = mysqli_fetch_array($result);

			        //identificador para ocultar el div que contiene las vacantes
			        $r['ocultadorEmpresa']=1;
			        $rows[] = $r;

                }

				echo json_encode($rows);


			}else{
				echo "problema de conexion DB";
			}




		}

	}



$objPersona = new general();
$objPersona -> obtener($EMPRESA);


?>