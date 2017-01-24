angular.module('landingPageApp',['ngAutocomplete'])
				.controller('landingPageCntrl', function($scope, $http) {
					 $scope.displayFlag = false;
					 $scope.inputDestination = "";
					 $scope.checkInDate = "Arrival Date";
					 $scope.checkOutDate = "Departure Date";
					 var inputMin = 3;
					  $scope.accomodationType =[
					                             { value: '0',
					                            	 label: 'Property Types' },
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
					  $scope.guestHeadCount =[
												{ value: '0',
													 label: 'Guests' },
					                             { value: '1',
					                            	 label: '1' },
					                               { value: '2',
						                               label: '2' },
						                           { value: '3',
							                           label: '3' },
						                           { value: '4',
							                            label: '4' },
						                           { value: '5',
							                            label: '5' },
						                           { value: '6',
							                            label: '6' },
						                           { value: '7',
							                            label: '7' },
						                           { value: '8',
							                            label: '8' },
						                           { value : '9',
							                             label : '9' },
					                               { value : '10',
						                             label : '10' },
					                             { value: '11',
							                            label: '11' },
						                           { value: '12',
							                            label: '12' },
						                           { value: '13',
							                            label: '13' },
						                           { value: '14',
							                            label: '14' },
						                           { value : '15',
							                             label : '15+' }
					                               ];
					 // $scope.guestHeadCount = ["1", "2", "3", "4", "5", "6" ,"7", "8", "9", "10", "11", "12", "13", "14", "15+"];
					  
				  $scope.inputDestination = "Where do you want to go?";
					  $scope.expandFilterOptions = function(){
						  
						 //  $scope.inputDestination = "";
						   $scope.displayFlag = true;
						 //  #scope.selectAccomodationType.hide('0');						   
					  }
					  $scope.textChanged = function(){
						  
						  if($scope.inputDestination.length > inputMin){
							
							  $http({
						          method  : 'POST',
						          url     : "Index1/destinationFetch/",
						          data    : {inputDestination : $scope.inputDestination}
						         })
						          .success(function(data) {
						        	  console.log(data);
						        	  
						          });							  
						  }
					  }
					  $scope.result1 = '';
					    $scope.options1 = {
					    		country : 'in'
					    }
					    $scope.details1 = '';
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