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
	$scope.form = {};
	$scope.getRoomAvalabilityCount = function() {
		 $scope.formData = {};
		
		 $scope.formData.checkin = $scope.checkin;
		 $scope.formData.checkout = $scope.checkout;
		 $scope.formData.accomodates = $scope.accomodates;
		 $scope.formData.name = $scope.name;
		 $scope.formData.email = $scope.email;
		 // Posting data to php file
		$http({
			method  : 'POST',
			url     : 'PropertyRoomAvailability/getAvailablePropertyAccomodatesCount/',
			data    : $scope.formData //forms user object
			// datatype:"json"
		}).success(function(data) {
			if(data.count>=$scope.accomodates){
				$http({
					method  : 'POST',
					url     : 'BookProperty/booking/',
					data    : $scope.formData //forms user object
					// datatype:"json"
				}).success(function(data) {
					if(data.reservationcount='1'){
					alert('Congrats ! Your Reservation is succesful.');
					window.location="Index1";
					}
					else{
						alert('Oops, Something went wrong in the Reservation process. Kindly try again.');  
					}
				})
			}
			else{
				alert('Sorry, Only ' + data.count + " seats are available.");  
			}
		});
	};
});

