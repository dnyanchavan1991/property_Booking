	angular.module('indexApp', [])

			.controller('indexController', function($scope, $http) {
			
				$scope.getlastMinDeal = function() {
					
					$http.get("Index1/getlastMinDeal/").then(
							function(specialdeals) {
								$scope.specialdeals = specialdeals.data;
								
							});
			
				};
			});
				
			