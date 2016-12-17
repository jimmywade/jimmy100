
var app = angular.module('talentApp',[]);


app.controller("mc300",function($scope,$http){

    $scope.mandar300=function(idvcnt,cnt,idIncompleto){

        var idV = idvcnt;
        var canti = cnt;

        var idCompleto=idIncompleto + 'x';

        //canti es el limite maximo de aspirantes permitido por la empresa     tiene que ser mayor para que no halla problema
        //$scope.cant es la cantidad ingresada por el usuario
        
        // so si canti es mayor o igual que scope.cnt entra y actualiza la cantidad 

        if($scope.titu!=undefined){ 
            $http.post("../c/insert300.php", {
                                                'Titulo':$scope.titu,
                                                'Vacante':idV}) 
            .success(function(data,status,headers,config){ 
                console.log("datos insertados correctamente"); 
            }); 
            location.reload(); 
        }
        
        if($scope.desc!=undefined){ 
            $http.post("../c/insert301.php", {
                                                'Descripcion':$scope.desc,
                                                'Vacante':idV}) 
            .success(function(data,status,headers,config){ 
                console.log("datos insertados correctamente"); 
            }); 
            location.reload(); 
        }
        
        if(($scope.cant!=undefined)&&($scope.cant>canti)){ 
            $http.post("../c/insert303.php", {
                                                'Cantidad':$scope.cant,
                                                'Vacante':idV}) 
            .success(function(data,status,headers,config){ 
                console.log("datos insertados correctamente"); 
            }); 
            location.reload(); 
        }else{ 
            var identificador = document.getElementById(idCompleto);  
            identificador.style.border = "solid 1px #D9534F"; $scope.cant=canti; 
        }


    };


    
    $scope.invisibleBond = function(a,b){
        var detailesA = document.getElementById(a);
        var detailesB = document.getElementById(b);
        var details2 = detailesB.style.display;
        var details3 = "none";
        if (details2 == details3){
            detailesB.style.display = "block"; detailesA.style.display = "none";
        }
        var details5 = "block";
        if (details2 == details5){
            detailesB.style.display = "none"; detailesA.style.display = "block";
        }
    };




    $scope.pasarCorp=function(pasada){

        var sd=pasada;
    	$scope.posts300 = [];
        $http.get("../m/i400.php?empleador=" + sd)
            .success(function(data){
                console.log(data);
                $scope.posts300 = data;
            })
            .error(function(err){

            });
    }





    $scope.wildparty=function(fun){
        var fun=fun;
        if(fun==1){ 
            detalles('party','celebration'); 
            detalles('configA','configB'); 
        }
    }  


    
});















//registro empresas
app.controller('myController555',function($scope,$http){

    $scope.sete555=function(f,g,IDpais,IDciudad){
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        
        alert('Pais: ' + $scope.pais2 + ' |  Ciudad: ' + $scope.ciudad2);
    };




    $scope.reg=function(){
        //validar que el anio de inicio no este vacio
        if(($scope.com==undefined)||($scope.com=='')
         ||($scope.sector==undefined)||($scope.sector=='')
         ||($scope.pais2==undefined)||($scope.pais2=='')
         ||($scope.ciudad2==undefined)||($scope.ciudad2=='')
         ||($scope.zona==undefined)||($scope.zona=='')
         ||($scope.direccion==undefined)||($scope.direccion=='')
         ||($scope.telefono==undefined)||($scope.telefono=='')
         ||($scope.mail==undefined)||($scope.mail=='')
         ||($scope.password==undefined)||($scope.password=='')
         ||($scope.password2==undefined)||($scope.password2==''))
        {
            if(($scope.com==undefined)||($scope.com=='')){ var IDcom = document.getElementById("ncomer"); IDcom.style.border = "solid 1px red"; }
            if(($scope.sector==undefined)||($scope.sector=='')){ var IDcomB = document.getElementById("ec"); IDcomB.style.border = "solid 1px red"; }
            if(($scope.pais2==undefined)||($scope.pais2=='')){ var IDcom2 = document.getElementById("payciu"); IDcom2.style.border = "solid 3px red"; }
            if(($scope.ciudad2==undefined)||($scope.ciudad2=='')){ var IDcom3 = document.getElementById("payciu"); IDcom3.style.border = "solid 3px red"; }
            if(($scope.zona==undefined)||($scope.zona=='')){ var IDcom4 = document.getElementById("zon"); IDcom4.style.border = "solid 1px red"; }
            if(($scope.direccion==undefined)||($scope.direccion=='')){ var IDcom5 = document.getElementById("dir"); IDcom5.style.border = "solid 1px red"; }
            if(($scope.telefono==undefined)||($scope.telefono=='')){ var IDcom6 = document.getElementById("tel"); IDcom6.style.border = "solid 1px red"; }
            if(($scope.mail==undefined)||($scope.mail=='')){ var IDcom7 = document.getElementById("email"); IDcom7.style.border = "solid 1px red"; }
            if(($scope.password==undefined)||($scope.password=='')){ var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  }
            if(($scope.password2==undefined)||($scope.password2=='')){ var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red"; }
        }else{
            if($scope.password!=$scope.password2){
                alert("las contraseñas no coinciden"); var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red";
            }else{
                
                $http.post("../c/insert555.php", {'com':$scope.com,'sector':$scope.sector,'pais':$scope.idPais,'ciudad':$scope.idCiudad,'zona':$scope.zona,'dir':$scope.direccion,'tel':$scope.telefono, 'mail':$scope.mail, 'pass':$scope.password, 'pass2':$scope.password2 })
                .success(function(respuesta){ console.log(respuesta);
                                              $scope.datosComp = respuesta;
                                                var length = $scope.datosComp.length;
                                                    for (i = 0; i < length; i++) {
                                                        var shadow=$scope.datosComp[i].shadowsEmpresa;
                                                    };

                                                    if(shadow==0){ 
                                                        actv('somethingW');
                                                    }else{
                                                        desactv('somethingW');
                                                        document.forms['registroEmpresas'].reset();
                                                        detalles('registroW','loginW');
                                                    }
                                            });
                //.success(function(data,status,headers,config){ console.log("datos registro empresa insertados correctamente"); });
                //location.reload();
            }
        }

    }






    $scope.posts555 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.posts555 = data;

        })
        .error(function(err){

        });  


});










