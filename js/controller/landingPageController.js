angular.module('landingPageApp', [])
				.controller('landingPageCntrl', function($scope, $http) {
					 $scope.displayFlag = false;
					 $scope.inputDestination = "";
					 $scope.checkInDate = "Arrival Date";
					 $scope.checkOutDate = "Departure Date";
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
					  
					 

				})

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
					  alert('Please Enter Valid Username & Password.');
	        	  }
	        		  else{
						   alert('Login successful.');
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
    	$scope.form.call_back_url = window.location;
    	if($scope.form.firstName==null && $scope.form.lastName==null  && $scope.form.mobileNumber==null  && $scope.form.email==null)
    	{
    		var webUrl='Login/authenticate/';
    			var successMessage='Login successful.';
    			
    	}
    	else{
    		var webUrl=' Registration/insertRegistrationData/';
    		var successMessage='Registeration successful.';
    	}
    	$http({
	          method  : 'POST',
	          url     : webUrl,
	          data    : $scope.form //forms user object
	         // datatype:"json"
	          
	         })
	          .success(function(data) { 
	        	
	        	  if(data.count == 0){
	        		  alert('Please Enter Valid Username & Password.');
	        	  } else{
					     alert(successMessage);					     
					   if($scope.form.firstName == null || $scope.form.username != ""){
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

.controller('galleryImgCtrl', function ($scope,$http){
	$scope.galleryImgFetch=function()
    {
    	$http.post("Index1/galleryImgFetch/").then(function(response){
			$scope.imageSrc = response.data;
		});
    }
	$scope.getPropertyDetails = function(item)
	{
		var objForm = document.createElement('FORM');
		objForm.method = 'post';
		objForm.action = 'PropertyDetails';

		var objInput = document.createElement('INPUT');
		objInput.type = 'hidden';
		objInput.name = 'propertyId';
		objInput.value = item.property_id;
		objForm.appendChild(objInput);

		document.body.appendChild(objForm);
		objForm.submit();
	}
	$scope.getImagePropertyDetails = function(item) {
		var objForm = document.createElement('FORM');
		objForm.method = 'post';
		objForm.action = 'PropertyDetails';
		var objInput = document.createElement('INPUT');
		objInput.type = 'hidden';
		objInput.name = 'propertyId';
		objInput.value = item.property_id;
		objForm.appendChild(objInput);
		document.body.appendChild(objForm);
		objForm.submit();
	}
	 
})
.directive('wcUnique', ['dataService', function (dataService) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            element.bind('blur', function (e) {
                if (!ngModel || !element.val()) return;
                var keyProperty = scope.$eval(attrs.wcUnique);
                var currentValue = element.val();
                dataService.checkUniqueValue(keyProperty.key, keyProperty.property, currentValue)
                    .then(function (unique) {
                        //Ensure value that being checked hasn't changed
                        //since the Ajax call was made
                    
                        if (currentValue == element.val()) { 
                           ngModel.$setValidity('unique', false);
                           
                        }
                    	//ngModel.$setValidity('unique',true);
                    }, function () {
                    	
                        //Probably want a more robust way to handle an error
                        //For this demo we'll set unique to true though
                        ngModel.$setValidity('unique', true);
                    });
            });
        }
    }
}])
.factory('dataService', ['$http', function ($http) {
    var serviceBase = 'Registration/checkUniqueValue/',
        dataFactory = {};

    dataFactory.checkUniqueValue = function (id, property, value) {
        if (!id) id = 0;
        return $http.get(serviceBase + id + '?property=' + 
          property + '&value=' + escape(value)).then(
            function (results) {
            	
                return results.data.status;
            });
    };

    return dataFactory;

}])
    .directive("owlCarousel", function() {

        return {

            restrict: 'E',

            transclude: false,

            link: function (scope) {

                scope.initCarousel = function(element) {

                    // provide any default options you want

                    var defaultOptions = {

                    };

                    var customOptions = scope.$eval($(element).attr('data-options'));

                    // combine the two options objects

                    for(var key in customOptions) {

                        defaultOptions[key] = customOptions[key];

                    }

                    // init carousel

                    $(element).owlCarousel(defaultOptions);

                };

            }

        };

    })

    .directive('owlCarouselItem', [function() {

        return {

            restrict: 'A',

            transclude: false,

            link: function(scope, element) {

                // wait for the last item in the ng-repeat then call init

                if(scope.$last) {

                    scope.initCarousel(element.parent());

                }

            }

        };

    }]);
	 
