
var ap = angular.module('talentApp',[]);



ap.controller('ControllerEmpleadores1',function($scope,$http){
    

    $scope.pasar=function(pasada){

        var sd=pasada;
		$scope.empleadores1 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.empleadores1 = data;
	        })
	        .error(function(err){

	        }); 
    }



	$scope.updateComercial=function(empresa){
		$scope.empresa=empresa;
	    if(($scope.comercial!=undefined)&&($scope.comercial!='')){
		    $http.post("../c/update1.php", {'comercial':$scope.comercial,'empresa':$scope.empresa}) 
		    .success(function(data,status,headers,config){ console.log("datos comercial insertados correctamente"); }); 
		    //var a = 'xaa'; var b = 'xac'; detalles(a,b);
		    resetForm("formComercial");
		    var fa = document.getElementById("gaa");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.comercial=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("gaa");
			    fa.style.display = "block";
	    }

    }



});













ap.controller('ControllerEmple3',function($scope,$http){

    $scope.pasarEmple3=function(pasada){

        var sd=pasada;
		$scope.emple3 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.emple3 = data;
	        })
	        .error(function(err){

	        }); 
    }


});









ap.controller('ControllerEmpleadores3',function($scope,$http){
    

    $scope.empleadores3 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.empleadores3 = data;

        })
        .error(function(err){

        });  




    $scope.seteHvEmpresas=function(f,g,IDpais,IDciudad,empresa){
        
        var empresa = empresa;
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        $scope.empresa=empresa;



        

	    if(($scope.idPais!=undefined)&&($scope.idPais!='')&&($scope.idCiudad!=undefined)&&($scope.idCiudad!='')){
		    $http.post("../c/update3.php", {'pais3':$scope.idPais,'ciudad3':$scope.idCiudad,'empresa':$scope.empresa}) 
		    .success(function(data,status,headers,config){ console.log("datos pais y ciudad insertados correctamente"); });

		    location.reload();
	    }


    };



});







ap.controller('ControllerEmpleadores5',function($scope,$http){

	$scope.pasar5=function(pasada){
    	
        var sd=pasada;
		$scope.empleadores5 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.empleadores5 = data;
	        })
	        .error(function(err){

	        }); 
    }


	$scope.updateZona=function(empresa){
		$scope.empresa=empresa;
		if(($scope.zona!=undefined)&&($scope.zona!='')){
		    $http.post("../c/update5.php", {'zona':$scope.zona,'empresa':$scope.empresa}) 
		    .success(function(data,status,headers,config){ console.log("dato zona insertado correctamente"); });
		    //var a = 'xka'; var b = 'xkc'; detalles(a,b);
		    resetForm("formZona");
		    var fa = document.getElementById("gka");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.zona=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("gka");
			    fa.style.display = "block";
	    } 

    }

});






ap.controller('ControllerEmpleadores6',function($scope,$http){

	$scope.pasar6=function(pasada){
    	
        var sd=pasada;
		$scope.empleadores6 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.empleadores6 = data;
	        })
	        .error(function(err){

	        }); 
    }


	$scope.updateDireccion=function(empresa){
		$scope.empresa=empresa;
		if(($scope.direccion!=undefined)&&($scope.direccion!='')){
		    $http.post("../c/update6.php", {'direccion':$scope.direccion,'empresa':$scope.empresa}) 
		    .success(function(data,status,headers,config){ console.log("dato direccion insertado correctamente"); }); 
		    //var a = 'xma'; var b = 'xmc'; detalles(a,b);
		    resetForm("formDireccion");
		    var fa = document.getElementById("gna");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.direccion=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("gna");
			    fa.style.display = "block";
	    }

    }

});




ap.controller('ControllerEmpleadores7',function($scope,$http){


    $scope.pasar7=function(pasada){
    	
        var sd=pasada;
		$scope.empleadores7 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.empleadores7 = data;
	        })
	        .error(function(err){

	        }); 
    }



	$scope.updateTelefono=function(empresa){
		$scope.empresa=empresa;
		if(($scope.telefono!=undefined)&&($scope.telefono!='')){
		    $http.post("../c/update7.php", {'telefono':$scope.telefono,'empresa':$scope.empresa}) 
		    .success(function(data,status,headers,config){ console.log("dato telefono insertado correctamente"); }); 
		    //var a = 'xpa'; var b = 'xpc'; detalles(a,b);
		    resetForm("formTelefono");
		    var fa = document.getElementById("gpa");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.telefono=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("gpa");
			    fa.style.display = "block";
	    }

    }

});







ap.controller('ControllerEmpleadores8',function($scope,$http){


    $scope.pasarEmple8=function(pasada){
    	
        var sd=pasada;
		$scope.empleadores8 = [];
	    $http.get("../m/hvEmpresas.php?empleador=" + sd)
	        .success(function(data){
	            console.log(data);
	            $scope.empleadores8 = data;
	        })
	        .error(function(err){

	        }); 
    }



});



