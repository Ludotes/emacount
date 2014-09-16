'use strict';

var EmacountApp;
var urlGetTeamsJSON;

EmacountApp.factory('TeamsFactory', ['$http', '$q', function($http, $q){
    var factory = {
        teams : false,
        getTeams : function(){
            var deferred = $q.defer();
            $http({method : 'GET', url:urlGetTeamsJSON})
                .success(function(data){
                    factory.teams = data;
                    deferred.resolve(factory.teams);
                }).error(function(){
                    deferred.reject('Erreur lors du chargement AJAX des teams');
            });
            return deferred.promise;
        }
    };
    return factory;
}]);