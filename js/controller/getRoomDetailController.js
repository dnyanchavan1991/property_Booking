var app = angular.module('getRoomDetailApp', []);

app.controller('getRoomDetailController',function($scope, $http){
	$scope.getRoomDetail = function() {
		$http.get("propertyDetails/getRoomDetail").then(function(response){
			$scope.names = response.data;
		});
	};
});

/*app.controller('reviewCtrl', function ($scope,$http) {
	
	alert($scope.formData);
	$scope.processForm=function()
    {
		$scope.formData = {};
    	$http({
			method  : 'POST',
			url     : 'Review/sendReview/',
			data    : $scope.formData,
		})
		.success(function(data){
			alert("Review submitted");
		});
    }
});*/


