
var app = angular.module('talentApp',[]);




app.controller("mailToImTalent",function($scope,$http){

    $scope.mailto = function(persona){
        $scope.persona=persona;
        alert($scope.persona);
        alert($scope.titulo);
        alert($scope.mensaje);
        $http.post("../c/mailtoimtalent.php", {'persona':$scope.persona,'titulo':$scope.titulo,'mensaje':$scope.mensaje}) 
        .success(function(data,status,headers,config){ console.log("datos insertados correctamente"); });
        location.reload();
    };

});