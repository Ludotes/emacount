'use strict';
/**
 * Controller de la page d'admin
 */
var EmacountApp;

EmacountApp.controller('AdminCtrl', ['$scope','AdminFactory', function($scope,AdminFactory){
    $scope.managePoints = function(id, action){
        AdminFactory.managePoints(id, action).then(function(msg){
            console.log(msg);
        }, function(msg){
            console.log(msg);
        });
    };
}]);