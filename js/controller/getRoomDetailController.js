var app = angular.module('getRoomDetailApp', []);

app.controller('getRoomDetailController',function($scope, $http){
	$scope.getRoomDetail = function() {
		$http.get("propertyDetails/getRoomDetail").then(function(response){
			$scope.names = response.data;
		});
	};
});

app.controller('reviewCtrl', function ($scope,$http) {
	
	$scope.formData = {};
	
	$scope.processForm=function()
    {
		alert("reviewCtrl");
		//$scope.formData = {};
		//alert("review data got");
		//console.log($scope.inputVal);
		//alert(formData);
		console.log(formData);
		console.log(formData.customer_name);
		//alert(formData.customer_email);
		//alert($scope.formData.customer_email);
		/*$http({
			method  : 'POST',
			url     : 'Review/sendReview/',
			data    : $scope.formData,
		})
		.success(function(data){
			alert("Review submitted");
			location.reload();
		});*/
    };
});


