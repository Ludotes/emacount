'use strict';
/**
 * Controller de la page d'admin
 */
var EmacountApp;

EmacountApp.controller('AdminCtrl', ['$scope','AdminFactory','TeamsFactory', function($scope,AdminFactory,TeamsFactory){
    /* Récupération des données des teams */
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            $scope.teams = teams;
            console.log($scope.teams);
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();

    /* Mise en place de la fonction de gestion des points */
    $scope.managePoints = function(id, action, points){
        AdminFactory.managePoints(id, action, points).then(function(data){
            $scope.teams = data;
        }, function(msg){
            console.log(msg);
        });
    };
}]);