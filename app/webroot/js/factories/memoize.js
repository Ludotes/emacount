'use strict';

/* Source : https://github.com/m59peacemaker/angular-pmkr-components/tree/master/src/services/memoize */
var EmacountApp;

EmacountApp.factory('pmkr.memoize', [
  function() {

    function service() {
      return memoizeFactory.apply(this, arguments);
    }

    function memoizeFactory(fn) {

      var cache = {};

      function memoized() {

        var args = [].slice.call(arguments);

        var key = JSON.stringify(args);

        var fromCache = cache[key];
        if (fromCache) {
          return fromCache;
        }

        cache[key] = fn.apply(this, arguments);

        return cache[key];

      }

      return memoized;

    } // end service function

    return service;

  }
]);