var app= angular.module('landingPageApp', []);
				 app.controller('landingPageCntrl', function($scope, $http) {
					 $scope.displayFlag = false;
					  $scope.accomodationType =[
					                             { value: '0',
					                            	 label: 'All' },
					                               { value: '1',
						                               label: 'Villa' },
						                           { value: '2',
							                           label: 'Dormatory' },
						                           { value: '3',
							                            label: 'Apartment' },
						                           { value: '4',
							                            label: 'Bunglow' },
						                           { value: '5',
							                            label: 'Row House' },
						                           { value: '6',
							                            label: 'Cottage' },
						                           { value: '7',
							                            label: 'Hut' },
						                           { value : '8',
							                             label : 'House boat' },
					                               { value : '9',
							                             label : 'Tree house' }						                               
					                               ];
					  
					  $scope.guestHeadCount = ["1", "2", "3", "4", "5", "6" ,"7", "8", "9", "10", "11", "12", "13", "14", "15"];
					//  $scope.inputDestination = "Where do you want to go?";
					  $scope.expandFilterOptions = function(){
						  
						 //  $scope.inputDestination = "";
						   $scope.displayFlag = true;
						 //  #scope.selectAccomodationType.hide('0');						   
					  }
					  
					 

				});

app.controller('loginCtrl', function ($scope,$http) {
	$scope.form = {};
	
    $scope.authenticate=function()
    {
    	$http({
	          method  : 'POST',
	          url     : 'Login/authenticate/',
	          data    : $scope.form, //forms user object
	         // datatype:"json"
	          
	         })
	          .success(function(data) {
	        	
	        	  if(data.count==0){
	        		  alert('Please Enter Valid Username & Password.');
	        	  }
	        		  else{
	        			  alert('Login Successful.'); 
	        			  function WriteCookie()
	        	            {
	        	             
	        	               cookievalue= escape($scope.form.username) + ";";
	        	               document.cookie="username=" + cookievalue;
	        	               //document.write ("Setting Cookies : " + "username=" + cookievalue );
	        	            }
	        			  WriteCookie();
	        			  window.location.href='Index1';
	        			  
	        	  }
	          });
    	
      }
    $scope.authenticateAdmin=function()
    {
    	$http({
	          method  : 'POST',
	          url     : 'Login/authenticate/',
	          data    : $scope.form, //forms user object
	         // datatype:"json"
	          
	         })
	          .success(function(data) {
	        	
	        	  if(data.count==0){
	        		  alert('Please Enter Valid Username & Password.');
	        	  }
	        		  else{
	        			  alert('Login Successful.'); 
	        			 // window.location.href='Admin';
	        			  window.location.href='Admin/Admin/setLoginSession';
	        	  }
	          });
    	
   
    }
});

app.controller('galleryImgCtrl', function ($scope,$http) {
	
	
    $scope.galleryImgFetch=function()
    {
    	//alert("called");
    	$http.post("Index1/galleryImgFetch/").then(
				function(response) {
					$scope.imageSrc = response.data;
					//alert($scope.imageSrc);
					
				});
    	
      }

});