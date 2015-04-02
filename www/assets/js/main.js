/**
 * Created by maks on 27.03.15.
 */
(function(angular) {
    'use strict';

    var app = angular.module('app', []);


    app.controller('mainCtrl', ['$scope', '$rootScope', '$http', '$templateCache', '$compile' ,function($scope, $rootScope, $http, $templateCache, $compile) {
        $scope.refill = [];
        $scope.cashing = [];

        $scope.cashingCount = 0;
        $scope.refillCount  = 0;

        $scope.refillAdded  = false;
        $scope.cashingAdded = false;

        $rootScope.dev = true;

        $scope.onlyNumbers = /^[0-9]{1,7}$/;


        if ($rootScope.dev == false) {
            $scope.summ      = 1000;
            $scope.ad_type   = 'refill';
            $scope.commission = 10;
            $scope.city      = 'Луганск';
            $scope.money_type= 'приватбанк гривны';
            $scope.phone     = '+380990357532';
            $scope.comment   = new Date();
        }

        $scope.submitForm = function() {
            var data = {
                summ      : $scope.summ,
                ad_type   : $scope.ad_type,
                city      : $scope.city,
                commission: $scope.commission,
                money_type: $scope.money_type,
                phone     : $scope.phone,
                comment   : $scope.comment
            };

            $http.post('/addExchange', data).
                success(function(response) {
                    // SUCCESS
                    var tab_name;

                    if (response.ad_type == 'refill') {
                        $scope.refill.push(response);
                        $scope.prepareRefillHTML();
                        $scope.refillCount++;
                        $scope.refillAdded = true;
                    } else if(response.ad_type == 'cashing') {
                        $scope.cashing.push(response);
                        $scope.prepareCashingHTML();
                        $scope.cashingCount++;
                        $scope.cashingAdded = true;
                    }
                    if (!$scope.dev) {
                        $scope.resetForm();
                    }
                    tab_name = '#' + response.ad_type;
                    $('a[href="'+tab_name+'"]').tab('show');
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

        $scope.prepareRefillHTML = function() {
            var template_name,
                template,
                html,
                container;

            template_name = 'refillTemplate';
            container = $('#refill-cont');

            template = $templateCache.get(template_name);
            html = $compile(template)($scope);

            var heading = container.children().first();

            if (!$scope.refillAdded) {
               heading.first().after(html);
            }

            if (container.children().length > 20) {
                container.children().last().remove();
            }

            setTimeout(function() {
                var added_row = $('.ng-refill-added').first();
                added_row.addClass('recently-added');
                added_row.animate({
                    'background-color': 'transparent'
                }, 3000, function() {
                    $(this).removeClass('recently-added');
                });
            }, 500);
        };

        $scope.prepareCashingHTML = function() {
            var template_name,
                template,
                html,
                container;

            template_name = 'cashingTemplate';
            container = $('#cashing-cont');

            template = $templateCache.get(template_name);
            html = $compile(template)($scope);

            var heading = container.children().first();

            if (!$scope.cashingAdded) {
                heading.after(html);
            }

            if (container.children().length > 20) {
                container.children().last().remove();
            }

            setTimeout(function() {
                var added_row = $('.ng-cashing-added').first();
                added_row.addClass('recently-added');
                added_row.animate({
                    'background-color': 'transparent'
                }, 3000, function() {
                    $(this).removeClass('recently-added');
                });
            }, 500);
        };

        $scope.resetForm = function() {
            // set form to default state
            $scope.summ    = '';
            $scope.ad_type = 'refill';
            $scope.city = '';
            $scope.commission = '';
            $scope.money_type = '';
            $scope.phone   = '';
            $scope.comment = '';
            $scope.exchangeForm.$setPristine(true);
        };

        $scope.deleteRow = function() {
            //TODO: add delete button
        }
    }]);


    app.directive('showPhone', function() {
        return {
            restrict: 'A',
            link: function(scope, element) {

                function showPhone() {
                    var text = element.data('phone');
                    element.text(text);

                    element.removeClass('phone-hidden');
                    element.addClass('phone-shown');
                }

                element.on('click', showPhone);
            }
        }
    });


})(window.angular);