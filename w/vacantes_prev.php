<?php

$e_mail=$_POST['nombreUsuario'];
$pass=$_POST['contraseniaUsuario'];


class init{

    private $db;

    function __construct() {
        require_once '../db/db_connect.php';
        $this->db = new db_connect();
        $this->db->connect();
    }

    function __destruct() {}

    public function logInside($e_mail,$pass){


        if($e_mail&&$pass&&$e_mail!=NULL&&$e_mail!=''&&$pass!=NULL&&$pass!=''){

            //comparar la fecha actual con la fecha de cada vacante posteada por esta empresa
            
            $sqle = " SELECT * FROM solicitudes AS s INNER JOIN vacantes AS v ON s.idVacante=v.idVacante INNER JOIN empresas AS e ON s.idEmpresa=e.idEmpresa WHERE e.emailEmpresa='$e_mail' AND v.estadoVacante=1 ";
            
            if($resulta = mysqli_query($this->db->connect(), $sqle)){

                
                $fechaNOW = date(DATE_W3C);
                $hoy=substr($fechaNOW,0,-15);

             
                while($t = mysqli_fetch_array($resulta)){
                    
                    $fechaFIN = $t['fechaFinalizacion'];

                    $idVacante= $t['idVacante'];

                    if($hoy>$fechaFIN){
                        $sqlb = "UPDATE vacantes SET estadoVacante=0 WHERE idVacante='$idVacante' ";
            
                        $resultb = mysqli_query($this->db->connect(), $sqlb);
                    }

                }
             

            } else { printf('Warning: <i>problema de conexion</i>');}




            $sql = " SELECT * FROM empresas WHERE emailEmpresa='$e_mail' AND contraseniaEmpresa ='$pass' ";

            if($result = mysqli_query($this->db->connect(), $sql)){
                
                

                $r = mysqli_fetch_array($result);
                //verificar que la empresa este activa
                if($r['emailEmpresa']==$e_mail && $r['contraseniaEmpresa']==$pass && $r['estadoEmpresa']==1){

                    session_start();
                    $_SESSION['empleador']=$r['idEmpresa'];
                    include 'vacantes.php';

                }else{
                    echo '<h4 style="color:red;">Acceso denegado</h4> <h5 style="color:red;"><i>no fue posible iniciar sesi&oacute;n, por favor intente nuevamente.</i></h5>'; include 'login.html';
                }

            }else{
                echo "problema de conexion con la base de datos";
            }

        }else{ echo '<h4 style="color:red;">Acceso denegado</h4> <h5 style="color:red;"><i> Parece que faltan algunos datos importantes.</i></h5>'; include 'login.html'; /* si no ha ingresado usuario o contrasenia */ }
    }

}



$objPersona = new init();
$objPersona -> logInside($e_mail,$pass);





?>