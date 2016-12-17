<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> Talent | Sign Up </title>
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
<body class="fondo-azul" ng-app="talentApp">


<!-- ...........................................................................................................  -->



<div id="registroW" class="container col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2" style="margin-top:50px; margin-bottom:50px; display:block;" ng-controller="myController555">


        <form class="form-horizontal" role="form" id="registroEmpresas">
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="ncomer">Nombre comercial:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <input ng-model="com" type="text" class="form-control" id="ncomer" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="ec">Sector:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <select ng-model="sector" class="form-control" id="ec" style="border:solid 1px #E0EDFA;" required>
                        <option value="1">Agropecuario</option>
                        <option value="2">Aeroespacial</option>
                        <option value="3">Comercio</option>
                        <option value="4">Comunicaciones</option>
                        <option value="5">Banca y Finanzas</option>
                        <option value="6">Construcción</option>
                        <option value="7">Educación</option>
                        <option value="8">Logistica</option>
                        <option value="9">Minería</option>
                        <option value="10">Energía</option>
                        <option value="11">Solidario</option>
                        <option value="12">Salud</option>
                        <option value="13">Tecnología</option>
                        <option value="14">Transporte</option>
                        <option value="15">Turismo</option>
                        <option value="9999">Otro sector</option>
                    </select>
                </div>
            </div>



            <div class="form-group" style="clear:both; padding:0;">
                <div class="col-xs-3 col-sm-3 col-md-3  col-sm-offset-0 col-md-offset-0" style="text-align:right;">
                    <label>Seleccionar Pa&iacute;s y Ciudad:</label>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-sm-offset-0 col-md-offset-0">
                    <section class="container-fluid fondo-gris2" style="padding:0; border-radius:8px; border:solid 2px #E0EDFA;" id="payciu">
                        <div style="clear:both; height:15px;"></div> <!-- solo para dar espacio -->
                        <div style="color:#585858;"><span>&nbsp;&nbsp;<b>Buscar</b> </span><input type="text" ng-model="searchKeyword"></div>
                        <div style="clear:both; height:20px;"></div> <!-- solo para dar espacio -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                            <table class="table">
                                <tr ng-repeat="post555 in posts555 | filter: searchKeyword ">
                                    <td>{{post555.nombrePais}}</td>
                                    <td>-</td>
                                    <td>{{post555.nombreCiudad}}</td>
                                    <td><input id="{{post555.idCiudad}}" type="radio" ng-click="sete555(post555.nombrePais,post555.nombreCiudad,post555.idPais,post555.idCiudad)" ></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>    
            

            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="email">Zona de la ciudad / Barrio:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <input ng-model="zona" type="text" class="form-control" id="zon" maxlength="19" style="border:solid 1px #E0EDFA;" placeholder="Ejemplo: Centro" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="dir">Direcci&oacute;n:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <input ng-model="direccion" type="text" class="form-control" id="dir" maxlength="39" style="border:solid 1px #E0EDFA;" placeholder="Ejemplo: Centro, calle 30 No. 49 - 66 " required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="email">Tel&eacute;fono:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <input ng-model="telefono" type="text" class="form-control" id="tel" maxlength="12" style="border:solid 1px #E0EDFA;" placeholder="Teléfono" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="email">Email:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <input ng-model="mail" type="email" class="form-control" id="email" placeholder="Ejemplo: maria123@midominio.com" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="pwd2">Password:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">          
                    <input ng-model="password" type="password" class="form-control" id="pwd" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="pwd">Repetir password:</label>
                <div class="col-xs-6 col-sm-6 col-md-6">          
                    <input ng-model="password2" type="password" class="form-control" id="pwd2" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-xs-3 col-sm-3 col-md-3" for="pwd">&nbsp;</label>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <br>        
                    <p style="font-size:11px; text-align:right; color:#585858;">Al hacer clic en Registrarse, aceptas los <a href="terminosycondiciones.php">Terminos y Condiciones</a> del servicio</p>
                </div>
            </div>


            <div id="somethingW" class="container" style="display:none; clear:both;">
                <div class="col-xs-12 col-sm-12 col-md-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-2" style="background-color: rgba(0, 0, 0, 0.1);">
                    <h5 style="color:red;"><i>Parece que este correo electrónico ya tiene una cuenta en I´M TALENT<br>Por favor ingresa un email diferente ó <a href="login.html">pulsa aqui para iniciar sesión</a></i></h5>
                </div>
            </div>


            <div class="form-group">        
                <div class="col-xs-6 col-sm-4 col-md-2 col-xs-offset-6 col-sm-offset-6 col-md-offset-7">
                    <br>
                    <button ng-click="reg()" class="btn btn-default"><b>&nbsp;&nbsp;&nbsp;Registrarse&nbsp;&nbsp;&nbsp;</b></button>
                </div>
            </div>

        </form>

           
</div>  <!-- div container -->





<div id="loginW" style="display:none; padding:0;">
    <div class="container-fluid" style="margin-top:5%; margin-bottom:5%; padding:0;">
        <div class="col-xs-12 col-sm-12 col-md-8  col-sm-offset-0 col-md-offset-4" style="color:#585858; padding:0;">
            <h4>Su registro ha sido completado exitosamente!</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:6%; height:6%;" src="../media/vb.png">
            <br><br><br><br>
            <a href="login.html" class="btn btn-primary" role="button">Iniciar sesion</a>  
        </div>  <!-- div columna central-->
    </div>  <!-- div container fluid-->
</div>  <!--cierra login -->






<!-- ...........................................................................................................  -->





</body>
</html>