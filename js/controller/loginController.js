angular.module('landingPageApp',[])
.controller('loginCtrl', function ($scope,$http) {
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
                       form.error = 'Please Enter Valid Username & Password.';
					  //alert('Please Enter Valid Username & Password.');
	        	  }
	        		  else{
						   //alert('Login successful.');
						  function WriteCookie()
	        	            {
	        	             
	        	               cookievalue= escape($scope.form.username) + ";";
	        	             //  document.cookie="username=" + cookievalue;
	        	              // alert(cookievalue);
	        	               //document.write ("Setting Cookies : " + "username=" + cookievalue );
	        	            }
	        			  WriteCookie();
	        			  window.location.href='Index1';
	        			  
	        	  }
	          });
    	
      }
    $scope.authenticateAdmin=function()
    {
    	 $scope.call_back_url = window.location;
    	 var data = null;
    	 var successMessage = null;
    	if($scope.firstName == null && $scope.lastName == null  && $scope.mobileNumber == null  && $scope.email == null)
    	{
    		//alert("login started");
    		var webUrl='Login/authenticate/';
    		successMessage='Login successful.';
    			 data = {
    					 username: $scope.username,
    					 password: $scope.password, 
    					 access_type: $scope.access_type, 
    					 call_back_url: $scope.call_back_url
    					 };
    	}
    	else{
    		alert("registration started");
    		var webUrl='Registration/insertRegistrationData/';
    		alert(webUrl);
    		 successMessage='Registeration successful.';
    		data = {
    				username: $scope.username, 
    				password: $scope.password, 
    				firstName: $scope.firstName, 
    				lastName: $scope.lastName, 
    				mobileNumber: $scope.mobileNumber, 
    				email: $scope.email, 
    				gender: $scope.gender, 
    				date_of_birth: $scope.date_of_birth, 
    				call_back_url: $scope.call_back_url
    				};
    				
    	}
    	
    	$http({
	          method  : 'POST',
	          url     : webUrl,
	          data    : data  

	         })
	          .success(function(data) {

	        	  if(data.count == 0){
	        		  alert('Please Enter Valid Username & Password.');
                    //   form.error = 'Please Enter Valid Username & Password.';
	        	  } else{
					//    alert(successMessage);
					   if($scope.firstName == null ){
						   window.location.href='Redirecting';
	        		     }
					   else{
						    window.location.href='Index1';
						   // window.location.href=$this->session->userdata('call_back_url');
					   }
	        	  }
	          });


    }
})
