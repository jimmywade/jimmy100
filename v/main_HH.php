<?php

session_start();


$idPeople=$_SESSION['empleado'];

/*
if(empty($idPeople) || $idPeople=='' || $idPeople==NULL){
   $idPeople = $_SESSION['empleado'] = $_GET['ngsafe'];
}
*/


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> Talent </title>
    <link rel="shortcut icon" href="../img/logo10.png" type="image/png" />
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles.css" />
    <script type="text/javascript" src="../libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular-resource.js"></script>
    <script type="text/javascript" src="../c/controladores_1.js"></script>
    <script type="text/javascript" src="../c/controller.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-78271394-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body class="fondo-azul" ng-app="talentEmpleosApp">


<!-- .................................................................................................................  -->

<div data-ng-controller="amy" style="padding:0; margin:0;">
<div data-ng-init="shoot(<?php echo $idPeople; ?>)" style="padding:0; margin:0;">

    <div class="container-fluid" style="padding:0; margin:0;">

       <a href="vacantes.php">
       <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
       <h2 class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 fondo_azul_oscuro">ver vacantes</h2>
       </section>
       </a>


       <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-1" style="color:#585858; margin-top:20px;">
                <div>
                    <div>    
                        <div ng-repeat="fotoPerfil in giuliana">
                            <a id="foto" style="display:block; cursor:pointer;" title="cambiar imagen" onclick="detalles('foto','otof')">
                                <img src="../c/fotos/{{fotoPerfil.laFoto}}" id="fotoDePerfil">
                            </a>
                        </div>
                    </div>            
                </div>
                



                <div id="otof" style="display:none; border-radius:10px;background-color:#fcfcfc;padding-top:5px;padding-right:12px;padding-left:12px;padding-bottom:40px;">

                    <!-- aqui empieza el form ajax-->
                    <form enctype="multipart/form-data" id="formuploadajax" method="post">
            
                        <br />
                        <input  type="file" id="archivo" name="archivo"/>
                        <br />
                        <input  type="hidden" id="psna" name="psna" value="<?php echo $idPeople; ?>"/>
                        <br />
                        
                        <br />
                        <input class="btn btn-primary" type="submit" value="Subir archivos"/>
                    </form>
                    <div id="mensaje"></div>



                    <script>
                    $(function(){
                        $("#formuploadajax").on("submit", function(e){
                            e.preventDefault();
                            var f = $(this);
                            var formData = new FormData(document.getElementById("formuploadajax"));
                            formData.append("dato", "valor");
                            //formData.append(f.attr("name"), $(this)[0].files[0]);
                            $.ajax({
                                url: "../c/uploadFoto.php",
                                type: "post",
                                dataType: "html",
                                data: formData,
                                cache: false,
                                contentType: false,
                         processData: false
                            })
                                .done(function(res){
                                    $("#mensaje").html("Foto " + res);
                                    location.reload();
                                });
                        });
                    });
                    </script>

                    <!-- aqui termina el form ajax-->

                </div>



        </div>  <!-- cierra las columnas del div de la foto -->






        <div class="col-xs-11 col-sm-11 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858; margin-top:10px;">

            <div>

                <section id="psn1" class="separacion" style="display:block;">
                    <div>
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="nombre20">Nombre y apellidos:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="nombre in giuliana">
                                <button onclick="detalles('psn1','psn2')" class="btn btn-default" style="width:100%;">{{nombre.nombrePersona}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="detalles('psn1','psn2')" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </div>    
                </section>

                <section id="psn2" class="separacion" style="display:none;">
                        <form id="formnya">
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="nya">Nombre y apellidos:</label>
                            <label id="faa" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <input ng-model="nombreyapellido" type="text" maxlength="50" class="form-control" id="nya">
                            </div>
                        </div>
                        

                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <button class="btn btn-default" ng-click="insertnombreyapellido(<?php echo $idPeople; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                        </form>   
                </section>

            </div>


                






                <section id="psa1" class="separacion" style="display:block;">
                    <div>
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Fecha de Nacimiento:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="born in giuliana">
                                <button onclick="var a = 'psa1'; var b = 'psa2'; detalles(a,b)" class="btn btn-default" style="width:100%;">{{born.nacimientoPersona}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="var a = 'psa1'; var b = 'psa2'; detalles(a,b)" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </div>    
                </section>

                <section  id="psa2" class="separacion" style="display:none;">
                    <form id="formNacimiento">
                    <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <label for="nace">Fecha de Nacimiento:</label>
                        <label id="fba" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <div class="form-group">
                            <input ng-model="nacimiento" type="date" maxlength="10" placeholder="AAAA-MM-DD" class="form-control" id="nace">
                        </div>
                    </div>
                    

                    <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <div class="form-group">
                            <button class="btn btn-primary" ng-click="mandar(<?php echo $idPeople; ?>)" title="save"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                    </div>
                    </form>  
                </section>





                <section id="psb1" class="separacion" style="display:block;">
                    <div>
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="ec1">Estado civil:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="borge in giuliana">
                                <button onclick="detalles('psb1','psb2')" class="btn btn-default" style="width:100%;">{{borge.nombreCivil}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="detalles('psb1','psb2')" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </div>    
                </section>

                <section id="psb2" class="separacion" style="display:none;">   
                    <form id="formCivil">
                    <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <label for="ec">Estado civil:</label>
                        <label id="fca" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <select ng-model="civil" class="form-control" id="ec" required>
                                    <option value="1">Soltero</option>
                                    <option value="2">Casado</option>
                                    <option value="3">Uni&oacute;n libre</option>
                                    <option value="4">Divorciado/a</option>
                                    <option value="5">Viudo/a</option>                                
                                </select>
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <div class="form-group">
                            <button ng-click="enviarCivil(<?php echo $idPeople; ?>)" title="save" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                    </div>
                    </form>  
                </section>





                <section id="psc1" class="separacion" style="display:block;">
                    <div>
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Direcci&oacute;n de residencia:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="door in giuliana">
                                <button onclick="detalles('psc1','psc2')" class="btn btn-default" style="width:100%;">{{door.direccionPersona}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="detalles('psc1','psc2')" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </div>    
                </section>

                <section id="psc2" class="separacion" style="display:none;">
                    <form id="formResidencia">
                    <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <label for="d_res">Direcci&oacute;n de residencia:</label>
                        <label id="ffa" style="color:red; display:none;"><i>Ingrese un valor</i></label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <div class="form-group">
                            <input ng-model="residencia" type="text" maxlength="40" class="form-control" id="d_res">
                        </div>
                    </div>
                    
                    <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <div class="form-group">
                            <button ng-click="enviarResidencia(<?php echo $idPeople; ?>)" title="save" class="btn btn-primary"><span class="glyphicon glyphicon-saved"></span></button>
                        </div>
                    </div>
                    </form>    
                </section>
                                                









                <article style="clear:both; height:1px;"> 
                    <br>
                </article> <!--solo para dar espacio -->




                <section id="countries1" class="separacion" style="display:block;">
                    <div data-ng-init="geo(<?php echo $idPeople; ?>)" >
                        <div class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <label for="email">Pais y ciudad:</label>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-7 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group" ng-repeat="colombia in giuliana">
                                <button onclick="detalles('countries1','countries2')" class="btn btn-default" style="width:100%;">{{colombia.nombrePais}} - {{colombia.nombreCiudad}}</button>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                            <div class="form-group">
                                <button onclick="detalles('countries1','countries2')" title="save" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                            </div>
                        </div>
                    </div>    
                </section>



                <section id="countries2" style="display:none;">
                    <div id="roller14" class="col-xs-12 col-sm-4 col-md-4 col-sm-offset-0 col-md-offset-0" style="text-align:left; padding:0;">
                        <label>Pais y ciudad:</label>
                    </div>
                    
                    <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                        <section id="roller13" class="container-fluid fondo-gris2" style="padding-bottom:10px;">
                            <div><span>&nbsp;&nbsp;Buscar </span><input type="text" ng-model="searchK"></div>
                            <div style="clear:both; height:20px;"></div>
                            <div style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                                <table class="table">
                                    <tr ng-repeat="location in geolocation | filter: searchK">
                                        <td>{{location.nombrePais}}</td>
                                        <td>-</td>
                                        <td>{{location.nombreCiudad}}</td>
                                        <td><input type="radio" ng-click="roller(location.idPais,location.idCiudad,<?php echo $idPeople; ?>)" ></td>
                                    </tr>
                                </table>
                            </div>
                        </section>
                    </div>
                </section>



                <article style="clear:both; height:20px;"> 
                    <br>
                </article> <!--solo para dar espacio -->
                

        </div>  <!-- cierra las columnas del div detalles nombre, fecha nacimineto... -->




    </div> <!-- cierra container-fluid 3 -->  




    <!-- informaciones academicas-->
    <div class="container-fluid" data-ng-init="listarAcademicas(<?php echo $idPeople; ?>)" style="padding:0; margin:0;">
        <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
            <h3 class="fondo-oscuro">Información Academica</h3>





                <!-- mostrar ESTA informacion academica--> 
                <div ng-repeat="academica in academicas" class="container-fluid fondo-gris">
                    <div class="col-xs-12 col-sm-5 col-md-5"><b>Titulo obtenido:</b> {{academica.tituloAcademica}}<br>{{academica.finalizacionAcademica}}</div>
                    <div class="col-xs-12 col-sm-4 col-md-4"><b>Institución:</b> {{academica.institucionAcademica}}<br> {{academica.nombreCiudad}} - {{academica.nombrePais}}</div>
                    <!-- se muestra inicialmente el boton y depende lo que diga el boton un div o el otro-->
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        
                        <!-- este es el botton AGREGAR CERTIFICACION ó VER CERTIFICACION-->
                        <div id="she{{academica.bajo2}}">
                            <button ng-click="cual('she' + academica.bajo2, 'doesnt'+academica.bajo2, 'mind'+academica.bajo2,academica.addAcademicaEstado)" class="btn btn-primary" style="display:block; font-size:13px;">{{academica.addAcademica}}</button>
                        </div>
                        
                        <!-- botones-icono ATRAS y ABRIR, solo se mostrarán si el boton anterior dice VER CERTIFICACION-->
                        <div id="doesnt{{academica.bajo2}}" class="col-xs-12 col-sm-12 col-md-12" style="display:none; padding:0; margin:0;">
                             <button ng-click="o_d_e_c('doesnt' + academica.bajo2,'she' + academica.bajo2)" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left"></span></button>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             <a href="{{academica.rutaAcademica}}" target="_blank" role="button" class="btn btn-primary"><span class = "glyphicon glyphicon-new-window" title="Open in new window"></span></a>
                        </div>
                        
                        <!-- boton SUBIR ARCHIVO solo se mostrará si el boton del div SHE2000000 dice AGREGAR CERTIFICACION-->
                        <div id="mind{{academica.bajo2}}"  class="col-xs-12 col-sm-12 col-md-12" style="display:none; padding:0; margin:0;">
                            <form action="../c/server.php" method="POST" enctype="multipart/form-data"> 
                                <input  type="hidden" name="IDACADEMICA" value="{{academica.idAcademica}}" /><br>
                                <input type="file" name="file"/><br>
                                <input type="submit" value="Guardar" class="btn btn-primary"> 
                            </form>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-1 col-md-1" style="text-align:right;">
                        <button id="eliminarAcademicaA{{academica.bajo2}}" ng-click="o_d_e_c('eliminarAcademicaA'+academica.bajo2, 'eliminarAcademicaB'+academica.bajo2)" class="btn btn-default" style="display:block;"><span class="glyphicon glyphicon-remove" title="Eliminar esta INFORMACION ACADEMICA"></span></button>
                        <button id="eliminarAcademicaB{{academica.bajo2}}" ng-click="eliminarEstaAcad(academica.idAcademica)" class="btn btn-danger" style="display:none;"><span class="glyphicon glyphicon-remove" title="Eliminar esta INFORMACION ACADEMICA"></span></button>                        
                    </div>


                </div>
                







                <section id="informacion-academica1" class="container-fluid" style="padding:0; display:block;">
                <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="text-align:right; margin-top:2px;">
                    <button onclick="var a = 'informacion-academica1'; var b = 'informacion-academica2'; detalles(a,b)" title="Agregar una INFORMACION ACADEMICA" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                </section>
                </section> <!-- para que quede en iguales condiciones que el boton menos -->




                <section id="informacion-academica2" class="container-fluid" style="padding:0; display:none;">

                    <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="text-align:right; margin-top:2px;">
                        <button onclick="detalles('informacion-academica1','informacion-academica2')" title="Agregar informacion academica" type="button" class="btn btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                    </section>


                    <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 fondo-gris2">
                        <form id="formularioAcademico">

                            <div class="col-xs-11 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858;">

                                    <section id="psd2" class="container-fluid" style="margin-top:10px;">
                                        <div id="titl" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="ti">Titulo obtenido:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="titulo" type="text" maxlength="50" class="form-control" id="ti" required>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="psx2" class="container-fluid" style="margin-top:20px;">
                                        <div id="anioInicial" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="yearInit">A&ntilde;o de inicio:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <select class="form-control" id="yearFin" ng-model="inicio" required>
                                                    <script>
                                                        var today = new Date();
                                                        var year = today.getFullYear();

                                                        var anioActual=year;
                                                        var i=0;
                                                        while(i<55){
                                                            anioActual=anioActual-1;
                                                            document.write('<option value="' + anioActual + '">'+ anioActual +'</option>');
                                                            i=i+1;
                                                        }
                                                    </script>
                                                </select>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="psx3" class="container-fluid" style="margin-top:20px;">
                                        <div id="anioFinal" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="yearFin">A&ntilde;o finalizaci&oacute;n:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <select class="form-control" id="yearFin" ng-model="fin" required>
                                                    <script>
                                                        var today2 = new Date();
                                                        var year2 = today2.getFullYear();

                                                        var anioActual2=year2;
                                                        var i2=0;
                                                        while(i2<54){
                                                            anioActual2=anioActual2-1;
                                                            document.write('<option value="' + anioActual2 + '">'+ anioActual2 +'</option>');
                                                            i2=i2+1;
                                                        }
                                                    </script>
                                                </select>
                                            </div>
                                        </div>
                                    </section>
                            </div>


                            <div class="col-xs-11 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                    <section id="ps" class="container-fluid">
                                        <div id="inst" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="iedu">Nombre instituci&oacute;n:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="institucion" type="text" maxlength="50" class="form-control" id="iedu" required>
                                            </div>
                                        </div>
                                    </section>
                                    

                                    <div style="border:solid 1px #D5D5D5; clear:both; border-radius:8px;">
                                        <label style="padding-top:10px; padding-bottom:10px;">&nbsp;Ubicaci&oacute;n de la Instituci&oacute;n: <i>{{ciudad2}} - {{pais2}}</i></label>

                                        <section id="cff" class="container-fluid" style="padding-bottom:10px;">
                                            <div><span>&nbsp;&nbsp;Buscar </span><input type="text" ng-model="searchKeyword"></div>
                                            <div style="clear:both; height:20px;"></div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                                                <table class="table">
                                                    <tr ng-repeat="location2 in geolocation | filter: searchKeyword ">
                                                        <td>{{location2.nombrePais}}</td>
                                                        <td>-</td>
                                                        <td>{{location2.nombreCiudad}}</td>
                                                        <td><input type="radio" ng-click="setear2(location2.idPais,location2.idCiudad,location2.nombrePais,location2.nombreCiudad)" ></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                    
                            </div>

                            <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="text-align:right; margin-top:20px;">
                            <button ng-click="enviarLaboral(<?php echo $idPeople; ?>)" class="btn btn-default"><b>Guardar</b></button>
                            </section>
                            
                        </form>


                    </section>
                </section> <!-- el oculto que tiene el formulario nueva info academica -->




        </section> <!-- main informacion academica -->

    </div> <!-- cierra el div listar academicas -->  












    <!-- recomendaciones laborales-->
    <div class="container-fluid" data-ng-init="listarLaborales(<?php echo $idPeople; ?>)" style="padding:0; margin:0;">
        <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
            <h3 class="fondo-oscuro">Experiencia Laboral</h3>



                <!-- mostrar ESTA informacion academica--> 
                <div ng-repeat="laboral in laborales" class="container-fluid fondo-gris">
                    <div class="col-xs-12 col-sm-5 col-md-5"><b>Cargo:</b> {{laboral.cargoLaboral}}<br>Desde: {{laboral.inicioLaboral}} hasta: {{laboral.finalizacionLaboral}}</div>
                    <div class="col-xs-12 col-sm-4 col-md-4"><b>Empresa:</b> {{laboral.empresaLaboral}}<br> {{laboral.nombreCiudad}} - {{laboral.nombrePais}}</div>
                    <!-- se muestra inicialmente el boton y depende lo que diga el boton un div o el otro-->
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        
                        <!-- este es el botton AGREGAR CERTIFICACION ó VER CERTIFICACION-->
                        <div id="tienes{{laboral.bajo3}}">
                            <button ng-click="choising('tienes'+laboral.bajo3, 'la'+laboral.bajo3, 'sonrisa'+laboral.bajo3, laboral.addLaboralEstado)" class="btn btn-primary" style="display:block; font-size:12px;">{{laboral.addLaboral}}</button>
                        </div>
                        
                        <!-- botones-icono ATRAS y ABRIR, solo se mostrarán si el boton anterior dice VER CERTIFICACION-->
                        <div id="la{{laboral.bajo3}}" class="col-xs-12 col-sm-12 col-md-12" style="display:none; padding:0; margin:0;">
                            <button ng-click="o_d_e_c('tienes'+laboral.bajo3, 'la'+laboral.bajo3)" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left"></span></button>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             <a href="{{laboral.rutaLaboral}}" target="_blank" role="button" class="btn btn-primary"><span class = "glyphicon glyphicon-new-window" title="Open in new window"></span></a>
                        </div>
                        
                        <!-- boton SUBIR ARCHIVO solo se mostrará si el boton del div SHE2000000 dice AGREGAR CERTIFICACION-->
                        <div id="sonrisa{{laboral.bajo3}}"  class="col-xs-12 col-sm-12 col-md-12" style="display:none; padding:0; margin:0;">
                            <form action="../c/server2.php" method="POST" enctype="multipart/form-data">
                                <input  type="hidden" name="IDLABORAL" value="{{laboral.idLaboral}}" /><br>
                                <input type="file" name="file"/><br>
                                <input type="submit" value="Guardar" class="btn btn-primary"> 
                            </form>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-1 col-md-1" style="text-align:right;">
                        <button id="eliminarLabA{{laboral.bajo3}}" ng-click="o_d_e_c('eliminarLabA'+laboral.bajo3, 'eliminarLabB'+laboral.bajo3)" class="btn btn-default" style="display:block;"><span class="glyphicon glyphicon-remove" title="Eliminar esta EXPERIENCIA LABORAL"></span></button>
                        <button id="eliminarLabB{{laboral.bajo3}}" ng-click="eliminarEstaLab(laboral.idLaboral)" class="btn btn-danger" style="display:none;"><span class="glyphicon glyphicon-remove" title="Eliminar esta EXPERIENCIA LABORAL"></span></button>
                    </div>

                </div>
                





                <!-- boton plus -->
                <section id="experienciaLaboral1" class="container-fluid" style="padding:0;">
                    <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="display:block; text-align:right; margin-top:2px;">
                        <button onclick="detalles('experienciaLaboral1','experienciaLaboral2')" title="Agregar una EXPERIENCIA LABORAL" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                    </section>
                </section>





                <!-- boton less y agregar certificacion -->
                <section id="experienciaLaboral2" class="container-fluid" style="padding:0; display:none;">

                    
                    <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="text-align:right; margin-top:2px;">
                        <button onclick="detalles('experienciaLaboral1','experienciaLaboral2')" title="Agregar experiencia laboral" type="button" class="btn btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                    </section>


                    <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 fondo-gris2">
                        <form id="formularioLaboral">

                            <div class="col-xs-11 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858;">

                                    <section id="xa" class="container-fluid" style="margin-top:10px;">
                                        <div id="xb" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="car">Cargo desempeñado:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="cargo" type="text" maxlength="50" class="form-control" id="car" required>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="xc" class="container-fluid" style="margin-top:20px;">
                                        <div id="xd" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="dtInit">Fecha aproximada de inicio:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="inicial" type="date" class="form-control" id="dtInit" maxlength="10" placeholder="AAAA-MM-DD" required>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="xe" class="container-fluid" style="margin-top:20px;">
                                        <div id="xf" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="dtFin">Fecha aproximada de finalización:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="finalizcn" type="date" class="form-control" id="dtFin" maxlength="10" placeholder="AAAA-MM-DD" required>
                                            </div>
                                        </div>
                                    </section>
                            </div>


                            <div class="col-xs-11 col-sm-12 col-md-6  col-sm-offset-0 col-md-offset-0" style="color:#585858;">
                                    <section id="xm" class="container-fluid">
                                        <div id="xn" class="col-xs-12 col-sm-12 col-md-4  col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <label for="comp">Empresa:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-0" style="padding:0;">
                                            <div class="form-group">
                                                <input ng-model="empresa" type="text" maxlength="40" class="form-control" id="comp" required>
                                            </div>
                                        </div>
                                    </section>
                                    

                                    <div style="border:solid 1px #D5D5D5; clear:both; border-radius:8px;">
                                    <h5 style="padding-top:10px; padding-bottom:10px;">&nbsp;&nbsp;Ubicaci&oacute;n de la empresa: <i>{{nmC}} - {{nmP}}</i></h5>
                                    
                                    <section id="xx" class="container-fluid" style="padding-bottom:10px;">
                                        <div><span>&nbsp;&nbsp;Buscar </span><input type="text" ng-model="searchKwd"></div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="padding:0; overflow:scroll; height:250px; clear:both; border:solid 1px #C9DAFB;" >
                                            <table class="table">
                                                <tr ng-repeat="location3 in geolocation | filter: searchKwd ">
                                                    <td>{{location3.nombrePais}}</td>
                                                    <td>-</td>
                                                    <td>{{location3.nombreCiudad}}</td>
                                                    <td><input type="radio" ng-click="setear3(location3.idPais,location3.idCiudad,location3.nombrePais,location3.nombreCiudad)" ></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </section>

                                    </div>
                                    
                            </div>

                            <section class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="text-align:right; margin-top:20px;">
                            <button  ng-click="enviaLaboral(<?php echo $idPeople; ?>)" class="btn btn-default"><b>Guardar</b></button>
                            </section>

                        </form>
                    </section>
                </section> <!-- el oculto que tiene el formulario nueva recomendacion laboral -->




        </section> <!-- main experiencia laboral -->

    </div> <!-- cierra el div listar laborales -->












    <a href="vacantes.php">
    <section class="col-xs-12 col-sm-12 col-md-10  col-sm-offset-0 col-md-offset-1">
    <h2 class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 fondo_azul_oscuro">ver vacantes</h2>
    </section>
    </a>



</div> <!-- cierra disparador de id  -->
</div> <!-- cierra ng ctlr  -->











<br><br><br><br><br><br>

<!-- ................................................................................................................. shoot geo listarAcademica  -->


</body>
</html>