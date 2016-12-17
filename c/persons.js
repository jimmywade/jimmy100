
var app = angular.module('personasApp',['ngFileUpload']);




app.controller('controllerV', ['$http', '$scope', 'Upload', function ($http, $scope, Upload){


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
    }


    



    //perfilRead LOGIN
    $scope.vLogin=function(h,s){

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
                        var foo = $scope.getObjects('AcceptedRead');
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


















    //pending
    $scope.pending=function(h,s){
                   
                        var foo = $scope.hs(h,s);
                        var foo = $scope.getObjects('pendingRead');
 
    }










    //nothing
    $scope.nothing=function(h,s){
                   
                        var foo = $scope.hs(h,s);
                        var foo = $scope.getObjects('nothingRead');
 
    }










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







    //lanzar consulta GET a cualquier webservice de control
    $scope.getObjects=function(nombreObject){
                //load todos los objetos principales
                $scope.listado = [];
                $http.get("../c/" +  nombreObject + ".php")
                    .success(function(data,status,headers,config){
                        $scope.listado = data;
                        console.log(data);
                        console.log('-----------------------');
                        console.log('STATUS: ' + status );
                        console.log('-----------------------');
                        console.log('HEADERS:' + headers );
                        console.log('-----------------------');
                        console.log(config);
                    })
                    .error(function(err){
                        console.log('no se pudo consultar -> ' + nombreObject);
                    });
     };









    //lanzar consulta GET a cualquier webservice de control
    $scope.getObjects=function(nombreObject){
                //load todos los objetos principales
                $scope.listado = [];
                $http.get("../c/" +  nombreObject + ".php")
                    .success(function(data,status,headers,config){
                        $scope.listado = data;
                        console.log(data);
                        console.log('-----------------------');
                        console.log('STATUS: ' + status );
                        console.log('-----------------------');
                        console.log('HEADERS:' + headers );
                        console.log('-----------------------');
                        console.log(config);
                    })
                    .error(function(err){
                        console.log('no se pudo consultar -> ' + nombreObject);
                    });
    };











    //$scope.$watch($scope.getObjects);





/*

    //lanzar consulta POST a cualquier webservice de control
    $scope.postObjects=function(nombreObject,json){
                //load todos los objetos principales
                $scope.listado = [];
                $http.post("../c/" +  nombreObject + ".php",json)
                    .success(function(data,status,headers,config){
                        $scope.listado = data;
                        console.log(data);
                        console.log('-----------------------');
                        console.log('STATUS: ' + status );
                        console.log('-----------------------');
                        console.log('HEADERS:' + headers );
                        console.log('-----------------------');
                        console.log(config);
                        console.log('-----------------------');

                    })
                    .error(function(err){
                        console.log('no se pudo consultar -> ' + nombreObject);
                    });
    };
*/



















    //update nombreyapellido
    $scope.nombreUpdate=function(){
        $scope.v = [];
        $http.post("../c/nombreUpdate.php",{'idPersona':$scope.token,'nombrePersona':$scope.nombrePersona})
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
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
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
        alert($scope.token);
        alert($scope.idCivil);
        $scope.v = [];
        $http.post("../c/civilUpdate.php",{'idPersona':$scope.token,'idCivil':$scope.idCivil})
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
                console.log(data);
                console.log('-----------------------');
                console.log('STATUS: ' + status );
                console.log('-----------------------');
                console.log('HEADERS:' + headers );
                console.log('-----------------------');
                console.log(config);
                console.log('-----------------------');
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

    
}]);












app.filter('cortarTexto', function(){
  return function(input, limit){
    return (input.length > limit) ? input.substr(0, limit)+'...' : input;
  };
})

