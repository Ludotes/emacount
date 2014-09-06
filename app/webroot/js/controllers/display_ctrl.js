'use strict';

var EmacountApp;

EmacountApp.controller('DisplayCtrl', ['$scope','$interval', '$timeout','TeamsFactory',function($scope,$interval,$timeout,TeamsFactory){
    $scope.isKiss = false;
    $scope.isHeaven = false;

    /* Calcul du nombre de secondes jusqu'à la prochaine heure */
    var now = new Date();
    $scope.purgaboire = 60*60 - now.getMinutes()*60 + now.getSeconds();
    $scope.$broadcast('purgaboire');

    /* Récupération des données */
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            $scope.teams = teams;

            /* Changement de l'état en fonction du score */
            if($scope.teams[0].Team.points >= $scope.teams[1].Team.points){
                // Heaven
                $scope.state = 'heaven';
                $scope.isHeaven = true;
            }else{
                // Hell
                $scope.state = 'hell';
                $scope.isHeaven = false;
            }
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();
    $interval(getTeams,2000);

    /* Configuration des graphes */
    $scope.chartConfig = {
             options: {
                 chart: {
                     type: 'spline',
                     backgroundColor: null
                 },
                 colors: [
                    '#4dc4a8', '#f50000'
                ],
             },
            plotOptions: {
                line: {
                    marker: {
                        enabled: false
                    }
                }
            },
             series: [{
                    name: ['Anges'],
                    data: []
                },
                {
                    name: ['Démons'],
                    data: []
                }
             ],
             title: {
                 text: ''
             },
             xAxis: {
              title: {text: ''}
             },
             yAxis: {
                title:{text: ''}
             }
    };

    /**
     * Fonction de rafraichissement du graphe
     * Elle récupère les points du sc
     *
     * 3ope puis les ajoute dans le tableau series[x].data de chaque équipe.
     * Elle vérifie ensuite la taille du tableau afin de ne pas avoir trop de valeurs affichées sur le graphe
     */
    var refreshGraphe = function(){
        console.log('Refreshing...');
        // Récupération des points du scope et ajout dans le tableau
        var arraySeries = $scope.chartConfig.series;
        for (var i = 0; i<$scope.teams.length; i++){
            arraySeries[i].data = arraySeries[i].data.concat([parseInt($scope.teams[i].Team.points)]);
        }
        console.log('Done!');
    };

    /**
     * Appel automatique et régulier de la fonction de rafraichissement du graphe
     */
    $interval(refreshGraphe, 10000);

    /* Callback timer : évènement déclanché lorsque le timer est terminé */
    $scope.callbackTimer = function(){
        // Ouverture du PURGABOIRE !
        $scope.isKiss = true;
        // Remise à zéro du compte à rebours après XXsec
        $timeout(function(){
            $scope.isKiss = false;
            $scope.$broadcast('timer-start');
        },3000);
    };
}]);