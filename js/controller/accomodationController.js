var app = angular.module('accomodationApp', ['ngMessages']);

/*app.controller('accomodationController', function($scope, $http) {
	$scope.getAccomodationType = function() {
		$http.get("AccomodationType/getAccomodationType/"+1).then(
			function(response) {
				$scope.names = response.data;
		});
	};
	$scope.getAccomodationType();
});*/

app.controller('roomAvailabilityController', function($scope, $http) {
	
	//$scope.form={};
	function ReadCookie()
	{
		var allcookies = document.cookie;
		//document.write ("All Cookies : " + allcookies );
		// Get all the cookies pairs in an array
		cookiearray = allcookies.split(';');
		userName = cookiearray[0].split('=')[1];
		//alert ( "Value is : " + userName);
		$scope.formData={'user_name':userName};
		$http({
			  method  : 'POST',
			  url     : 'PropertyRoomAvailability/getLogedInUserDetails/',
			  data    : $scope.formData //forms user object
			 // datatype:"json"
			  
		}).success(function(response) {
			/*$scope.userDetails = response;
			$scope.form.user_name =  $scope.userDetails.username;
			$scope.form.Email =  $scope.userDetails.email;
			$scope.form.Telephone =  $scope.userDetails.mobile;*/
		});
	}
	ReadCookie();
	//$scope.form = {};
	$scope.getRoomAvalabilityCount = function() {
		 $scope.formData = {};
		 alert($scope.checkin);
		 alert($scope.checkout);
		 alert($scope.accomodates);
		 alert($scope.name);
		 alert($scope.email);
		 $scope.formData.checkin = $scope.checkin;
		 $scope.formData.checkout = $scope.checkout;
		 $scope.formData.accomodates = $scope.accomodates;
		 $scope.formData.name = $scope.name;
		 $scope.formData.email = $scope.email;
		 // Posting data to php file
		/*$http({
			method  : 'POST',
			url     : 'PropertyRoomAvailability/getRoomAvailabilityCount/',
			data    : $scope.formData //forms user object
			// datatype:"json"
		}).success(function(data) {
			if(data.count==0){
				alert('you canot add data');
			}
			else{
				alert('from here it will get to payu mney');  
			}
		});*/
	};
});

