
var app = angular.module('personasApp',['ngFileUpload']);




app.controller('controllerV', ['$http', '$scope', 'Upload', function ($http, $scope, Upload){


 



    //set default values
    $scope.setDefaultValues=function(){
        $scope.token= "";
        $scope.profilePicture = "";
        $scope.nombrePersona = "";
        $scope.nacimientoPersona = "";
        $scope.direccionPersona = "";
        $scope.nombreCivil = "";
        $scope.nombreCiudad = "";
        $scope.nombrePais = "";
        $scope.emailPersona='edi@gmail.com';
        $scope.contraseniaPersona='123';
        //$scope.citiesERR = 'excelente';
    }


    




/*
*********************************************************************************************
Personas
*********************************************************************************************
*/



    //perfilRead LOGIN
    $scope.vLogin=function(h,s,ss){

        if(
            ($scope.emailPersona!=undefined)&&($scope.emailPersona!='')
            &&($scope.contraseniaPersona!=undefined)&&($scope.contraseniaPersona!='')
            ){
                $scope.v = [];
                
                $http.post("../c/profileRead.php", {
                                                    'emailPersona':$scope.emailPersona,
                                                    'contraseniaPersona':$scope.contraseniaPersona
                })
                .success(function(data,status,headers,config){ 
                    $scope.v = data;
                    
                    console.log(data);
                    console.log('-----------------------');
                    console.log('STATUS: ' + status );
                    console.log('-----------------------');
                    console.log('HEADERS:' + headers );
                    console.log('-----------------------');
                    console.log(config);
                    console.log('-----------------------');
                    

                    if(status==200){
                        var foo = $scope.hs(h,s);
                        var foo = $scope.setDivActive(s);
                        var foo = $scope.showSingle(ss);
                        var foo = $scope.getObjects('AcceptedRead');
                        var pending = $scope.pendingRead();
                        var nothing = $scope.nothingRead();
                        var foo = $scope.setToken($scope.v[0].idPersona);
                        var foo = $scope.getToken();
                        $scope.profilePicture = $scope.v[0].imgPersona;
                        $scope.nombrePersona = $scope.v[0].nombrePersona;
                        $scope.nacimientoPersona = $scope.v[0].nacimientoPersona;
                        $scope.direccionPersona = $scope.v[0].direccionPersona;
                        $scope.nombreCivil = $scope.v[0].nombreCivil;
                        $scope.nombreCiudad = $scope.v[0].nombreCiudad;
                        $scope.nombrePais = $scope.v[0].nombrePais;
                    }

            });

        }else{
            $scope.errorLogin = "Oops! ...parece que faltan datos importantes";
            var fa = document.getElementById("mensajeAviso");
            fa.style.display = "block";
            var borde = document.getElementById("bordeAviso");
            borde.style.border = "solid 2px red";
        }
        
    }











   // upload later on form submit or something similar
    $scope.submit = function() {
      if ($scope.form.file.$valid && $scope.file) {
        $scope.upload($scope.file);
      }
    };



    // upload on file select or drop
    $scope.upload = function (file) {
        $scope.token = localStorage.getItem('token');

        Upload.upload({
            url: '../c/fotoUpdate.php',
            data: {file: file, 'username': $scope.username,'idPersona':$scope.token}
        }).then(function (resp) {


            console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
            if(resp.data){
                var foo = $scope.reload('profileReload');
                setTimeout(function(){ 
                                $scope.$apply(function(){
                                                            $scope.profilePicture;
                                                       });
                                }
                        ,3000
                        );
                $scope.hs('otof','foto');

            }
                           

        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);

        });

    };



    /*
    // for multiple files:
    $scope.uploadFiles = function (files) {
      if (files && files.length) {
        for (var i = 0; i < files.length; i++) {
          Upload.upload({..., data: {file: files[i]}, ...})...;
        }
        // or send them all together for HTML5 browsers:
        Upload.upload({..., data: {file: files}, ...})...;
      }
    }     
    */










    /*
    //reload el perfil
    $scope.reload=function(webservice){
        //load todos los objetos principales
        $scope.v = [];
        $http.post("../c/" +  webservice + ".php",{'idPersona':$scope.token})
            .success(function(data,status,headers,config){
                $scope.v = data;
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');

                if(status==200){
                    var foo = $scope.setToken($scope.v[0].idPersona);
                    var foo = $scope.getToken();
                    $scope.profilePicture = $scope.v[0].imgPersona;
                }

            })
            .error(function(err){
                console.log('no se pudo consultar -> ' + webservice);
            });
    }


    */










    //update nombreyapellido
    $scope.nombreUpdate=function(){
        $scope.v = [];
        $http.post("../c/nombreUpdate.php",{'idPersona':$scope.token,'nombrePersona':$scope.nombrePersona})
            .success(function(data,status,headers,config){
                $scope.v = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                if(status == 200){
                    $scope.nombrePersona = $scope.v[0].nombrePersona;
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.nombrePersona;
                                                                   });
                                            $scope.hs('psn2','psn1');         
                                         },2000
                    );
                }
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice nombreUpdate');
            });
    }
    




    //update fecha de nacimiento
    $scope.nacimientoUpdate=function(){
        $scope.v = [];
        $http.post("../c/nacimientoUpdate.php",{'idPersona':$scope.token,'nacimientoPersona':$scope.nacimientoPersona2})
            .success(function(data,status,headers,config){
                $scope.v = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                if(status == 200){
                    $scope.nacimientoPersona = $scope.v[0].nacimientoPersona;
                    $scope.nacimientoPersona2 = "";
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.nacimientoPersona;
                                                                   });
                                         },2000
                    );
                    $scope.hs('psa2','psa1');
                }
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice nacimientoUpdate');
            });
    }





    //update estado civil
    $scope.civilUpdate=function(){
        //alert($scope.token);
        //alert($scope.idCivil);
        $scope.v = [];
        $http.post("../c/civilUpdate.php",{'idPersona':$scope.token,'idCivil':$scope.idCivil})
            .success(function(data,status,headers,config){
                $scope.v = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                if(status == 200){
                    $scope.nombreCivil = $scope.v[0].nombreCivil;
                    $scope.idCivil = "";
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.nombreCivil;
                                                                   });
                                         },2000
                    );
                    $scope.hs('psb2','psb1');
                }
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice direccionUpdate');
            });
    }






    //update direccion  persona
    $scope.direccionUpdate=function(){
        $scope.v = [];
        $http.post("../c/direccionUpdate.php",{'idPersona':$scope.token,'direccionPersona':$scope.direccionPersona})
            .success(function(data,status,headers,config){
                $scope.v = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                if(status == 200){
                    $scope.direccionPersona = $scope.v[0].direccionPersona;
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.direccionPersona;
                                                                   });
                                         },2000
                    );
                    $scope.hs('psc2','psc1');
                }
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice direccionUpdate');
            });
    }















    $scope.paisesRead=function(){
        
        $scope.countries = [];
        $http.get("../c/paisesRead.php")
            .success(function(data){
                console.log('paisespaisespaises');
                console.log(data);
                console.log('paisespaisespaises');
                $scope.countries = data;
            })
            .error(function(err){
                console.log('problema al leer Paises');
            }); 
    }

    




    $scope.ciudadesRead=function(h,s){

        $scope.cities = [];
        var setting = $scope.setPais($scope.elegido.idPais);
        $http.post("../c/ciudadesRead.php",{'idPais':$scope.elegido.idPais})
            .success(function(data){
                console.log('xxxxxxxxxxx');
                console.log(data);
                console.log('xxxxxxxxxxx');
                
                $scope.cities = data;

                $scope.rows = data.length;

                if((data!=undefined)&&(data!='')&&(data!='[]')&&(data!='()')&&(data!=null)){
                    var hideShow = $scope.hs(h,s); 
                }else{
                    if($scope.rows==0){
                        $scope.citiesERR = 'no existen ciudades para este pais, por favor intente nuevamente';
                        console.log('problema al consultar las ciudades 1');
                    }else{
                        console.log('problema al consultar las ciudades 2');
                    }
                }
                

            })
            .error(function(err){
                console.log('problema al consultar las ciudades 9');
            });
 
    }








    $scope.setPais=function(idPais){
        $scope.idPais = idPais;
    }









    //update direccion  persona
    $scope.ciudadesUpdate=function(h,s){


        $scope.v = [];
        $http.post("../c/ciudadUpdate.php",{'idPersona':$scope.token,'idCiudad':$scope.choosed.idCiudad,'idPais':$scope.idPais})
            .success(function(data,status,headers,config){
                $scope.v = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                if(status == 200){
                    $scope.nombreCiudad = $scope.v[0].nombreCiudad;
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.nombreCiudad;
                                                                       $scope.hs(h,s);
                                                                   });
                                         },1000
                    );
                    
                }
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice direccionUpdate');
            });
    }