//landing page
app.controller('myController556',function($scope,$http){

    $scope.sete555=function(f,g,IDpais,IDciudad){
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        
        alert('Pais: ' + $scope.pais2 + ' |  Ciudad: ' + $scope.ciudad2);
    };




    $scope.reg2=function(){
        //validar que el anio de inicio no este vacio
        if(($scope.com==undefined)||($scope.com=='')||($scope.sector==undefined)||($scope.sector=='')||($scope.pais2==undefined)||($scope.pais2=='')||($scope.ciudad2==undefined)||($scope.ciudad2=='')||($scope.zona==undefined)||($scope.zona=='')||($scope.direccion==undefined)||($scope.direccion=='')||($scope.telefono==undefined)||($scope.telefono=='')||($scope.mail==undefined)||($scope.mail=='')||($scope.password==undefined)||($scope.password=='')||($scope.password2==undefined)||($scope.password2==''))
        {
            if(($scope.com==undefined)||($scope.com=='')){ var IDcom = document.getElementById("ncomer"); IDcom.style.border = "solid 1px red"; }
            if(($scope.sector==undefined)||($scope.sector=='')){ var IDcomB = document.getElementById("ec"); IDcomB.style.border = "solid 1px red"; }
            if(($scope.pais2==undefined)||($scope.pais2=='')){ var IDcom2 = document.getElementById("payciu"); IDcom2.style.border = "solid 3px red"; }
            if(($scope.ciudad2==undefined)||($scope.ciudad2=='')){ var IDcom3 = document.getElementById("payciu"); IDcom3.style.border = "solid 3px red"; }
            if(($scope.zona==undefined)||($scope.zona=='')){ var IDcom4 = document.getElementById("zon"); IDcom4.style.border = "solid 1px red"; }
            if(($scope.direccion==undefined)||($scope.direccion=='')){ var IDcom5 = document.getElementById("dir"); IDcom5.style.border = "solid 1px red"; }
            if(($scope.telefono==undefined)||($scope.telefono=='')){ var IDcom6 = document.getElementById("tel"); IDcom6.style.border = "solid 1px red"; }
            if(($scope.mail==undefined)||($scope.mail=='')){ var IDcom7 = document.getElementById("email"); IDcom7.style.border = "solid 1px red"; }
            if(($scope.password==undefined)||($scope.password=='')){ var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  }
            if(($scope.password2==undefined)||($scope.password2=='')){ var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red"; }
        }else{
            if($scope.password!=$scope.password2){
                alert("las contraseñas no coinciden"); var IDcom8 = document.getElementById("pwd"); IDcom8.style.border = "solid 1px red";  var IDcom9 = document.getElementById("pwd2"); IDcom9.style.border = "solid 1px red";
            }else{
                
                $http.post("../c/insert555.php", {'com':$scope.com,'sector':$scope.sector,'pais':$scope.idPais,'ciudad':$scope.idCiudad,'zona':$scope.zona,'dir':$scope.direccion,'tel':$scope.telefono, 'mail':$scope.mail, 'pass':$scope.password, 'pass2':$scope.password2 })
                .success(function(respuesta){ console.log(respuesta);
                                              $scope.datosComp = respuesta;
                                                var length = $scope.datosComp.length;
                                                    for (i = 0; i < length; i++) {
                                                        var shadow=$scope.datosComp[i].shadowsEmpresa;
                                                    };

                                                    if(shadow==0){
                                                        actv('somethingE');
                                                    }else{
                                                        desactv('somethingE');
                                                        document.forms['registroEmpresas'].reset();
                                                        detalles('milagro','elena');
                                                    }
                                            });


                //.success(function(respuesta){ console.log(respuesta); });
                //.success(function(data,status,headers,config){ console.log("datos registro empresa insertados correctamente"); });
                //document.forms['registroEmpresas'].reset();
                //detalles('milagro','elena');
                //location.reload();
            }
        }

    }






    $scope.posts555 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.posts555 = data;

        })
        .error(function(err){

        });


  


});




