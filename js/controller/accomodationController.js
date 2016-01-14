var app = angular.module('accomodationApp', []);

app.controller('accomodationController', function($scope, $http) {

	$scope.getAccomodationType = function() {
	
		$http.get("AccomodationType/getAccomodationType").then(
				function(response) {
					$scope.names = response.data;
				});

	};
	
	$scope.getAccomodationType();
});
app.controller('roomAvailabilityController', function($scope, $http) {
	 $scope.form = {};
	    $scope.getRoomAvalabilityCount = function() {
	        // Posting data to php file
	       $http({
	          method  : 'POST',
	          url     : 'PropertyRoomAvailability/getRoomAvailabilityCount/',
	          data    : $scope.form, //forms user object
	         // datatype:"json"
	          
	         })
	          .success(function(data) {
	        	  if(data.count==0){
	        		  alert('you canot add data');
	        	  }
	        		  else{
	        			  alert('from here it will get to payu mney');  
	        			  
	        	  }
	          });
	    	
	        };

});

