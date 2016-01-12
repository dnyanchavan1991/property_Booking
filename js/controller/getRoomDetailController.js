var app = angular.module('getRoomDetailApp', []);
app.controller(
				'getRoomDetailController',
				function($scope, $http) {
				
					$scope.getRoomDetail = function() {
					
						$http
								.get(
										"propertyDetails/getRoomDetail")
								.then(
										function(response) {
											$scope.names = response.data;
										});
						
					};
				
				});