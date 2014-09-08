'use strict';

var EmacountApp;

EmacountApp.controller('DisplayCtrl', ['$scope','$interval', '$timeout','TeamsFactory',function($scope,$interval,$timeout,TeamsFactory){
    /* Couleurs */
    var colors = ["#a3df00", "#6000ff", "#0060ff", "#ff0072", "#00ffde","#df4f00", "#00c921","#ff00f0","#df9300",  "#ff0000"];

    /* Récupération des données */
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            $scope.teams = teams;
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();
    $interval(getTeams,1000);

    /* Configuration des graphes */
    $scope.chartConfig = {
             options: {
                 chart: {
                     type: 'spline',
                     backgroundColor: null,
                     height: 380
                 },
                 colors: [
                    '#00aeff', '#f50000'
                ],
             },
            plotOptions: {
                line: {
                    marker: {
                        enabled: false
                    }
                }
            },
             series: [],
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

        // Y-a-t'il une nouvelle serie
        if($scope.chartConfig.series.length !== $scope.teams.length){
            var lenghtArraySeriesInit = $scope.chartConfig.series.length;
            var nbrNlleSerie = $scope.teams.length - $scope.chartConfig.series.length;

            /* Test si nouvelle série */
            for(var i = lenghtArraySeriesInit; i < lenghtArraySeriesInit + nbrNlleSerie; i++){
                // Ajout de la serie
                $scope.chartConfig.series = $scope.chartConfig.series.concat([{
                    name: $scope.teams[i].Team.name,
                    lineWidth: 10,
                    data: [],
                    color: colors[i]
                }]);

                // Ajout des zéros dans le data
                if($scope.chartConfig.series[0] !== 'undefined'){
                    for(var k=0; k < $scope.chartConfig.series[0].data.length; k++){
                        $scope.chartConfig.series[i].data = $scope.chartConfig.series[i].data.concat(0);
                    }
                }
            }
        }

        /* Mise à jour des scores */
        for (var j = 0; j<$scope.teams.length; j++){
            $scope.chartConfig.series[j].data = $scope.chartConfig.series[j].data.concat([parseInt($scope.teams[j].Team.points)]);
        }
        console.log('Done!');
    };

    /**
     * Appel automatique et régulier de la fonction de rafraichissement du graphe
     */
    $interval(refreshGraphe, 10000);
}]);