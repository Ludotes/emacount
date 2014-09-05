'use strict';

var EmacountApp;
var urlManagePoints;

EmacountApp.factory('AdminFactory', ['$http', '$q', function($http, $q){
    var factory = {
        managePoints : function(id, action){
            var deferred = $q.defer();
            var url = urlManagePoints+'/'+id+'/'+action;
            console.log(urlManagePoints);
            $http({method: 'GET', url: url})
                .success(function(data){
                    deferred.resolve(data);
                }).error(function(){
                    deferred.reject('Erreur dans le management des points par AJAX');
                });
                return deferred.promise;
        }
    };
    return factory;
}]);