
var app = angular.module('talentEmpleosApp',[]);





app.controller('amy', ['$http', '$scope', function ( $http, $scope){


    $scope.shoot=function(identifier){
        
        var gn=identifier;
		$scope.giuliana = [];
	    $http.get("../m/i12.php?ssg=" + gn)
	        .success(function(data){
	            console.log(data);
	            $scope.giuliana = data;
	        })
	        .error(function(err){

	        });

	}



	$scope.insertnombreyapellido=function(person){
        var person=person;
	    if(($scope.nombreyapellido!=undefined)&&($scope.nombreyapellido!='')){
	        $http.post("../c/insert2.php", {'nombreyapellido':$scope.nombreyapellido,'person':person}) 
		    .success(function(data,status,headers,config){ console.log("datos insertados correctamente"); });
		    var fa = document.getElementById("faa");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.nombreyapellido=undefined;
			location.reload();
	    }else{
	    	var fa = document.getElementById("faa");
			fa.style.display = "block";
	    }

    }






    $scope.mandar=function(person2){
	    var person2=person2;
	    if(($scope.nacimiento!=undefined)&&($scope.nacimiento!='')){
		    $http.post("../c/insert5.php", {'nacimiento':$scope.nacimiento,'person':person2}) 
		    .success(function(data,status,headers,config){ console.log("datos nacimiento insertados correctamente"); }); 
		    var fa = document.getElementById("fba");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.nacimiento=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("fba");
			fa.style.display = "block";
	    }

	}



    
    $scope.enviarCivil=function(person3){
        var person3=person3;
	    if(($scope.civil!=undefined)&&($scope.civil!='')){
		    $http.post("../c/insert6.php", {'civil':$scope.civil,'person':person3}) 
		    .success(function(data,status,headers,config){ console.log("datos civil insertados correctamente"); });
		    var a = 'psb1'; var b = 'psb2'; detalles(a,b);
		    resetForm("formCivil");
		    var fa = document.getElementById("fca");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.civil=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("fca");
			    fa.style.display = "block";
	    }

    }





	$scope.enviarResidencia=function(person4){
        var person4=person4;
	    if(($scope.residencia!=undefined)&&($scope.residencia!='')){
		    $http.post("../c/insert7.php", {'residencia':$scope.residencia,'person':person4}) 
		    .success(function(data,status,headers,config){ console.log("datos residencia insertados correctamente"); }); 
		    var a = 'psc1'; var b = 'psc2'; detalles(a,b);
		    resetForm("formResidencia");
		    var fa = document.getElementById("ffa");
		    if(fa.style.display=="block"){fa.style.display = "none";}
		    $scope.residencia=undefined;
		    location.reload();
	    }else{
	    	var fa = document.getElementById("ffa");
			fa.style.display = "block";
	    }

    }    





	$scope.geo=function(){

		$scope.geolocation = [];
	    $http.get("../m/i555.php")
	        .success(function(data){
	            console.log(data);
	            $scope.geolocation = data;

	        })
	        .error(function(err){

	        }); 

    }





	$scope.roller=function(idPs,idCdd,idPsn){
        $scope.idPs = idPs;
        $scope.idCdd = idCdd;
        $scope.idPsn = idPsn;
        $http.post("../c/insert13.php", {'country':$scope.idPs,'city':$scope.idCdd,'person':$scope.idPsn})
		.success(function(data,status,headers,config){ console.log("datos experiencia laboral eliminados correctamente"); });
		location.reload();
    }    





	$scope.listarAcademicas=function(ppl){
        
        $scope.empleado=ppl;
		$scope.academicas = [];
		$http.get("../m/i100.php?ssg=" + $scope.empleado)
	        .success(function(data){
	            console.log(data);
	            $scope.academicas = data;

	        })
	        .error(function(err){

	        }); 

    }


    




    $scope.enviaAcademica=function(personA){

        $scope.personA=personA;
		//validar que el anio de inicio no este vacio
	    if(($scope.titulo==undefined)||($scope.inicio==undefined)||($scope.fin==undefined)||($scope.institucion==undefined)||($scope.idPais==undefined)||($scope.idCiudad==undefined)||($scope.titulo=='')||($scope.institucion=='')){
	        if(($scope.titulo==undefined)||($scope.titulo=='')){
			    var titu = document.getElementById("titl");
			    titu.style.color = "red";
			    
			    var titu2 = document.getElementById("psd2");
			    titu2.style.background = "#ffe5e5";
	        }

	        if($scope.inicio==undefined){
			    var yi = document.getElementById("anioInicial");
			    yi.style.color = "red";
			    
			    var yi2 = document.getElementById("psx2");
			    yi2.style.background = "#ffe5e5";
	        }

	        if($scope.fin==undefined){
	            var yf = document.getElementById("anioFinal");
			    yf.style.color = "red";
			    
			    var yf2 = document.getElementById("psx3");
			    yf2.style.background = "#ffe5e5";
	        }

	        if(($scope.institucion==undefined)||($scope.institucion=='')){
	            var insti = document.getElementById("inst");
			    insti.style.color = "red";
			    
			    var insti2 = document.getElementById("ps");
			    insti2.style.background = "#ffe5e5";
	        }
            

            
	        if($scope.idPais==undefined){
                alert("Parece que no has seleccionado ningun Pais, por favor intenta nuevamente");
	        }
	        

	        if($scope.idCiudad==undefined){
                alert("Parece que no has seleccionado ninguna Ciudad, por favor intenta nuevamente");
	        }

	    }else{

		    if($scope.inicio>$scope.fin){
		        alert("anio de inicio mayor que anio de finalizacion");
		    }else{
		        $http.post("../c/insert100.php", {'titulo':$scope.titulo,'inicio':$scope.inicio,'fin':$scope.fin,'institucion':$scope.institucion,'pais2':$scope.idPais,'ciudad2':$scope.idCiudad,'Persona':$scope.personA})
		        .success(function(data,status,headers,config){ console.log("datos información academica insertados correctamente"); });
		        document.forms['formularioAcademico'].reset();
		        location.reload();
		    }
	    }

	}





    //eliminar esta experiencia laboral
	$scope.eliminarEstaAcad=function(idAcad){
        $scope.idAcad = idAcad;
        $http.post("../c/eliminarAcademica.php", {'idAcadem':$scope.idAcad})
		.success(function(data,status,headers,config){ console.log("datos informacion academica eliminada correctamente"); });
		location.reload();
	}




    //setear los scopes con pais y ciudad
	$scope.setear=function(idPais,idCity,nmPais,nmCiudad){
		$scope.idPais=idPais;
		$scope.idCiudad=idCity;
		$scope.pais2=nmPais;
		$scope.ciudad2=nmCiudad;
	};



    //define cual de los botones mostrar
	$scope.cual=function(she,doesnt,mind,academicaEstado){
        
        $scope.she=she;
        //alert($scope.alto2);
        $scope.doesnt=doesnt;
        //alert($scope.medio2);
        $scope.mind=mind;
        //alert($scope.bajo2);
        $scope.academicaEstado=academicaEstado;
        //alert($scope.academicaEstado);
		if($scope.academicaEstado=='true'){
            detalles($scope.she,$scope.doesnt);
		}
	    if($scope.academicaEstado=='false'){
            detalles($scope.she,$scope.mind);
		}

	};



    //ocultar o mostrar elementos en el DOM
    $scope.o_d_e_c=function(toHide,toShow){
        $scope.toHide=toHide;
        $scope.toShow=toShow;
        detalles($scope.toHide,$scope.toShow);
	};





    //cargar el modelo laborales
	$scope.listarLaborales=function(persona3){
        
        $scope.empleado=persona3;
		$scope.laborales = [];
		$http.get("../m/i102.php?ssg=" + $scope.empleado)
	        .success(function(data){
	            console.log(data);
	            $scope.laborales = data;

	        })
	        .error(function(err){

	        }); 

    }




    //setear los scopes con pais y ciudad
	$scope.setear3=function(idP,idC,nmP,nmC){
		$scope.idP=idP;
		$scope.idC=idC;
		$scope.nmP=nmP;
		$scope.nmC=nmC;
	}






    //define cual de los botones mostrar
	$scope.choising=function(tienes,la,sonrisa,laboralEstado){
        
        $scope.tienes=tienes;
        //alert($scope.alto2);
        $scope.la=la;
        //alert($scope.medio2);
        $scope.sonrisa=sonrisa;
        //alert($scope.bajo2);
        $scope.laboralEstado=laboralEstado;
        //alert($scope.academicaEstado);
		if($scope.laboralEstado=='true'){
            detalles($scope.tienes,$scope.la);
		}
	    if($scope.laboralEstado=='false'){
            detalles($scope.tienes,$scope.sonrisa);
		}

	};






	$scope.enviaLaboral=function(Persona){

        $scope.Persona=Persona;
	    //validar que el anio de inicio no este vacio
	    if(($scope.cargo==undefined)||($scope.empresa==undefined)||($scope.idP==undefined)||($scope.idC==undefined)||($scope.cargo=='')||($scope.empresa=='')){
	        if(($scope.cargo==undefined)||($scope.cargo=='')){
			    var za = document.getElementById("xb");
			    za.style.color = "red";
			    
			    var zd = document.getElementById("xa");
			    zd.style.background = "#ffe5e5";
	        }


	        if(($scope.empresa==undefined)||($scope.empresa=='')){
	            var zh = document.getElementById("xn");
			    zh.style.color = "red";
			    
			    var zk = document.getElementById("xm");
			    zk.style.background = "#ffe5e5";
	        }

	        if($scope.idP==undefined){
                alert('Parece que no has seleccionado ningun Pais, por favor intenta nuevamente');
	        }

	        if($scope.idC==undefined){
                alert('Parece que no has seleccionado ningun Ciudad, por favor intenta nuevamente');
	        }

	    }else{
		    $http.post("../c/insert102.php", {'cargo':$scope.cargo,'inicial':$scope.inicial,'final':$scope.finalizcn,'empresa':$scope.empresa,'pais3':$scope.idP,'ciudad3':$scope.idC,'Persona':$scope.Persona})
		    .success(function(data,status,headers,config){ console.log("datos experiencia laboral insertados correctamente"); });
		    location.reload();
	    }

    }




    //eliminar esta experiencia laboral
	$scope.eliminarEstaLab=function(idLab){
        $scope.idLab = idLab;
        $http.post("../c/eliminarLaboral.php", {'idLab':$scope.idLab})
		.success(function(data,status,headers,config){ console.log("datos experiencia laboral eliminados correctamente"); });
		location.reload();
	}






}]);
