
var app = angular.module('talentApp',[]);


//validar  y enviar el registro persona
app.controller('myController444',function($scope,$http){


    $scope.sete444=function(f,g,IDpais,IDciudad){
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        
        alert('Pais: ' + $scope.pais2 + ' |  Ciudad: ' + $scope.ciudad2);
    };




    $scope.reg444=function(){
        //validar que el anio de inicio no este vacio
        if(($scope.com==undefined)||($scope.com=='')
         ||($scope.nacimiento==undefined)||($scope.nacimiento=='')
         ||($scope.sexoPersona==undefined)||($scope.sexoPersona=='')
         ||($scope.civil==undefined)||($scope.civil=='')
         ||($scope.pais2==undefined)||($scope.pais2=='')
         ||($scope.ciudad2==undefined)||($scope.ciudad2=='')
         ||($scope.direccion==undefined)||($scope.direccion=='')
         ||($scope.telefono==undefined)||($scope.telefono=='')
         ||($scope.mail==undefined)||($scope.mail=='')
         ||($scope.password==undefined)||($scope.password=='')
         ||($scope.password2==undefined)||($scope.password2==''))
        {
            if(($scope.com==undefined)||($scope.com=='')){ var IDcom = document.getElementById("ncomer"); IDcom.style.border = "solid 1px red"; }
            if(($scope.nacimiento==undefined)||($scope.nacimiento=='')){ var IDcom10 = document.getElementById("naci"); IDcom10.style.border = "solid 1px red"; }
            if(($scope.sexoPersona==undefined)||($scope.sexoPersona=='')){ var IDcom11 = document.getElementById("ese"); IDcom11.style.border = "solid 1px red"; }
            if(($scope.civil==undefined)||($scope.civil=='')){ var IDcom12 = document.getElementById("ec"); IDcom12.style.border = "solid 1px red"; }
            if(($scope.pais2==undefined)||($scope.pais2=='')){ var IDcom2 = document.getElementById("payciu"); IDcom2.style.border = "solid 3px red"; }
            if(($scope.ciudad2==undefined)||($scope.ciudad2=='')){ var IDcom3 = document.getElementById("payciu"); IDcom3.style.border = "solid 3px red"; }
            if(($scope.direccion==undefined)||($scope.direccion=='')){ var IDcom5 = document.getElementById("dir"); IDcom5.style.border = "solid 1px red"; }
            if(($scope.telefono==undefined)||($scope.telefono=='')){ var IDcom6 = document.getElementById("tel"); IDcom6.style.border = "solid 1px red"; }
            if(($scope.mail==undefined)||($scope.mail=='')){ var IDcom7 = document.getElementById("email"); IDcom7.style.border = "solid 1px red"; }
            if(($scope.password==undefined)||($scope.password=='')){ var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  }
            if(($scope.password2==undefined)||($scope.password2=='')){ var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red"; }
        }else{


            if($scope.password!=$scope.password2){
                alert("las contraseñas no coinciden"); var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red";
            }else{
                
                $http.post("../c/insert444.php", {'com':$scope.com,'nacim':$scope.nacimiento,'sxp':$scope.sexoPersona,'civ':$scope.civil,'pais':$scope.idPais,'ciudad':$scope.idCiudad,'dir':$scope.direccion,'tel':$scope.telefono, 'mail':$scope.mail, 'pass':$scope.password })
                .success(function(respuesta){ console.log(respuesta);
                                              $scope.datosComp = respuesta;
                                                var length = $scope.datosComp.length;
                                                    for (i = 0; i < length; i++) {
                                                        var shadow=$scope.datosComp[i].shadowsPersona;
                                                    };

                                                    if(shadow==0){
                                                        actv('somethingX');
                                                    }else{
                                                        
                                                        document.forms['registroPersonas'].reset();
                                                        detalles('registroW','loginW');
                                                        desactv('somethingX');
                                                    }
                                            });

                //.success(function(data,status,headers,config){ console.log("datos registro empresa insertados correctamente"); });
                //document.forms['registroEmpresas'].reset();
                //detalles('loginW','registroW');
                //location.reload();
            }
        }

    }






    $scope.posts444 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.posts444 = data;

        })
        .error(function(err){

        });  


});









