/*
*********************************************************************************************
Academicas
*********************************************************************************************
*/





    $scope.listarAcademicas=function(){
        
        $scope.academicas = [];
        $http.post("../c/academicasRead.php" , {'idPersona':$scope.token})
            .success(function(data){
                //console.log('dataAcademicas es: ' + data);
                $scope.academicas = data;


            })
            .error(function(err){
                console.log('problema al consultar academicas');
            }); 

    }


    









/*
*********************************************************************************************
Vacantes
*********************************************************************************************
*/





    //accepted GREEN
    $scope.getObjects=function(nombreObject){
                //load todos los objetos principales
                $scope.listado = [];
                $http.get("../c/" +  nombreObject + ".php")
                    .success(function(data,status,headers,config){
                        $scope.listado = data;
                        /*
                        console.log(data);
                        console.log('-----------------------');
                        console.log('STATUS: ' + status );
                        console.log('-----------------------');
                        console.log('HEADERS:' + headers );
                        console.log('-----------------------');
                        console.log(config);
                        */
                    })
                    .error(function(err){
                        console.log('no se pudo consultar -> ' + nombreObject);
                    });
    };









    //pending YELLOW
    $scope.pendingRead=function(){
                   
        $scope.listado2 = [];
        $http.get("../c/pendingRead.php")
            .success(function(data,status,headers,config){
                $scope.listado2 = data;
                /*
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                */
            })
            .error(function(err){
                console.log('no se pudo consultar -> ' + nombreObject);
            });

 
    }







    //nothing RED
    $scope.nothingRead=function(){

                $scope.listado3 = [];
                $http.get("../c/nothingRead.php")
                    .success(function(data,status,headers,config){
                        $scope.listado3 = data;
                        /*
                        console.log(data);
                        console.log('-----------------------');
                        console.log('STATUS: ' + status );
                        console.log('-----------------------');
                        console.log('HEADERS:' + headers );
                        console.log('-----------------------');
                        console.log(config);
                        */
                    })
                    .error(function(err){
                        console.log('no se pudo consultar -> ' + nombreObject);
                    });

 
    }








    //aplicarVacante
    $scope.solicitudCreate=function(idVacante,idEmpresa,h,s){
        //console.log('vacante es: ' + idVacante);
        //console.log('empresa es: ' + idEmpresa);
        var mivariable = $scope.getToken();
        //console.log('usuario es: ' + $scope.token);

        
        $scope.createSolicitud = [];
        $http.post("../c/solicitudCreate.php",{'idPersona':$scope.token,'idVacante':idVacante,'idEmpresa':idEmpresa})
            .success(function(data,status,headers,config){
                $scope.createSolicitud = data;
                /*
                console.log('---data: ---');
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
                */
                
                if(status == 200){
                    var foo = $scope.getObjects('AcceptedRead');
                    var pending = $scope.pendingRead();
                    var nothing = $scope.nothingRead();
                    setTimeout(function(){ 
                                            $scope.$apply(function(){
                                                                       $scope.listado;
                                                                       $scope.listado2;
                                                                       $scope.listado3;
                                                                   });
                                         },2000
                    );
                   
                }
                
                
            })
            .error(function(err){
                console.log('no se pudo consultar webservice direccionUpdate');
            });
            
        var hideShow = $scope.hs(h,s);
    }
    









