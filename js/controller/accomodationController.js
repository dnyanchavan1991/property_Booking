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
					function ReadCookie()
		            {
		               var allcookies = document.cookie;
		               document.write ("All Cookies : " + allcookies );
		               
		               // Get all the cookies pairs in an array
		               cookiearray = allcookies.split(';');
		               
		               /* Now take key value pair out of this array
		             for(var i=0; i<cookiearray.length; i++){
		                 userName = cookiearray[i].split('=')[0];*/
		                  userName = cookiearray[0].split('=')[1];
		                 //alert ( "Value is : " + userName);
		               //}
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

