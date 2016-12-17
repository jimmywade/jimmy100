<?php

session_start();

$empresa=$_SESSION['empleador'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> Talent </title>
    <link rel="shortcut icon" href="../media/logo10.png" type="image/png" />
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles.css" />
    <script type="text/javascript" src="../libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular-resource.js"></script>
    <script type="text/javascript" src="../c/controladores_1.js"></script>
    <script type="text/javascript" src="../c/ctrl4.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-78271394-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body ng-app="talentApp" class="fondo-azul">


<!-- ...........................................................................................................  -->


<div>
	<div class="container-fluid" style="margin-bottom:50px;">

        <br>
        <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
            <section class="col-xs-6 col-sm-6 col-md-9  col-sm-offset-0 col-md-offset-0">
                <a href="vacantes.php" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-arrow-left"></span></a>
            </section>

            <section class="col-xs-6 col-sm-6 col-md-3  col-sm-offset-0 col-md-offset-0" style="text-align:right;">      
                <button type="button" class="btn btn-primary" onclick="var a = 'configA'; var b = 'configB'; detalles(a,b)"><span class="glyphicon glyphicon-th-list"></span></button>
            </section>
        </section>    



        <section id="configA" style="display:none; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
            <a href="vacantes.php"><button class="btn btn-primary btn-config">Vacantes activas</button></a><br>
            <a href="nuevaVacante.php"><button class="btn btn-primary btn-config">Publicar nueva vacante</button></a><br>
            <a href="hvEmpresa.php"><button class="btn btn-primary btn-config">Perfil de la Empresa</button></a><br>
            <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
        </section>
    
        <section id="configB" style="display:block; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
        </section>



        <br><br><br>


  
<?php

//obtener el id empresa
$Mpresa=$empresa;
//obtener por GET
$idVacante=  $_GET['idiVacante'];


    class general{

        private $db;

        function __construct() {
            require_once '../db/db_connect.php';
            $this->db = new db_connect();
            $this->db->connect();
        }

        function __destruct() {}

        public function obtener($Mpresa,$idVacante){

            //obtenemos las solicitudes con sus respectivas vacantes asociadas
            $Mpresa=$Mpresa;
            $idVacante=$idVacante;
            $sqlb = " SELECT * FROM solicitudes AS so INNER JOIN vacantes AS va ON so.idVacante=va.idVacante WHERE so.idEmpresa='$Mpresa' AND so.estadoEmpresa=0 AND so.estadoPersona=1 AND va.idVacante='$idVacante' ";
            if($resultb = mysqli_query($this->db->connect(), $sqlb)){
                
                $rowsb = array();
                $idi=0;
                $idi2=100000;
                  while($rb = mysqli_fetch_array($resultb)) {
                    $rowsb[] = $rb;
                    


                    
                    //obtenemos las personas asociadas a las solicitudes
                    $idPersona = $rb['idPersona'];

                    $sql = " SELECT * FROM personas AS x INNER JOIN civiles AS y ON x.idCivil = y.idCivil WHERE x.idPersona='$idPersona' ";
                    if($result = mysqli_query($this->db->connect(), $sql)){

                    while($r = mysqli_fetch_array($result)){

                        //dentro de este while mostramos la informacion personal de ESTA persona
                        $images=$r['imgPersona'];


                        echo '
                            <div style="clear:both; height:30px;">
                            </div>                            

                            <div class="row" style="border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center;">
                                <h3>Hoja de vida de <b>'.$r['nombrePersona'].'</b></h3>
                            </div>

                            <div style="clear:both; height:10px;">
                            </div>
                            
                            <div style="background-color:#C9DAFB; border:solid 2px #666666; border-radius:2px; clear:both;" class="container-fluid">  <!-- div container fluid main-->
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1" style="padding:0;">
                                <h3 class="fondo-oscuro">Información Personal</h3>
                            </div> 

                               ';
                        

                        echo '

                            <br>
                            <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1 fondo-gris"> 
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-1" style="color:#585858; margin-top:20px; padding-bottom:20px;">
                                    ';
                                    
                                    //si la foto no esta vacia, se muestra la ESTA FOTO
                                    if(!empty($images) && $images!='' && $images!=NULL){ echo '<img style="width:50%; border:solid 1px #d5d5d5; border-radius:5px;" src="../c/fotos/'.$images.'">'; }

                        echo '  </div>  <!-- cierra las columnas del div de la foto -->



                                <div class="col-xs-12 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858; margin-top:10px;">
                                        
                                        <h5><b>Nombre y apellidos: </b>'.$r['nombrePersona'].'</h5>
                                        <h5><b>Fecha de Nacimiento: </b>'.$r['nacimientoPersona'].'</h5>
                                        <h5><b>Estado civil: </b>'.$r['nombreCivil'].'</h5>
                                        <h5><b>Dirección de residencia: </b>'.$r['direccionPersona'].'</h5>';
      

                                                    //consulta e imprime esta ciudad y el pais
                                                    $idCiudad=$r['idCiudad'];
                                                    $sql15 = " SELECT nombreCiudad FROM ciudades WHERE idCiudad='$idCiudad' ";
                                                    if($result15 = mysqli_query($this->db->connect(), $sql15)){

                                                        $r15 = mysqli_fetch_array($result15);
                                                        echo $r15['nombreCiudad'].' - ';
                                                    }else{ echo 'Ciudad - ';}

                                                    $idPais=$r['idPais'];
                                                    $sql16 = " SELECT nombrePais FROM paises WHERE idPais='$idPais' ";
                                                    if($result16 = mysqli_query($this->db->connect(), $sql16)){

                                                        $r16 = mysqli_fetch_array($result16);
                                                        echo $r16['nombrePais'];
                                                    }else{ echo 'Pa&acute;s';}

                                     echo '
                                        <h5><b>Correo electrónico: </b>'.$r['emailPersona'].'</h5>
                                        <h5><b>Teléfono: </b>'.$r['celularPersona'].'</h5>  
                                        <br><br>


                                </div>  <!-- cierra las columnas del div detalles nombre, fecha nacimineto... -->

                            </section><br><br><br>



                            ';

                        

                        echo '<section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                                        <h3 class="fondo-oscuro">Información Academica</h3>';

                
                        $sql2 = " SELECT * FROM academicas WHERE idPersona='$idPersona' ";
                        if($result2 = mysqli_query($this->db->connect(), $sql2)){

                            $rows2 = array();
                            while($r2 = mysqli_fetch_array($result2)) {
                                
                                echo '
                                        <div class="container-fluid fondo-gris">
                                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                                <b>Titulo obtenido:</b>   '.$r2['tituloAcademica'].'   <br>
                                                '.$r2['finalizacionAcademica'].'
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                                <b>Institución:</b> '.$r2['institucionAcademica'].' <br>';
                                                
                                                //consulta e imprime esta ciudad y el pais
                                                $idCiudad=$r2['idCiudad'];
                                                $sql20 = " SELECT nombreCiudad FROM ciudades WHERE idCiudad='$idCiudad' ";
                                                if($result20 = mysqli_query($this->db->connect(), $sql20)){

                                                    $r20 = mysqli_fetch_array($result20);
                                                    echo $r20['nombreCiudad'].' - ';
                                                }else{ echo 'Ciudad - ';}

                                                $idPais=$r2['idPais'];
                                                $sql21 = " SELECT nombrePais FROM paises WHERE idPais='$idPais' ";
                                                if($result21 = mysqli_query($this->db->connect(), $sql21)){

                                                    $r21 = mysqli_fetch_array($result21);
                                                    echo $r21['nombrePais'];
                                                }else{ echo 'Pa&acute;s';}


                                // cierra las tags HTML
                                echo '     
                                            </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                                
                                       
                                    
                                    ';
                                    

                                    //comprueba si esta seteada certificacion academica o si trae algo
                                    $certificacionAcademica = $r2['certificacionAcademica'];
                                    //verificamos si es PDF
                                    $formatoA = substr($certificacionAcademica, -3);
                                    if($formatoA=='pdf' || $formatoA=='PDF'){
                                        echo '<a target="_blank" href="../c/certificacionesAcademicas/'.$certificacionAcademica.'" role="button" class="btn btn-default">ver certificaci&oacute;n</a>';    
                                    }else{

                                    if(isset($r2['certificacionAcademica'])&&$r2['certificacionAcademica']!=NULL && $r2['certificacionAcademica']!=''){echo '<a target="_blank" href="viewfinder.php?files=../c/certificacionesAcademicas/'.$certificacionAcademica.' " role="button" class="btn btn-default">ver certificaci&oacute;n</a>';}
                                    
                                    }

                                echo '     </div>
                                        </div>';    

                            }

                        }

                        echo '</section>';













                        echo '<section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                                        <h3 class="fondo-oscuro">Experiencia Laboral</h3>';

                
                        $sql3 = " SELECT * FROM laborales WHERE idPersona='$idPersona' ";
                        if($result3 = mysqli_query($this->db->connect(), $sql3)){

                            $rows3 = array();
                            while($r3 = mysqli_fetch_array($result3)) {
                                
                                echo '
                                        <div class="container-fluid fondo-gris">
                                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                                <b>Cargo:</b> '.$r3['cargoLaboral'].' <br>
                                                <p>Desde '.$r3['inicioLaboral'].' hasta '.$r3['finalizacionLaboral'].'   </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                                <b>Empresa:</b> '.$r3['empresaLaboral'].' <br>';
                                                
                                                //consulta e imprime esta ciudad y el pais
                                                $idCiudad=$r3['idCiudad'];
                                                $sql30 = " SELECT nombreCiudad FROM ciudades WHERE idCiudad='$idCiudad' ";
                                                if($result30 = mysqli_query($this->db->connect(), $sql30)){

                                                    $r30 = mysqli_fetch_array($result30);
                                                    echo $r30['nombreCiudad'].' - ';
                                                }else{ echo 'Ciudad - ';}

                                                $idPais=$r3['idPais'];
                                                $sql31 = " SELECT nombrePais FROM paises WHERE idPais='$idPais' ";
                                                if($result31 = mysqli_query($this->db->connect(), $sql31)){

                                                    $r31 = mysqli_fetch_array($result31);
                                                    echo $r31['nombrePais'];
                                                }else{ echo 'Pa&acute;s';}


                                // cierra las tags HTML
                                echo '   
                                            </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
      
                                    ';



                                    $recomendacionLaboral = $r3['recomendacionLaboral'];
                                    //verificamos si es PDF
                                    $formato = substr($recomendacionLaboral, -3);
                                    if($formato=='pdf' || $formato=='PDF'){
                                        echo '<a target="_blank" href="../c/certificacionesLaborales/'.$recomendacionLaboral.'" role="button" class="btn btn-default">ver recomendaci&oacute;n</a>';  
                                    }else{
                                        //comprueba si esta recomendacion laboral trae algo y de ser asi se muestra el boton VER RECOMENDACION LABORAL
                                        if(!empty($r3['recomendacionLaboral']) && $r3['recomendacionLaboral']!=NULL && $r3['recomendacionLaboral']!=''){ echo '<a target="_blank" href="viewfinder.php?files=../c/certificacionesLaborales/'.$recomendacionLaboral.' " role="button" class="btn btn-default">ver recomendaci&oacute;n</a>'; }
                                    }  

                                echo '     </div>
                                        </div>';    

                            }

                        }
                       
                        echo '</section>';




                       

                        $idi=$idi+1;
                        $idi2=$idi2+1;

                        echo '          <article style="clear:both; height:40px;"> <br><br><br> 
                                        </article> <!-- solo para espacio-->
                                        
                                            <article class="col-xs-12 col-sm-12 col-md-3 col-sm-offset-0 col-md-offset-9" id="'.$idi.'" style="display:block;">
                                                <input type="hidden" name="persona" value="'.$rb['idPersona'].'">
                                                <input type="hidden" name="solicitud" value="'.$rb['idSolicitud'].'">
                                                <button onclick="detalles('.$idi.','.$idi2.')" class="btn btn-primary">Aceptar solicitud</button>
                                            </article>

                                            <article class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-0 col-md-offset-8">
                                                <form action="aceptarCandidato.php" method=POST id="'.$idi2.'" style="display:none; border:solid 1px #ff7f7f; border-radius:5px; padding:5px;">
                                                    <input type="hidden" name="persona" value="'.$rb['idPersona'].'">
                                                    <input type="hidden" name="vacante" value="'.$rb['idVacante'].'">
                                                    <input type="hidden" name="solicitud" value="'.$rb['idSolicitud'].'">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="candidatos.php" class="btn btn-danger" role="button">Cancelar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-danger">Aceptar solicitud</button>
                                                </form>
                                            </article>

                                        <article style="clear:both; height:40px;"> <br><br><br> 
                                        </article> <!-- solo para espacio-->

                            </div> ';



                        echo '<article style="clear:both; height:40px;"> <br><br><br> </article>';    



                    } // cierra el while que trae toda la informacion del candidato

                    } // cierra el if

                }// cierra el while de las solicitudes



                //echo json_encode($rows);

            }else{
                echo "no se encontraron candidatos para esta vacante";
            }

        }

    }


$objPersona = new general();
$objPersona -> obtener($Mpresa,$idVacante);


?>

  

        <div>
            <div class="container-fluid">

            



            <br><br>              
            </div>  <!-- div container fluid-->

        </div>  <!--cierra main -->


       






















            
                    
    </div>  <!-- div container fluid-->

</div>  <!--cierra main -->


<!-- ...........................................................................................................  -->





</body>
</html>