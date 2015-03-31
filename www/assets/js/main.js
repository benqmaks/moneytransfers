/**
 * Created by maks on 27.03.15.
 */
(function(angular) {
    'use strict';

    var app = angular.module('app', []);

    app.controller('mainCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.submitForm = function() {
            var data = {
                summ      : $scope.summ,
                ad_type   : $scope.ad_type,
                money_type: $scope.money_type,
                phone     : $scope.phone,
                comment   : $scope.comment
            };

            $http.post('/addExchange', data).
                success(function(data, status, headers, config) {
                    // SUCCESS
                    // return to proper tab
                }).
                error(function(data, status, headers, config) {
                    // ERROR
                    // show error message
                });
        }
    }]);


})(window.angular);