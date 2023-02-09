/** angular, BASE_URL*/
var hospitalController = function(){
    
    
    initController = function(){
        angular
                .module('hospitalApp',[])
                .controller('hospitalController', ["$scope","$http",function($scope,$http){
                    $scope.infoPatients = {
                        data: [], 
                        show: false 
                    };
                    $scope.consultPatient = function(){
                        console.log('here');
                    }
                    $scope.getPatients = function(){
                        $.ajax({
                            url: BASE_URL+'patients',
                            dataType: "json",
                            type: 'POST',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                $scope.$apply(function () {
                                    $scope.infoPatients.data = response; 
                                    $scope.infoPatients.show = true;                                
                                });
                            },
                            error: function(){
                            },
                            complete : function(){
                            }
                        });
                    };
                    $scope.getPatients();
                }]);
    };
    return{
        init:initController
    };
}();

