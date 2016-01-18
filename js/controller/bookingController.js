	angular.module('propertyBookingApp', [])
			.controller('bookingController1', function($scope, $http) {

					$scope.getAccomodationType = function() {					
						$http.get("AccomodationType/getAccomodationType").then(
								function(response) {
									$scope.names = response.data;
								});
					};
	
				});
			