//validar  y enviar registro persona
app.controller('myController445',function($scope,$http){

    $scope.sete445=function(f,g,IDpais,IDciudad){
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        
        alert('Pais: ' + $scope.pais2 + ' |  Ciudad: ' + $scope.ciudad2);
    };




    $scope.reg445=function(){
        //validar que el anio de inicio no este vacio
        if(($scope.com==undefined)||($scope.com=='')
         ||($scope.nacimiento==undefined)||($scope.nacimiento=='')
         ||($scope.sexoPersona==undefined)||($scope.sexoPersona=='')
         ||($scope.civil==undefined)||($scope.civil=='')
         ||($scope.idPais==undefined)||($scope.idPais=='')
         ||($scope.idCiudad==undefined)||($scope.idCiudad=='')
         ||($scope.direccion==undefined)||($scope.direccion=='')
         ||($scope.telefono==undefined)||($scope.telefono=='')
         ||($scope.mail==undefined)||($scope.mail=='')
         ||($scope.password==undefined)||($scope.password=='')
         ||($scope.password2==undefined)||($scope.password2==''))
        {
            if(($scope.com==undefined)||($scope.com=='')){ var IDcom = document.getElementById("ncomer"); IDcom.style.border = "solid 1px red"; }
            if(($scope.nacimiento==undefined)||($scope.nacimiento=='')){ var IDcom10 = document.getElementById("naci"); IDcom10.style.border = "solid 1px red"; }
            if(($scope.sexoPersona==undefined)||($scope.sexoPersona=='')){ var IDcom11 = document.getElementById("ese"); IDcom11.style.border = "solid 1px red"; }
            if(($scope.civil==undefined)||($scope.civil=='')){ var IDcom12 = document.getElementById("ec"); IDcom12.style.border = "solid 1px red"; }
            if(($scope.pais2==undefined)||($scope.pais2=='')){ var IDcom2 = document.getElementById("payciu"); IDcom2.style.border = "solid 3px red"; }
            if(($scope.ciudad2==undefined)||($scope.ciudad2=='')){ var IDcom3 = document.getElementById("payciu"); IDcom3.style.border = "solid 3px red"; }
            if(($scope.direccion==undefined)||($scope.direccion=='')){ var IDcom5 = document.getElementById("dir"); IDcom5.style.border = "solid 1px red"; }
            if(($scope.telefono==undefined)||($scope.telefono=='')){ var IDcom6 = document.getElementById("tel"); IDcom6.style.border = "solid 1px red"; }
            if(($scope.mail==undefined)||($scope.mail=='')){ var IDcom7 = document.getElementById("email"); IDcom7.style.border = "solid 1px red"; }
            if(($scope.password==undefined)||($scope.password=='')){ var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  }
            if(($scope.password2==undefined)||($scope.password2=='')){ var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red"; }
        }else{


            if($scope.password!=$scope.password2){
                alert("las contraseñas no coinciden"); var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red";
            }else{
                
                $http.post("../c/insert444.php", {'com':$scope.com,'nacim':$scope.nacimiento,'sxp':$scope.sexoPersona,'civ':$scope.civil,'pais':$scope.idPais,'ciudad':$scope.idCiudad,'dir':$scope.direccion,'tel':$scope.telefono, 'mail':$scope.mail, 'pass':$scope.password })
                .success(function(respuesta){ console.log(respuesta);
                              $scope.datosComp = respuesta;
                                var length = $scope.datosComp.length;
                                    for (i = 0; i < length; i++) {
                                        var shadow=$scope.datosComp[i].shadowsPersona;
                                    };

                                    if(shadow==0){

                                        actv('somethingS');
                                        
                                    }else{
                                        
                                        desactv('somethingS');
                                        document.forms['registroPersonas'].reset();
                                        detalles('milagro2','elena2');
                                    }
                            });

                //.success(function(data,status,headers,config){ console.log("datos registro empresa insertados correctamente"); });
                //document.forms['registroEmpresas'].reset();
                //detalles('milagro2','elena2');
                //location.reload();
            }
        }

    }






    $scope.posts444 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.posts444 = data;

        })
        .error(function(err){

        });  


});








