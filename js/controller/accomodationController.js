	angular.module('accomodationApp', [])
				 .controller('accomodationController', function($scope, $http) {
					 
					 		$scope.getAccomodationType = function() {
					 			$http.get("AccomodationType/getAccomodationType").then(
					 					function(response) {
					 						$scope.names = response.data;
					 					});

					 			};
	
			 				$scope.getAccomodationType();
				 		})
				.controller('roomAvailabilityController', function($scope, $http) {
					$scope.form={};
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
					          data    : $scope.formData, //forms user object
					         // datatype:"json"
					          
					         })
					          .success(function(response) {
					        	  $scope.userDetails = response;
					        	  $scope.form.user_name =  $scope.userDetails.username;
					        	  $scope.form.Email =  $scope.userDetails.email;
					        	  $scope.form.Telephone =  $scope.userDetails.mobile;
					        		 
					          });
		            }
				ReadCookie();
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

