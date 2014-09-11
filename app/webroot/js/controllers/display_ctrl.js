'use strict';

var EmacountApp;

EmacountApp.controller('DisplayCtrl', ['$scope','$interval', '$timeout','TeamsFactory',function($scope,$interval,$timeout,TeamsFactory){
    /* Couleurs */
    var colors = ['#07005e', '#d90000', '#42d900', '#d99400', '#b8397b','#df4f00', '#00c921','#ff00f0','#df9300',  '#ff0000'];

    /* Récupération des données */
    var getTeams = function(){
        TeamsFactory.getTeams().then(function(teams){
            /* Récupération des données */
            $scope.teams = teams;

            /* Mise en place de la disposition des lignes et colonnes des teams */
            $scope.colDisposition = [];

            var modulo = $scope.teams.length % 4;
            var multiple = parseInt($scope.teams.length / 4);
            var indexSurplus = 4 * multiple + 1;
            for(var i = 0; i < $scope.teams.length - modulo; i++){
                $scope.colDisposition.push('col-xs-3');
                $scope.teams[i].Team.position = i;
            }
            switch(modulo){
                case 0:
                    break;
                case 1:
                    $scope.colDisposition.push('col-xs-4 col-xs-offset-4');
                    $scope.teams[indexSurplus - 1].Team.position = indexSurplus - 1;
                    break;
                case 2:
                    for(var j = indexSurplus; j <= $scope.teams.length; j++){
                        $scope.colDisposition.push('col-xs-6');
                        $scope.teams[j - 1].Team.position = j - 1;
                    }
                    break;
                case 3:
                    for(var k = indexSurplus; k<= $scope.teams.length; k++){
                        $scope.colDisposition.push('col-xs-4');
                        $scope.teams[k - 1].Team.position = k - 1;
                    }
                    break;
            }

            /* Couleurs */
            for(var n = 0; n < $scope.teams.length; n++){
                $scope.teams[n].Team.teamColor = colors[n];
            }
        }, function(msg){
            console.log(msg);
        });
    };
    getTeams();
    $interval(getTeams,500);

    /* Configuration des graphes */
    $scope.chartConfig = {
             options: {
                 chart: {
                     type: 'column',
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
                title:{text: ''},
                min: 0
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

            /* Nouvelles séries */
            for(var i = lenghtArraySeriesInit; i < lenghtArraySeriesInit + nbrNlleSerie; i++){
                // Ajout de la serie
                $scope.chartConfig.series = $scope.chartConfig.series.concat([{
                    name: $scope.teams[i].Team.name,
                    lineWidth: 10,
                    data: [0],
                    color: $scope.teams[i].Team.teamColor
                }]);

            }
        }

        /* Mise à jour des scores */
        for (var j = 0; j<$scope.teams.length; j++){
            $scope.chartConfig.series[j].data = [parseInt($scope.teams[j].Team.points)];
        }
        console.log('Done!');
    };

    /**
     * Appel automatique et régulier de la fonction de rafraichissement du graphe
     */
    $interval(refreshGraphe, 300);
}]);