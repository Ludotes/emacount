'use strict';

var EmacountApp;

EmacountApp.controller('DisplayCtrl', ['$scope','$interval', '$timeout','TeamsFactory',function($scope,$interval,$timeout,TeamsFactory){
    /* Récupération des données */
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            $scope.teams = teams;
            console.log($scope.teams);
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();
    $interval(getTeams,2000);

    /* Callback timer : évènement déclanché lorsque le timer est terminé */
    $scope.callbackTimer = function(){
        // Remise à zéro du compte à rebours après XXsec
        $timeout(function(){
            $scope.$broadcast('timer-start');
        },3000);
    }
}]);