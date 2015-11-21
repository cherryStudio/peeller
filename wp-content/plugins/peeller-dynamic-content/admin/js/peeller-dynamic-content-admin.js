(function() {

            var bodyFolded    = $(document.body).hasClass( 'folded' );

            if ( ! bodyFolded ) {
                $(document.body).addClass( 'folded' );
                setUserSetting( 'mfold', 'f' );
            }
    var app = angular.module('app', ['builder', 'builder.components', 'validator.rules', 'ngRoute']);

    app.config(['$locationProvider', function($locationProvider) {
            $locationProvider.html5Mode(true);
        }]);
    app.controller('DemoController', [
        '$scope', '$builder', '$validator', '$http', '$location', '$filter',
        function($scope, $builder, $validator, $http, $location, $filter) {
            $scope.postMeta = [];
            $scope.urlParams = $location.search();
            $scope.postMeta['id']= $scope.urlParams['post'];
            $scope.meta = [];
            function getData() {
                $scope.urlParams = $location.search();
                return $http({method: 'POST', url: ajaxurl + "?action=get_form_builder&post=" + $scope.urlParams['post']});
            }
            function getPostStructure() {
                return $http({method: 'POST', url: ajaxurl + "?action=get_post_structure"});
            }

            getData().then(function(data) {
                $http.get(ajaxurl + "?action=get_post_meta&post=" + $scope.urlParams['post']).
                        success(function(data) {
                    $scope.postMeta = data;
                });
                $scope.meta = data.data;
                $.each($scope.meta, function(index, formObj) {
                    $builder.addFormObject('default', {
                        id: formObj.id,
                        label: formObj.label,
                        options: formObj.options,
                        component: formObj.component,
                        placeholder: formObj.placeholders
                    });

                });
            }). catch (function() {
                //Oops one of more file load call failed
            });
            
            $scope.form = $builder.forms['default'];
            $scope.input = [];
            $scope.defaultValue = {};

      // process the form
            $scope.processForm = function() {
              $scope.postMeta['id']= $scope.urlParams['post'];
              $scope.postMeta['cp_form_builder'] = $filter('json')($scope.form);
                $http({
                    url: ajaxurl + "?action=save_post_meta",
                    method: 'POST',
                    data    : $.param($scope.postMeta),  // pass in data as strings
                    headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 

                }).success(function(data) {
                    console.log("OK", data);

                }).error(function(err) {
                 "ERR", console.log(err);
                });
            };

            return;
        }

    ]);


}).call(this);
