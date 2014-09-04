'use strict';

var EmacountApp;

EmacountApp.controller('TeamsCtrl', ['$scope','$interval', 'TeamsFactory', function($scope, $interval,TeamsFactory){
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            $scope.teams = teams;
            console.log($scope.teams);
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();
    $interval(getTeams,1000);
}]);