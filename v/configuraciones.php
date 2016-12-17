
<?php

session_start();

$idpp=$_SESSION['empleado'];


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
    <script type="text/javascript" src="../c/controlador5.js"></script>
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
	<div class="container-fluid">

    


        <section style="margin-top:10px;">
            <section class="col-xs-12 col-sm-12 col-md-1  col-xs-offset-1 col-sm-offset-1 col-md-offset-1" >
                <br><a href="main.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></button></a>
            </section>
            <section class="col-xs-6 col-sm-6 col-md-1   col-xs-offset-7 col-sm-offset-7 col-md-offset-8"  style="margin-top:20px; text-align:right;">
                <button type="button" class="btn btn-primary" onclick="var a = 'configA'; var b = 'configB'; detalles(a,b)"><span class="glyphicon glyphicon-th-list"></span></button>
            </section>
        </section>

            <section id="configA" style="display:none; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                <a href="main.php"><button class="btn btn-primary btn-config">Mi curriculum</button></a><br>
                <a href="configuraciones.php"><button class="btn btn-primary btn-config">Configuraciones</button></a><br>
                <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
            </section>
        
            <section id="configB" style="display:block; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
            </section>

        

        <article style="clear:both;">
                       
        </article> <!-- solo para dar espacio-->
 

        <div ng-controller="mailToImTalent">
            <div id="mensaje1" class="row">
                <form style="padding:0; margin:0;" id="formail">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                            <input ng-model="titulo" type="text" class="form-control" id="ttlo" maxlength="50"  placeholder="T&iacute;tulo" style="border:solid 1px #ffffff;" required>
                        </div>
                    </div>

                    <div style="clear:both; height:1px;"></div> <!-- espacio -->

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                            <textarea ng-model="mensaje" id="descr" rows="10" maxleght="900" class="form-control" placeholder="Escribe tu mensaje aqui..." style="border:solid 1px #ffffff;" required></textarea>
                        </div>
                    </div>
                    <div style="clear:both; height:12px;"></div> <!-- espacio -->



        

                    <div class="form-group col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1" style="text-align:right;">
                        <button ng-click="mailto(<?php echo $idpp; ?>)" class="btn btn-default" style="margin-right:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </form>
            </div>
        </div>


    <br><br>                
    </div>  <!-- div container fluid-->

</div>  <!--cierra main -->


<!-- ...........................................................................................................  -->






</body>
</html>