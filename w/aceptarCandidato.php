<?php



    $persona='';
    $solicitud='';

    $persona = $_POST['persona'];
    $solicitud = $_POST['solicitud'];
    $vcnte = $_POST['vacante'];
    






    require_once '../db/b.php';



    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($conn->query("UPDATE solicitudes SET estadoEmpresa=1 WHERE idSolicitud='$solicitud' AND idPersona='$persona' ") === TRUE) {
        echo "";
    } else {
        echo "FALLO <br> ". $conn->error;
    }

    $conn->close();










//consulta toda la informacion de esta vacante
//verifica si la cantidad de cantidatos aceptados ya lego al limite
//si se llego al limite , cambia el estado de la cvacante a zero , de lo contrario no pasa nada    



    class laClase{

        private $db;

        function __construct() {
            require_once '../db/db_connect.php';
            $this->db = new db_connect();
            $this->db->connect();
        }

        function __destruct() {}

        public function elMetodo($vcnt){


         
            $sql = "SELECT * FROM vacantes WHERE idVacante='$vcnt' ";
            if($result = mysqli_query($this->db->connect(), $sql)){
                $r = mysqli_fetch_array($result);


                //si se llego al limite , cambia el estado de la vacante a zero , de lo contrario no pasa nada
                $futuro=$r['aspirantesAceptado'] + 1;
                if($r['aspirantesVacante'] <= $futuro ){
                    $sql = " UPDATE vacantes SET estadoVacante=0 WHERE idVacante='$vcnte' ";
                    if($result = mysqli_query($this->db->connect(), $sql)){  
                    }
                    //le suma uno a la columna aspirantesAceptado
                    $aA=$r['aspirantesAceptado'];
                    $aspirantesAceptado=$aA+1;
                    $sql2 = "UPDATE vacantes SET aspirantesAceptado='$aspirantesAceptado' WHERE idVacante='$vcnte' ";
                    if($result2 = mysqli_query($this->db->connect(), $sql2)){  
                    }
                }



            }else{
                echo "problema de conexion DB";
            }

            

        }

    }



    $objPersona = new laClase();
    $objPersona -> elMetodo($vcnte);






    header('Location: candidatos.php?idiVacante='.$vcnte);


?>