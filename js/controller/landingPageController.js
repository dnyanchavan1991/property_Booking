	angular.module('landingPageApp', [])
				 .controller('landingPageCntrl', function($scope, $http) {
					  $scope.accomodationType = ["All","Villa", "Dormatory", "Apartment", "Bunglow", "Row House", "Cottage", "Hut", "Homestay", "Heritage","House boat", "Tree house"];
					  $scope.guestHeadCount = ["1", "2", "3", "4", "5", "6" ,"7", "8", "9", "10", "11", "12", "13", "14", "15"];				 

				});

