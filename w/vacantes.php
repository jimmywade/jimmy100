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



<div class="container-fluid" style="margin-bottom:50px;" ng-controller="mc300">

    <div class="container-fluid" style="margin:0;" data-ng-init="pasarCorp(<?php echo $empresa; ?>)">
        <section class="col-xs-2 col-sm-2 col-md-2  col-sm-offset-0 col-md-offset-1" style="margin-top:20px; text-align:left;" ng-repeat="pos in posts300 | limitTo: 1">
           <div style="border:solid 1px #337AB7; background-color:#C9DAFB; border-radius:3px;  box-shadow: 5px 5px 5px #888888;text-align:center;"><h6><b>{{pos.comercialEmpresa}}</b></h6></div>
        </section>


        <section class="col-xs-8 col-sm-8 col-md-8  col-sm-offset-0 col-md-offset-0" style="margin-top:20px; text-align:right;">
            <button type="button" class="btn btn-primary" onclick="var a = 'configA'; var b = 'configB'; detalles(a,b)"><span class="glyphicon glyphicon-th-list"></span></button>
        </section>

        <section id="configA" style="display:none; text-align:right;" class="col-xs-8 col-sm-8 col-md-8  col-sm-offset-0 col-md-offset-0">
            <a href="nuevaVacante.php"><button class="btn btn-primary btn-config">Publicar nueva vacante</button></a><br>
            <a href="hvEmpresa.php"><button class="btn btn-primary btn-config">Perfil de la Empresa</button></a><br>
            <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
        </section>
    
        <section id="configB" style="display:block; text-align:right;" class="col-xs-8 col-sm-8 col-md-8  col-sm-offset-0 col-md-offset-0">
        </section>
    </div>



    <!-- oculta la template de las vacantes si no hay ninguna que mostrar-->
    <div id="party" style="display:none;">
        <div class="container-fluid" style="margin-top:75px;">
            <div class="fondo-blue col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1" style="background-color:#C9DAFB; border-radius:10px;">
                <br>
                <h3>&nbsp;&nbsp;No hay ninguna vacante creada</h3>
                <br>
                <p><i>&nbsp;&nbsp;Para crear una nueva vacante ve al menu ubicado en la parte superior derecha y selecciona Publicar nueva vacante</i></p>
                <br>
            </div>
        </div>
    </div>



    <div id="celebration" class="container-fluid" style="display:block;">
        
        <div class="container-fluid" style="margin-top:75px;">
            <div class="fondo-blue col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">

                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="color:#585858;" ng-repeat="post300 in posts300">
                    <table id="{{post300.nuevoVisible}}" data-ng-init="wildparty(post300.ocultadorEmpresa)" ng-click="invisibleBond(post300.nuevoVisible,post300.nuevoInvisible)" width=100% style="display:block;" >
                        <tr>
                            <td width=50%><b>{{post300.tituloVacante}}</b></td>
                            <td width=50%><b>Lugar de trabajo:</b> {{post300.nombreCiudad}} - {{post300.nombrePais}}</td>
                        </tr>
                        <tr>
                            <td width=50%>{{post300.descripcionMini}}</td>
                            <td width=50%><b>Duración del contrato:</b> {{post300.contratoVacante}}<br><b>Salario:</b> {{post300.salarioVacante}}</td>
                        </tr>
                    </table>
                    <form>
                    <table id="{{post300.nuevoInvisible}}" width=100%  style="display:none;">
                        <tr>
                            <td width=50%><b>Título:</b><br><input ng-model="$parent.titu" type="text" class="form-control" placeholder="{{post300.tituloVacante}}"></td>
                            <td width=50%>&nbsp;&nbsp;<b>Empresa: </b>{{post300.comercialEmpresa}}</td>
                        </tr>
                        <tr>
                            <td width=50%><b>Descripción:</b><br><textarea ng-maxlength="900" rows="20" cols="70" type="text" name="userName" ng-model="$parent.desc" placeholder="{{post300.descripcionVacante}}"></textarea></td>
                            <td width=50%>&nbsp;&nbsp;<b>Lugar de trabajo: </b>{{post300.nombreCiudad}} - {{post300.nombrePais}}<br>&nbsp;&nbsp;<b>Duración del contrato: </b>{{post300.contratoVacante}}<br>&nbsp;&nbsp;<b>Salario: </b>{{post300.salarioVacante}}<hr><b>&nbsp;&nbsp;Modalidad de la entrevista:</b> {{post300.way}}<br><b>&nbsp;&nbsp;Dirección entrevista:</b> {{post300.direccionEntrevista}}<br><b>&nbsp;&nbsp;Información:</b> {{post300.referenciaEntrevista}}<br><b>&nbsp;&nbsp;Fecha Entrevista:</b> {{post300.fechaEntrevista}}<br><b>&nbsp;&nbsp;Email de contacto para entrevista:</b> {{post300.emailEntrevista}}<br><b>&nbsp;&nbsp;Teléfono de contacto para entrevista:</b> {{post300.telefonoEntrevista}}<hr>&nbsp;&nbsp;<b>Fecha de publicación de la vacante: </b><br>&nbsp;&nbsp;{{post300.fechaPublicacion}} <br>&nbsp;&nbsp;<b>Fecha de finalización de la vacante: </b><br>&nbsp;&nbsp;{{post300.fechaFinalizacion}}<br>&nbsp;&nbsp;<b>Ampliar el numero de aspirantes permitidos: </b><input style="border:solid 1px #C9DAFB;" id="{{post300.nuevoInvisible + 'x'}}" class="form-control" type="number" name="cantidad" ng-model="$parent.cant" placeholder="{{post300.aspirantesVacante}}"><br>&nbsp;&nbsp;<button type="submit" ng-click="mandar300(post300.idVacante,post300.aspirantesVacante,post300.nuevoInvisible)" class="btn btn-danger" title="save">Guardar</button><br><br></td>
                        </tr>
                    </table>
                    </form>
                    <table width=100% style="border-bottom:solid 1px #C0C0C0;">
                        <tr>
                        <td width=50%></td>
                        <td width=50%><a href="convocados.php?idiVacante={{post300.idVacante}}" class="btn btn-primary" role="button">Convocados</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="candidatos.php?idiVacante={{post300.idVacante}}" class="btn btn-primary" role="button">Aspirantes</a>&nbsp;&nbsp;&nbsp;&nbsp;<button ng-click="invisibleBond(post300.nuevoVisible,post300.nuevoInvisible)" class="btn btn-primary">Editar vacante</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> <br><br>


    </div>  <!-- div container fluid-->




        
                
</div>  <!-- div container fluid-->




<!-- ...........................................................................................................  -->



</body>
</html>