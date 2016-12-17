
<?php

session_start();

$idPeople=$_SESSION['empleado'];


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
    <script type="text/javascript" src="../c/controlador4.js"></script>
    <script type="text/javascript" src="vista1.js"></script>
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
                <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
            </section>
        
            <section id="configB" style="display:block; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
            </section>



        <article style="clear:both;">
                       
        </article> <!-- solo para dar espacio-->
 

        <div ng-controller="mc200">
            <div data-ng-init="hitmc200(<?php echo $idPeople; ?>)">
                <div class="container-fluid" style="margin-top:30px;">
                    <div class="fondo-ambos col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">  
                        <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="color:#585858;" ng-repeat="post200 in posts200" ng-click="invisibleBond(post200.nuevoVisible,post200.nuevoInvisible)">
                            <table width=100% id="{{post200.nuevoVisible}}" style="display:block; border-bottom:solid 1px #C0C0C0;">
                                <tr>
                                    <td width=50%><b>{{post200.tituloVacante}}</b></td>
                                    <td width=50%><b>Empresa:</b> {{post200.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post200.descripcionMini}}</td>
                                    <td width=50%><b>Lugar de trabajo:</b> {{post200.nombreCiudad}} - {{post200.nombrePais}}<br><b>Duración del contrato:</b> {{post200.contratoVacante}}<br><b>Salario:</b> {{post200.salarioVacante}}<br></td>
                                </tr>
                            </table>

                            <table width=100% id="{{post200.nuevoInvisible}}" style="display:none; border-bottom:solid 1px #C0C0C0;">
                                <tr>
                                    <td width=50%><b>{{post200.tituloVacante}}</b></td>
                                    <td width=50%>&nbsp;&nbsp;<b>Empresa:</b> {{post200.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post200.descripcionVacante}}</td>
                                    <td width=50%><b>&nbsp;&nbsp;Lugar de trabajo:</b> {{post200.nombreCiudad}} - {{post200.nombrePais}}<br><b>&nbsp;&nbsp;Duración del contrato:</b> {{post200.contratoVacante}}<br><b>&nbsp;&nbsp;Salario:</b> {{post200.salarioVacante}}<br><br> <hr><b>&nbsp;&nbsp;Fecha entrevista:</b> {{post200.fechaEntrevista}}<br><b>&nbsp;&nbsp;Modalidad de la entrevista:</b> {{post200.modalidadEntrevista}}<br><b>&nbsp;&nbsp;Dirección:</b> {{post200.servicioEntrevista}}<br><b>&nbsp;&nbsp;Informacion:</b> {{post200.adicionalEntrevista}}<br><b>&nbsp;&nbsp;Email de contacto:</b> {{post200.emailEntrevista}}<br><b>&nbsp;&nbsp;Telefono de contacto:</b> {{post200.telefonoEntrevista}}<hr></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
        </div>




        <div ng-controller="mc220">
            <div data-ng-init="hitmc220(<?php echo $idPeople; ?>)">
                <div class="container-fluid">
                    <div class="fondo-empleador col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">  
                        <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="color:#585858;" ng-repeat="post220 in posts220" ng-click="invisibleBond3(post220.nuevoVisible,post220.nuevoInvisible)">
                            <table width=100% id="{{post220.nuevoVisible}}" style="display:block; border-bottom:solid 1px #C0C0C0;">
                                <tr>
                                    <td width=50%><b>{{post220.tituloVacante}}</b></td>
                                    <td width=50%><b>Empresa:</b> {{post220.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post220.descripcionMini}}</td>
                                    <td width=50%><b>Lugar de trabajo:</b> {{post220.nombreCiudad}} - {{post220.nombrePais}}<br><b>Duración del contrato:</b> {{post220.contratoVacante}}<br><b>Salario:</b> {{post220.salarioVacante}}<br></td>
                                </tr>
                            </table>
                            <table width=100% id="{{post220.nuevoInvisible}}" style="display:none; border-bottom:solid 1px #C0C0C0;">
                                <tr>
                                    <td width=50%><b>{{post220.tituloVacante}}</b></td>
                                    <td width=50%>&nbsp;&nbsp;<b>Empresa:</b> {{post220.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post220.descripcionVacante}}</td>
                                    <td width=50%><b>&nbsp;&nbsp;Lugar de trabajo:</b> {{post220.nombreCiudad}} - {{post220.nombrePais}}<br><b>&nbsp;&nbsp;Duración del contrato:</b> {{post220.contratoVacante}}<br><b>&nbsp;&nbsp;Salario:</b> {{post220.salarioVacante}}<br><br></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
        </div>




        <div ng-controller="mc230">
            <div data-ng-init="hitmc230(<?php echo $idPeople; ?>)">
                <div class="container-fluid">
                    <div class="fondo-aspirante col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">

                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4 col-md-2 col-sm-offset-0 col-md-offset-5">
                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar: &nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-5">
                                    <input class="form-control" type="text" ng-model="searchKeyword">
                                </div>
                            </div>

                            <br>
                            <hr>

                        <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="color:#585858;" ng-repeat="post230 in posts230 | filter: searchKeyword" ng-click="invisibleBond4(post230.nuevoVisible,post230.nuevoInvisible)">
                            <table id="{{post230.nuevoVisible}}" width=100% style="display:block;" ng-click="detallesAB(post230.nuevoVisible,post230.nuevoInvisible)">
                                <tr>
                                    <td width=50%><b>{{post230.tituloVacante}}</b></td>
                                    <td width=50%><b>Empresa:</b> {{post230.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post230.descripcionMini}}</td>
                                    <td width=50%><b>Lugar de trabajo:</b> {{post230.nombreCiudad}} - {{post230.nombrePais}}<br><b>Duración del contrato:</b> {{post230.contratoVacante}}<br><b>Salario:</b> {{post230.salarioVacante}}<br></td>
                                </tr>
                            </table>
                            <table id="{{post230.nuevoInvisible}}" width=100% style="display:none;" ng-click="detallesAB(post230.nuevoVisible,post230.nuevoInvisible)">
                                <tr>
                                    <td width=50%><b>{{post230.tituloVacante}}</b></td>
                                    <td width=50%>&nbsp;&nbsp;<b>Empresa:</b> {{post230.comercialEmpresa}}</td>
                                </tr>
                                <tr>
                                    <td width=50%>{{post230.descripcionVacante}}</td>
                                    <td width=50%><b>&nbsp;&nbsp;Lugar de trabajo:</b> {{post230.nombreCiudad}} - {{post230.nombrePais}}<br><b>&nbsp;&nbsp;Duración del contrato:</b> {{post230.contratoVacante}}<br><b>&nbsp;&nbsp;Salario:</b> {{post230.salarioVacante}}<br><br></td>
                                </tr>
                            </table>
                            <table width=100% style="border-bottom:solid 1px #C0C0C0;">
                                <tr>
                                    <td>
                                        <form id="{{post230.nuevoVisible + 'a'}}" style="display:block;" class="col-xs-12 col-sm-4 col-md-2  col-sm-offset-8 col-md-offset-10" style="padding:0;">
                                            <button class="btn btn-danger" ng-click="detallesAB(post230.nuevoVisible + 'a', post230.nuevoVisible + 'b' )">Enviar solicitud</button>
                                        </form> 
                                        <div id="{{post230.nuevoVisible + 'b'}}" style="display:none; padding:5px; background-color:#E8E8E8; border-radius:10px;" class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0"><span><i>Esta seguro de que desea aplicar a esta vacante?</i></span>
                                            <form class="col-xs-12 col-sm-6 col-md-4  col-sm-offset-6 col-md-offset-8" style="padding:0;">
                                                <button ng-click="detallesAB(post230.nuevoVisible + 'a', post230.nuevoVisible + 'b' )" class="btn btn-danger">Cancelar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button ng-click="enviarSolicitud(post230.idVacante,post230.idEmpresa,<?php echo $idPeople; ?>); detallesAB(post230.nuevoVisible + 'a', post230.nuevoVisible + 'b')" class="btn btn-danger">Enviar solicitud</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <br><br>                
    </div>  <!-- div container fluid-->

</div>  <!--cierra main -->


<!-- ...........................................................................................................  -->






</body>
</html>