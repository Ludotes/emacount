'use strict';
/**
 * Source : https://github.com/m59peacemaker/angular-pmkr-components/tree/master/src/filters/partition
 */
var EmacountApp;

EmacountApp.filter('pmkr.partition', [
  'pmkr.filterStabilize',
  function(stabilize) {
    var filter = stabilize(function(input, size) {

      if (!input || !size) {
        return input;
      }

      var newArr = [];

      for (var i = 0; i < input.length; i+= size) {
        newArr.push(input.slice(i, i+size));
      }

      return newArr;

    });

    return filter;

  }
]);