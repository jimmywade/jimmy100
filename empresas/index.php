<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> Talent | get the best human talent</title>
    <link rel="shortcut icon" href="../img/logo10.png" type="image/png" />
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
    
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
          width: 100%;
          margin: auto;
        }
    </style>

</head>
<body ng-app="talentApp" class="fondo-azul">


<section id="milagro" ng-controller="myController556" style="display:block; background: -webkit-linear-gradient(#E0EDFA, #0283F8);  background: -moz-linear-gradient(#E0EDFA, #0283F8);   background: -o-linear-gradient(#E0EDFA, #0283F8);">


<!-- ...........................................................................................................  -->


<hr>
<div class="container" style="background-color:#585858; color:#d5d5d5;" >
    <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0">
        <hr>
        <h1 style="text-align:center; font-family:myriad pro;">PUBLIQUE SUS OFERTAS DE EMPLEO AQUI</h1>
        <hr>
    </div>
</div> <!-- div container -->
<hr>


<div class="container" style="margin-bottom:50px; padding:0;">

    

                


            <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-0 col-md-offset-0">

                <article style="clear:both; height:10px;"></article>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="../img/b1.png" alt="I´m talent for Employers">
                          <div class="carousel-caption">
                            <h3>I´m Talent</h3>
                            <p>Publique sus ofertas laborales y empieze a recibir de inmediato los curriculum de aspirantes al cargo</p>
                          </div>
                        </div>

                        <div class="item">
                          <img src="../img/b2.png" alt="I´m talent for Employers">
                          <div class="carousel-caption">
                            <h3>I´m Talent</h3>
                            <p>La forma más rápida y sencilla de encontrar personal calificado.</p>
                          </div>
                        </div>

                        <div class="item">
                          <img src="../img/b3.png" alt="I´m talent for Employers">
                          <div class="carousel-caption">
                            <h3>I´m Talent</h3>
                            <p>Publique sin membresía y sin cargos mensuales, registre su empresa y empiece ahora mismo.</p>
                          </div>
                        </div>

                        <div class="item">
                          <img src="../img/b4.png" alt="I´m talent for Employers">
                          <div class="carousel-caption">
                            <h3>I´m Talent</h3>
                            <p>Es gratis, no hay límite de publicaciones.</p>
                          </div>
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Prev</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>

                <script>
                    // Activate Carousel
                    $("#myCarousel").carousel();

                    // Enable Carousel Indicators
                    $(".item").click(function(){
                        $("#myCarousel").carousel(1);
                    });

                    // Enable Carousel Controls
                    $(".left").click(function(){
                        $("#myCarousel").carousel("prev");
                    });
                </script>
                <br><br><br><br>
                
                <a href="../w/login.html">
                    <div class="btn btn-success" style="padding:0;">
                        <h3>&nbsp;&nbsp;&nbsp;PUBLICAR MI PRIMERA VACANTE&nbsp;&nbsp;&nbsp;</h3>
                    </div>
                </a>
            </div>


                <div class="col-xs-12 col-sm-4 col-md-4 col-sm-offset-2 col-md-offset-2">

                    <!--
                    <hr>
                    <article style="color:#585858; background-color:#E0EDFA; padding:20px;">
                        <h4>I´m Talent para empresas</h4>
                        <i>Es gratis y lo será siempre.</i>
                    </article>
                    <hr>
                    <br>
                    -->
                    
                    <article style="clear:both; height:10px;"></article>

                    <div style="background-color:#0A78CD; border-radius:10px; padding:20px;">
                    <form class="form-horizontal" role="form" id="registroEmpresas">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="ncomer">Nombre comercial:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input ng-model="com" type="text" class="form-control" id="ncomer" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="ec">Sector:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
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




                        <div  class="form-group" style="clear:both; padding:0;">
                            <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0 izquierdo">
                                <label>Seleccionar Pa&iacute;s y Ciudad:</label>
                            </div>
                            <div id="activado" class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0" style="display:block;">
                                <button class="btn btn-default" onclick="detalles('activado','desactivado')"><span class="glyphicon glyphicon-triangle-bottom"></span></button>
                            </div>
                            <div id="desactivado" class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-0 col-md-offset-0" style="display:none;">
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
                                                <td><input id="{{post555.idCiudad}}" name="ubicacion" type="radio" ng-click="sete555(post555.nombrePais,post555.nombreCiudad,post555.idPais,post555.idCiudad)" ></td>
                                            </tr>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>    
                        

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="email">Zona de la ciudad / Barrio:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input ng-model="zona" type="text" class="form-control" id="zon" maxlength="19" style="border:solid 1px #E0EDFA;" placeholder="Ejemplo: Centro" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="dir">Direcci&oacute;n:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input ng-model="direccion" type="text" class="form-control" id="dir" maxlength="39" style="border:solid 1px #E0EDFA;" placeholder="Ejemplo: Centro Calle 30 No. 49 - 66" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="email">Tel&eacute;fono:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input ng-model="telefono" type="text" class="form-control" id="tel" maxlength="12" style="border:solid 1px #E0EDFA;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="email">Email:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input ng-model="mail" type="email" class="form-control" id="email" placeholder="Ejemplo: maria123@midominio.com" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="pwd2">Contrase&ntilde;a:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">          
                                <input ng-model="password" type="password" class="form-control" id="pwd" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 izquierdo" for="pwd">Repetir contrase&ntilde;a:</label>
                            <div class="col-xs-12 col-sm-12 col-md-12">          
                                <input ng-model="password2" type="password" class="form-control" id="pwd2" maxlength="29" style="border:solid 1px #E0EDFA;" required>
                            </div>
                        </div>


                        <div id="somethingE" class="form-group" style="display:none;">
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="background-color: rgba(0, 0, 0, 0.6);">
                                <h5 style="color:red;"><i>Parece que este correo electrónico ya tiene una cuenta en I´M TALENT<br>Por favor ingresa un email diferente ó <a href="../w/login.html">pulsa aqui para iniciar sesión</a></i></h5>
                            </div>
                        </div>


                        <div class="form-group">        
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0">
                                <br>
                                <button ng-click="reg2()" class="btn btn-default"><b>&nbsp;&nbsp;&nbsp;Registrarse&nbsp;&nbsp;&nbsp;</b></button>
                            </div>
                        </div>





                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="font-size:11px; text-align:right; color:#D5D5D5;">
                            <span>Al hacer clic en Registrarse, aceptas los <a style="color:#BEBEBE;" href="../w/terminosycondiciones.php">Terminos y Condiciones</a> de uso del servicio.</span>
                        </div>
                    </div>


                    </form>
                    </div>
                   





                    <div style="clear:both; height:30px;">
                        
                    </div>


                    <div class="col-xs-6 col-sm-8 col-md-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="text-align:center; color:#FFF;">
                        <b>&oacute;</b>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-0 col-sm-offset-0 col-md-offset-0">
                        <a href="../w/login.html"><button class="btn btn-default">Iniciar sesi&oacute;n</button></a>
                    </div>

                </div>
    

