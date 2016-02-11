var app= angular.module('menusApp', []);
app.controller('menusCtrl', function ($scope,$http) {
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
						  alert('Login Successful!!!');
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
						  alert('Login Successful!!!');
	        			window.location.href='Admin/Admin/setLoginSession';
	        	  }
	          });
    	
   
    }
});

   