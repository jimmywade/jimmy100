
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
    <script type="text/javascript" src="../c/ctrl1.js"></script>
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


<div id="login">
    <div class="container-fluid" style="margin-bottom:100px;">
       
        
            <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1" style="margin-top:20px; text-align:right;">
                
                <a href="vacantes.php"><button class="btn btn-primary"> << atras </button></a>
                
                <button type="button" class="btn btn-primary" onclick="var a = 'configA'; var b = 'configB'; detalles(a,b)"><span class="glyphicon glyphicon-th-list"></span></button>
                
            </section>



                <section id="configA" style="display:none; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                    <a href="logout.php"><button class="btn btn-primary btn-config">Salir </button></a><br>
                </section>
            
                <section id="configB" style="display:block; text-align:right;" class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
                </section>



        

       




        <section class="container" style="padding:0; margin-top:70px;">
            <div class="col-xs-11 col-sm-11 col-md-9  col-sm-offset-0 col-md-offset-1" style="color:#585858;">
                
               <div style="margin-left:13px;"><h3 style="background-color:#595959; color:#FFF; padding:10px; border-radius:5px;">Informaci&oacute;n general de la empresa</h3></div>
                
            </div>  <!-- cierra las columnas del div informacion de la empresa... -->
        </section>










        <section class="container" style="margin-top:20px;">
        <div class="col-xs-11 col-sm-11 col-md-7  col-sm-offset-0 col-md-offset-1" style="color:#585858;">



            <section ng-controller="ControllerEmpleadores1">
                <div data-ng-init="pasar(<?php echo $empresa; ?>)">
                    <section id="xaa" class="separacion" style="display:block;" ng-repeat="empleador1 in empleadores1">
                        <div id="xab" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label>Nombre comercial:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xaa'; var b = 'xac'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{empleador1.comercialEmpresa}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xaa'; var b = 'xac'; detalles(a,b)" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </section>

                    <section id="xac" class="separacion" style="display:none;">
                        <form id="formComercial">
                        <div id="xad" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="xae">Nombre comercial:</label>
                            <label id="gaa" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <input ng-model="comercial" type="text" class="form-control" id="xae">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <button type="submit" class="btn btn-default" ng-click="updateComercial(<?php echo $empresa; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                        </form>
                    </section>
                </div>
            </section>



            <section>

                <section id="xfa" class="separacion" style="display:block;" ng-controller="ControllerEmple3">
                    <section data-ng-init="pasarEmple3(<?php echo $empresa; ?>)">
                        <div class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label>Pa&iacute;s:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="empl in emple3">
                                <button onclick="var a = 'xfa'; var b = 'xfd'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{empl.nombrePais}} - {{empl.nombreCiudad}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="detalles('xfa','xfd')" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </section>
                </section>

                <section id="xfd" class="separacion" style="display:none;" ng-controller="ControllerEmpleadores3">
                    <div class="form-group" style="clear:both; padding:0;">
                        <div class="col-xs-12 col-sm-3 col-md-3  col-sm-offset-0 col-md-offset-0">
                            <label>Pa&iacute;s y Ciudad:</label>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-0 col-md-offset-0">
                            <section class="container-fluid fondo-gris2" style="padding:0; border-radius:8px; border:solid 2px #E0EDFA;">
                                <div style="clear:both; height:15px;"></div> <!-- solo para dar espacio -->
                                <div style="color:#585858; text-align:left;"><span>&nbsp;&nbsp;<b>Buscar</b> </span><input type="text" ng-model="searchKeyword"></div>
                                <div style="clear:both; height:20px;"></div> <!-- solo para dar espacio -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                                    <table class="table">
                                        <tr ng-repeat="empleador3 in empleadores3 | filter: searchKeyword ">
                                            <td>{{empleador3.nombrePais}}</td>
                                            <td>-</td>
                                            <td>{{empleador3.nombreCiudad}}</td>
                                            <td><input id="{{empleador3.idCiudad}}" type="radio" ng-click="seteHvEmpresas(empleador3.nombrePais,empleador3.nombreCiudad,empleador3.idPais,empleador3.idCiudad,<?php echo $empresa; ?>)" ></td>
                                        </tr>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>

            </section>  
            




            <section ng-controller="ControllerEmpleadores5">
                <div data-ng-init="pasar5(<?php echo $empresa; ?>)">
                    <section id="xka" class="separacion" style="display:block;" ng-repeat="empleador5 in empleadores5">
                        <div id="xkb" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Zona:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xka'; var b = 'xkc'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{empleador5.zonaEmpresa}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xka'; var b = 'xkc'; detalles(a,b)" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </section>

                    <section id="xkc" class="separacion" style="display:none;">
                        <form id="formZona">
                        <div id="xkd"class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="xke">Zona:</label>
                            <label id="gka" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <input ng-model="zona" type="text" class="form-control" id="xke">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <button type="submit" class="btn btn-default" ng-click="updateZona(<?php echo $empresa; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                        </form>
                    </section>
                </div>
            </section>





            <section  ng-controller="ControllerEmpleadores6">
                <div data-ng-init="pasar6(<?php echo $empresa; ?>)">
                    <section id="xma" class="separacion" style="display:block;" ng-repeat="empleador6 in empleadores6">
                        <div id="xmb" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Direcci&oacute;n:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xma'; var b = 'xmc'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{empleador6.direccionEmpresa}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xma'; var b = 'xmc'; detalles(a,b)" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </section>

                    <section id="xmc" class="separacion" style="display:none;">
                        <form id="formDireccion">
                        <div id="xmd" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="xme">Direcci&oacute;n:</label>
                            <label id="gna" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <input ng-model="direccion" type="text" class="form-control" id="xme">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <button type="submit" class="btn btn-default" ng-click="updateDireccion(<?php echo $empresa; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                        </form>
                    </section>
                </div>
            </section>




            <section ng-controller="ControllerEmpleadores7"> 
                <div data-ng-init="pasar7(<?php echo $empresa; ?>)">
                    <section id="xpa" class="separacion" style="display:block;"  ng-repeat="empleador7 in empleadores7">
                        <div id="xpb" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Tel&eacute;fono:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'psn1'; var b = 'psn2'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{empleador7.telefonoEmpresa}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'xpa'; var b = 'xpc'; detalles(a,b)" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </section>

                    <section id="xpc" class="separacion" style="display:none;">
                        <form id="formTelefono">
                        <div id="xpd" class="col-xs-12 col-sm-12 col-md-3  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="xpe">Tel&eacute;fono:</label>
                            <label id="gpa" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <input ng-model="telefono" type="text" class="form-control" id="xpe">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <button type="submit" class="btn btn-default" ng-click="updateTelefono(<?php echo $empresa; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                        </form>
                    </section>
                </div>
            </section>



        </div>  <!-- cierra las columnas del div informacion de la empresa... -->
        



        <div  class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0">


            <div id="logo9" ng-controller="ControllerEmpleadores8" style="display:block;">
                <div data-ng-init="pasarEmple8(<?php echo $empresa; ?>)">
                    <div ng-repeat="empleador8 in empleadores8">
                        <img onclick="detalles('logo9','logo11')" src="../c/logos/{{empleador8.imagen}}" style="width:150px; height:150px; cursor:pointer; background-color:#FCFCFC; border-radius:4px; border:solid 1px #337AB7;">
                    </div>
                </div>
            </div>



            <div id="logo11" style="display:none;">
                    <a onclick="var a = 'logo11'; var b = 'logo12'; detalles(a,b)" title="Cambiar logo">
                    <div id="fotoEmp">
                        <div id="fotoEmp2"></div>
                    </div>
                    </a>
            </div>

            
            <div id="logo12" style="display:none; background-color:#fcfcfc; border-radius:10px; padding:12px;">

                    <form enctype="multipart/form-data" id="formuploadajax2" method="post">
            
                        <br />
                        <input  type="file" id="archivo" name="archivo"/>
                        <br />
                         <input type="hidden" name="idEmpresa" value="<?php echo $empresa; ?>">
                        <br />
                        <input class="btn btn-primary" type="submit" value="Subir archivos"/>
                    </form>
                    <div id="mensaje"></div>


                    <script>
                    $(function(){
                        $("#formuploadajax2").on("submit", function(e){
                            e.preventDefault();
                            var f = $(this);
                            var formData = new FormData(document.getElementById("formuploadajax2"));
                            formData.append("dato", "valor");
                            //formData.append(f.attr("name"), $(this)[0].files[0]);
                            $.ajax({
                                url: "../c/uploadLogo.php",
                                type: "post",
                                dataType: "html",
                                data: formData,
                                cache: false,
                                contentType: false,
                         processData: false
                            })
                                .done(function(res){
                                    $("#mensaje").html("Logo " + res);
                                    location.reload();
                                });
                        });
                    });
                    </script>



            </div>
            

            



        </div>  <!-- foto  -->


        </section>


                            
    </div>  <!-- div container fluid-->

</div>  <!--cierra main -->


<!-- ...........................................................................................................  -->




</body>
</html>