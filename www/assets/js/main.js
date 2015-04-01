/**
 * Created by maks on 27.03.15.
 */
(function(angular) {
    'use strict';

    var app = angular.module('app', []);


    app.controller('mainCtrl', ['$scope', '$http', '$templateCache', '$compile' ,function($scope, $http, $templateCache, $compile) {
        $scope.refill = [];
        $scope.cashing = [];

        $scope.submitForm = function() {
            var data = {
                summ      : $scope.summ,
                ad_type   : $scope.ad_type,
                money_type: $scope.money_type,
                phone     : $scope.phone,
                comment   : $scope.comment
            };

            $http.post('/addExchange', data).
                success(function(response) {
                    // SUCCESS
                    var template,
                        template_name,
                        html, tab_name,
                        container;

                    if (response.ad_type == 'refill') {
                        template_name = 'refillTemplate';
                        $scope.refill = response;
                        container = $('#refill-cont');
                    } else if(response.ad_type == 'cashing') {
                        template_name = 'cashingTemplate';
                        $scope.cashing = response;
                        container = $('#cashing-cont')
                    }

                    tab_name = '#' + response.ad_type;
                    template = $templateCache.get(template_name);

                    html = $compile(template)($scope);

                    container.children().first().after(html);

                    if (container.children().length > 20) {
                        container.children().last().remove();
                    }

                    $('a[href="'+tab_name+'"]').tab('show');

                    // set form to default state
                    $scope.summ    = '';
                    $scope.ad_type = 'refill';
                    $scope.money_type = '';
                    $scope.phone   = '';
                    $scope.comment = '';
                    $scope.exchangeForm.$setPristine(true);
                }).
                error(function(data, status, headers, config) {
                    // ERROR
                    // show error message
                });
        };

        $scope.beFirst = function(type) {
            $scope.ad_type = type;
            $('a[href="#addItem"]').tab('show');
        };
    }]);


})(window.angular);