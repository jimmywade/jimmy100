
var ap = angular.module('talentApp',[]);

ap.controller('ctrlNuevaVacante1',function($scope,$http){

	$scope.posts555 = [];
    $http.get("../m/i555.php")
        .success(function(data){
            console.log(data);
            $scope.posts555 = data;

        })
        .error(function(err){

        }); 



    $scope.pasarCorp2=function(pasada){

        var sd=pasada;
    	$scope.posts300 = [];
        $http.get("../m/i539.php?empleador=" + sd)
            .success(function(data){
                console.log(data);
                $scope.posts300 = data;
            })
            .error(function(err){

            });
    }



	$scope.seteNV=function(f,g,IDpais,IDciudad){
        $scope.pais2=f;
        $scope.ciudad2=g;
        $scope.idPais=IDpais;
        $scope.idCiudad=IDciudad;
        
        alert('Pais: ' + $scope.pais2 + ' |  Ciudad: ' + $scope.ciudad2);
    };



	$scope.actualizarVacante=function(idCompany){

		$scope.idCompany=idCompany;

		if(($scope.sweb==undefined)&&($scope.adicional==undefined)&&($scope.direccion5==undefined)&&($scope.referencia==undefined)){
		
			var elemento = document.getElementById('indique');
			elemento.style.display = "block";

		}else{
			
			//validar si esta set las dos opciones de entrevista presencial o las dos opciones de entrevista virtual
			if(($scope.sweb!=undefined)&&($scope.adicional!=undefined)||($scope.direccion5!=undefined)&&($scope.referencia!=undefined)){
	            
					//inicializa el scope presencial a cero -  despues en los if les da valor de 1 si es presencial y 2 si es virtual para insertarlo en la DB
					$scope.modalidad=0;
					if(($scope.direccion5!=undefined)&&($scope.referencia!=undefined)){ $scope.modalidad=1; }
					if(($scope.sweb!=undefined)&&($scope.adicional!=undefined)){ $scope.modalidad=2; }

					$http.post("../c/actualizar1.php", {'cargo5':$scope.cargo5,'descripcion':$scope.descripcion,'pais5':$scope.idPais,'ciudad5':$scope.idCiudad,'contrato':$scope.contrato,'salario':$scope.salario,'fecha5':$scope.fecha5,'hora5':$scope.hora5,'modalidad':$scope.modalidad,'sweb':$scope.sweb,'adicional':$scope.adicional,'direccion5':$scope.direccion5,'referencia':$scope.referencia,'email5':$scope.email5,'telefono':$scope.telefono,'fin5':$scope.fin5,'cantidad':$scope.cantidad,'idCompany':$scope.idCompany}) 
					.success(function(data,status,headers,config){ console.log("datos nueva vacante insertados correctamente"); });
					resetForm("maria");
					location.reload();

	        }else{

	            var elemento = document.getElementById('indique');
			    elemento.style.display = "block";
	        }
		}
 
    }

});