/*
*********************************************************************************************
Other
*********************************************************************************************
*/





    //set token
    $scope.setToken=function(newToken){
       localStorage.setItem('token', newToken);
    }
    



    //get token
    $scope.getToken=function(){
       $scope.token = localStorage.getItem('token');
    }




    //default views
    $scope.setDefaultViews=function(){
        if(!$scope.estudianteRead || !proyectosRead){
            on('loginActivity');
            off('personRead');
            //off('personDelete');
            //off('personUpdate');
            //off('academicaCreate');
            //off('academicaRead');
            //off('academicaUpdate');
            //off('academicaDelete');
            //off('laboralCreate');
            //off('laboralRead');
            //off('laboralUpdate');
            //off('laboralDelete');
        }
    }





    //hide and show 
    $scope.hs=function(h,s){
        var h = h;
        var s = s; 
        off(h);
        on(s);
    }





    //turn off este
    $scope.setDivActive=function(active){

        timer7 = setTimeout(function(){ $scope.divActive = active; console.log('div active: ' + $scope.divActive); }, 300);

    }






    //turn off current , turn on main
    $scope.showSingle=function(este){
        on(este);
    }




    //turn off este
    $scope.hideSingle=function(este){
        off(este);
    }





    /*
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
    */





    /*
    $scope.wildparty=function(fun){
        var fun=fun;
        if(fun==1){ 
            detalles('party','celebration'); 
            detalles('configA','configB'); 
        }
    }  
    */




    //destruir sesion 
    $scope.destruirSesion=function(){
        token = undefined;
        $scope.token = token;
        localStorage.setItem('token', token);
        location.reload();
    }






}]);












app.filter('cortarTexto', function(){
  return function(input, limit){
    return (input.length > limit) ? input.substr(0, limit)+'...' : input;
  };
})


