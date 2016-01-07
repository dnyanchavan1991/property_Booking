var app = angular.module('checkRoomAvailabilityApp', []);

app.controller(
				'checkRoomAvailabilityController',
				function($scope, $http) {
				
					$scope.getRoomAvailability = function() {
						$http
								.get(
										"RoomAvailability/checkRoomAvailabilty")
								.then(
										function(response) {
											$scope.names = response.data.roomavAilableInfo;
										});
						
					};
					// Show Div
					$scope.showResult = function() {
						$scope.showhideprop = true;
					};
					$scope.getPropertyDetails = function(item) {
						var objForm = document.createElement('FORM');
						objForm.method = 'post';
						objForm.action = 'Controller/PropertyDetail.php';

						var objInput = document.createElement('INPUT');
						objInput.type = 'hidden';
						objInput.name = 'propertyId';
						objInput.value = item.propertyId;
						objForm.appendChild(objInput);

						document.body.appendChild(objForm);
						objForm.submit();

						alert(item.propertyId);
					}
				});