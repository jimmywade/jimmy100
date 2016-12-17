
var app = angular.module('talentApp',[]);


app.controller("mc200",function($scope,$http){

    $scope.invisibleBond = function(a,b){
        var detailesA = document.getElementById(a);
        var detailesB = document.getElementById(b);
        var details2 = detailesB.style.display;
        var details3 = "none";
        if (details2 == details3){detailesB.style.display = "block"; detailesA.style.display = "none";}
        var details5 = "block";
        if (details2 == details5){detailesB.style.display = "none"; detailesA.style.display = "block";}
    };


    $scope.hitmc200 = function(ps){
        var ps=ps;
    	$scope.posts200 = [];
        $http.get("../m/i200.php?psn=" + ps)
            .success(function(data){
                console.log(data);
                $scope.posts200 = data;

            })
            .error(function(err){

            });
    }    

});






app.controller("mc220",function($scope,$http){

    $scope.invisibleBond3 = function(a,b){
        var detailesA = document.getElementById(a);
        var detailesB = document.getElementById(b);
        var details2 = detailesB.style.display;
        var details3 = "none";
        if (details2 == details3){detailesB.style.display = "block"; detailesA.style.display = "none";}
        var details5 = "block";
        if (details2 == details5){detailesB.style.display = "none"; detailesA.style.display = "block";}
    };


    $scope.hitmc220 = function(ps){
        var ps=ps;
        $scope.posts220 = [];
        $http.get("../m/i220.php?psn=" + ps)
            .success(function(data){
                console.log(data);
                $scope.posts220 = data;

            })
            .error(function(err){

            });
    }


});



app.controller("mc230",function($scope,$http){


    $scope.detallesAB = function(a,b){
        var detailesA = document.getElementById(a);
        var detailesB = document.getElementById(b);
        var details2 = detailesB.style.display;
        var details3 = "none";
        if (details2 == details3){
            detailesB.style.display = "block";
            detailesA.style.display = "none";
        }
        var details5 = "block";
        if (details2 == details5){detailesB.style.display = "none"; detailesA.style.display = "block";}    
    }



    $scope.enviarSolicitud = function(idVacante,idEmpresa,ps){

        var idVacante=idVacante; 
        var idEmpresa=idEmpresa;
        var ps=ps;
        
        $http.post("../c/solicitudNueva.php", {'Vacante':idVacante,'Empresa':idEmpresa,'psn':ps}) .success(function(data,status,headers,config){ console.log("datos insertados correctamente"); }); location.reload();
        location.reload();
    };




    $scope.hitmc230 = function(ps){
    var ps=ps;
    $scope.posts230 = [];
    $http.get("../m/i230.php?psn=" + ps)
        .success(function(data){
            console.log(data);
            $scope.posts230 = data;

        })
        .error(function(err){

        });

    }



});