</div>  <!-- div container -->







<footer>
    <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="padding:0;">    
                <div class="col-xs-4 col-sm-3 col-md-3 col-xs-offset-0 col-sm-offset-0 col-md-offset-0">
                    <br>
                    <p>
                    Siguenos en:
                    </p>
                </div>
                
                <div class="col-xs-8 col-sm-9 col-md-9 col-xs-offset-0 col-sm-offset-0 col-md-offset-0">
                    <a href="#">
                        <img alt="síguenos en twitter" src="../img/twitter_11.png" width=50px height=50px title="twitter"  id="social_10" class="footer_float"/>
                    </a>
                    <a href="#">
                        <img alt="siguenos en facebook"  src="../img/f.png" width=50px height=50px title="facebook" id="social_6" class="footer_float" />
                    </a>

                    <!--
                    <a href="contactenos.html" target="_blank">
                        <img alt="escribenos"  src="../img/a.png" width=50px height=50px title="escribenos" id="social_8" class="footer_float"/>
                    </a>
                    <a href="https://plus.google.com/u/0/117149596253079894425/posts" target="_blank">
                        <img alt="síguenos en Google +" src="../img/g.png" width=50px height=50px title="Google +"  id="social_12" class="footer_float"/>
                    </a>
                    -->
                   
                    <a href="#">
                        <img alt="instagram malvi castaneda"  src="../img/insta_6.png" width=50px height=50px title="instagram" id="social_8" class="footer_float"/>
                    </a>
                </div>    
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0" style="padding:0;">
            <article id="copyright">
                <br>
                Copyright (c) 2016 &nbsp;&nbsp;&nbsp; I´M TALENT todos los derechos reservados.
            </article>
        </div>

    </div>


</footer>








<!-- ...........................................................................................................  -->
</section>







<div id="elena" style="display:none; padding:0; height:100%;">
    <div class="container-fluid" style="margin-top:5%; margin-bottom:5%; padding:0;">
        <div class="col-xs-12 col-sm-12 col-md-8  col-sm-offset-0 col-md-offset-4" style="color:#585858; padding:0;">
            <h4>Su registro ha sido completado exitosamente!</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:6%; height:6%;" src="../img/vb.png">
            <br><br><br><br>
            <a href="../w/login.html" class="btn btn-primary" role="button">Iniciar sesion</a>  
        </div>  <!-- div columna central-->
    </div>  <!-- div container fluid-->
</div>  <!--cierra login -->




</body>
</html>