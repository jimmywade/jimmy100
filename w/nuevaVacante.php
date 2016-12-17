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
    <title> Talent - Nueva vacante </title>
    <link rel="shortcut icon" href="../media/logo10.png" type="image/png" />
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles.css" />
    <script type="text/javascript" src="../libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular-resource.js"></script>
    <script type="text/javascript" src="../c/controladores_1.js"></script>
    <script type="text/javascript" src="../c/ctrl3.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-78271394-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body class="fondo-azul" ng-app="talentApp">


<!-- ...........................................................................................................  -->


<div id="login2">
    <div class="container-fluid" style="margin-bottom:50px;" ng-controller="ctrlNuevaVacante1">
           
        <div class="container-fluid" style="margin:0;" data-ng-init="pasarCorp2(<?php echo $empresa; ?>)">
            <a href="vacantes.php">
            <section class="col-xs-2 col-sm-2 col-md-2  col-sm-offset-0 col-md-offset-1" style="margin-top:20px; text-align:left;" ng-repeat="pos in posts300 | limitTo: 1">
               <div style="border:solid 1px #337AB7; background-color:#C9DAFB; border-radius:3px;  box-shadow: 5px 5px 5px #888888;text-align:center;"><h6><b>{{pos.comercialEmpresa}}</b></h6></div>
            </section>
            </a>


            <section class="col-xs-7 col-sm-7 col-md-7  col-xs-offset-0 col-sm-offset-0 col-md-offset-1" style="margin-top:20px; text-align:right;">           
                <button type="button" class="btn btn-primary" onclick="var a = 'configA'; var b = 'configB'; detalles(a,b)"><span class="glyphicon glyphicon-th-list"></span></button>
            </section>

                <section id="configA" style="display:none; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                    <a href="vacantes.php"><button class="btn btn-primary btn-config">Vacantes Activas</button></a><br>
                    <a href="hvEmpresa.php"><button class="btn btn-primary btn-config">Perfil de la Empresa</button></a><br>
                    <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
                </section>
            
                <section id="configB" style="display:block; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                </section>
        </div>




        <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1" style="margin-top:40px;" >
        
            <div class="container-fluid fondo-vacantes2" style="padding-bottom:40px;">
                
                <form id="maria">
                    <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">

                        <section id="zaa" style="display:block; margin-top:30px; margin-bottom:10px; clear:both;">
                                <div id="xad" class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <label for="zac">Cargo:</label>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-9 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <div class="form-group">
                                        <input ng-model="cargo5" type="text" maxlength="50" class="form-control" id="zac" required>
                                    </div>
                                </div>
                        </section>

                        <section id="zba" style="margin-top:130px; clear:both;">
                                <div id="zbb" class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <label for="zac">Descripción:</label>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-9 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <div class="form-group">
                                        <textarea ng-model="descripcion" class="form-control" rows="30" id="des" maxlength="1020" required></textarea>
                                        <p><i>Máximo 900 caracteres</i></p>
                                    </div>
                                </div>
                        </section>


                    </div>







                    <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        

                        <hr>
                        <h4>Lugar de trabajo</h4>

                        <div class="form-group" style="clear:both; padding:0;">
                            <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                <label>Seleccionar Pa&iacute;s y Ciudad:</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0">
                                <section class="container-fluid fondo-gris2" style="padding:0; border-radius:8px; border:solid 2px #E0EDFA; color:#585858;" id="payciu">
                                    <div style="clear:both; height:15px;"></div> <!-- solo para dar espacio -->
                                    <div><span>&nbsp;&nbsp;<b>Buscar</b> </span><input type="text" ng-model="searchKeyword"></div>
                                    <div style="clear:both; height:20px;"></div> <!-- solo para dar espacio -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                                        <table class="table">
                                            <tr ng-repeat="post555 in posts555 | filter: searchKeyword ">
                                                <td>{{post555.nombrePais}}</td>
                                                <td>-</td>
                                                <td>{{post555.nombreCiudad}}</td>
                                                <td><input id="{{post555.idCiudad}}" name="ubicacion" type="radio" ng-click="seteNV(post555.nombrePais,post555.nombreCiudad,post555.idPais,post555.idCiudad)" ></td>
                                            </tr>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>


                        <div style="clear:both; height:10px;">
                            
                        </div>
                        <hr>

                        <br>
                        <section style="clear:both;">
                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                <b>Duraci&oacute;n del contrato:</b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                <input name="5" ng-model="contrato" type="text" class="form-control" id="empresa" maxlength="30" placeholder="Ejemplo: 6 meses" required>
                            </div>
                        </section>


                        <br><br>
                        <section style="clear:both;">
                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                <b>Salario:</b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                <input name="6" ng-model="salario" type="text" class="form-control" id="empresa" maxlength="30" placeholder="Ejemplo: 900000" required>
                            </div>
                        </section>                

                        

                        
                        <div style="border:solid 1px #d5d5d5; border-radius:5px; margin-top:80px; padding:20px;">
                            

                            <section style="clear:both;">
                                <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Fecha Entrevista: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                    <input name="7" ng-model="fecha5" type="date" maxlength="10" placeholder="AAAA-MM-DD" class="form-control" id="fecha" required>
                                </div>
                            </section>


                            <br><br>
                            <section style="clear:both;">
                                <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Hora inicial jornada de entrevistas: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                    <input name="8" ng-model="hora5" type="time" maxlength="25" class="form-control" id="hora" required>
                                </div>
                            </section>


                            <section id="indique" style="display:none; margin-bottom:20px;">
                                <section style="clear:both; height:20px;">
                                </section>                    
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 rojo" style="padding:0;">
                                    <h6>&nbsp;Informaci&oacute;n entrevista PRESENCIAL o VIRTUAL requerida</h6>
                                </div>
                            </section>

                            <section style="clear:both; height:10px;">
                            </section>


                            <section style="clear:both;">
                                <div class="col-xs-12 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-1" style="padding:0;">
                                    <label class="radio-inline"><input onclick="var p='presencial'; var q='virtual'; entrevista(p,q)" type="radio" name="optradio">
                                        Entrevista presencial</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <label class="radio-inline"><input onclick="var p='virtual'; var q='presencial'; entrevista(p,q)" type="radio" name="optradio">Entrevista virtual</label>
                                </div>
                            </section>

                            
                            <section id="virtual" style="clear:both; color:#ff4c4c; display:none; margin-top:30px;">
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Nombre o dirección web del servicio que utilizará: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                    <input name="9" ng-model="sweb" type="text" class="form-control" id="empresa" placeholder="Ejemplo: Skype" maxlength="50" required>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0; margin-top:20px;">
                                    <b>Ingrese información adicional: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                    <input name="10" ng-model="adicional" type="text" class="form-control" id="adc" placeholder="Ejemplo: Usuario de skype" maxlength="100" required>
                                </div>
                            </section>


                            <section id="presencial" style="clear:both; color:#ff4c4c; display:none; margin-top:30px;">
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Direccion oficial del lugar donde se realizar&aacute; la entrevista:</b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                    <input name="11" ng-model="direccion5" type="text" class="form-control" id="empresa" placeholder="Ejemplo: Barrio Chanis, Calle 30 No. 49-66" maxlength="100" required>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="padding:0; margin-top:20px;">
                                    <b>Punto de referencia: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                    <input name="12" ng-model="referencia" type="text" class="form-control" id="empresa" placeholder="Ejemplo: al lado del Hotel Hilton" maxlength="100" required>
                                </div>
                            </section>





                            
                            <section style="clear:both; margin-top:200px;">
                                <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Email de contacto: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                    <input name="13" ng-model="email5" type="email" class="form-control" id="email" maxlength="40" required>
                                </div>
                            </section>


                            <br><br>
                            <section style="clear:both;">
                                <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                    <b>Tel&eacute;fono de contacto: </b>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                    <input name="14" ng-model="telefono" type="text" class="form-control" id="telefono" maxlength="12" required>
                                </div>
                            </section>


                            <section style="clear:both;">
                            </section>

                        </div>

                        <i style="font-size:10px;">Esta informaci&oacute;n solo ser&aacute; visible para los candidatos preseleccionados por usted</i>


                        <br>
                        <section style="clear:both; margin-top:50px;">
                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                <b>Fecha de finalizaci&oacute;n de la publicaci&oacute;n:</b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                <input ng-model="fin5" type="date" maxlength="10" placeholder="AAAA-MM-DD" class="form-control" id="empresa" required>
                            </div>
                        </section>


                        <br><br><br>
                        <section style="clear:both;">
                            <div class="col-xs-12 col-sm-12 col-md-5  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                <b>Cantidad max. de candidatos a entrevistar:</b>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7  col-sm-offset-0 col-md-offset-0">
                                <input ng-model="cantidad" type="number" class="form-control" id="empresa" maxlength="4" required>
                            </div>
                        </section>                                

                        <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="margin-top:40px;">
                            <section id="confirmar" class="col-xs-12 col-sm-12 col-md-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="display:none; background-color:red; margin-left:-14px; border-radius:6px; color:#FFFFFF; font-size:14px; padding:20px; box-shadow: 5px 5px 5px #888888;">
                                Esta seguro que desea publicar esta vacante?
                                <table style="width:100%;">
                                    <tr><td><button onclick="var identificador='confirmar'; single(identificador)" class="btn btn-danger">no</button></td><td style="text-align:right;"><button ng-click="actualizarVacante()" type="submit" class="btn btn-danger">si</button></td></tr>
                                </table>
                            </section>
                            <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
                                <button style="margin-left:-28px;" class="btn btn-danger" ng-click="actualizarVacante(<?php echo $empresa; ?>)" onclick="var identificador='confirmar'; single(identificador)">Publicar esta vacante</button>
                            </section>
                        </section>


                    </div>
                </form>




            <!-- </form>  -->

            </div>

        </section>


            
                    
    </div>  <!-- div container fluid-->

</div>  <!--cierra main -->


<!-- ...........................................................................................................  -->



</body>
</html>