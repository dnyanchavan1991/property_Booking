angular.module('checkRoomAvailabilityApp', ['angularUtils.directives.dirPagination'])//
	.controller('checkRoomAvailabilityController',function($scope, $http) {
		 $scope.guestHeadCount = ["Select","1", "2", "3", "4", "5", "6" ,"7", "8", "9", "10", "11", "12", "13", "14", "15"];
			
		$http.get("AccomodationType/getPropertyTypeList/").then(function(response) {
			$scope.propertyTypeNames = response.data;
		});
		/*--*/
		$scope.getRoomAvailability = function() {
		//	alert($scope.sortByFilter);
			if ($scope.sortByFilter == null)
				$scope.sortByFilter = 'propAToZ';
			if ($scope.sortByBedrooms == null)
				$scope.sortByBedrooms = 'All';
			 
	             	var data = { 
	             				sortByFilter : $scope.sortByFilter,
	             				sortByBedrooms : $scope.sortByBedrooms
	             				}
	             	
             
		  	 $http({url: "RoomAvailability/checkRoomAvailabilty",
		  			 method: "post",
		  			 data : { 
		  				 	sortByFilter : $scope.sortByFilter,
		  				 	sortByBedrooms : $scope.sortByBedrooms
		  			 }
		  	 }).then(function(response) {
				$scope.propNames  = response.data.rows;
            	// console.log(response);
			});
	             	$scope.galleryImgFetch=function()
	                {
	                	$http.post("Index1/galleryImgFetch/").then(function(response){
	            			$scope.imageSrc = response.data;
	            		});
	                }
					
		  	 
					
					
		};
		/*--*/
		$scope.propertyName = [{
			name : ""
		} ];
		$scope.selectGuestHeadCount= [{
			name : "1"
		} ];
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
		  $scope.expandFilterOptions = function(){
			  
				 //  $scope.inputDestination = "";
				   $scope.displayFlag = true;
				 //  #scope.selectAccomodationType.hide('0');						   
			  }
		  
		  $scope.reloadSortByFilterData = function(){
			  
			  
		  }
		$scope.starRateList = [{
			name : 5,
			star_image_url : 'images/st2.png'
		}, {
			name : 4,
			star_image_url : 'images/st3.png'
		}, {
			name : 3,
			star_image_url : 'images/st4.png'
		}, {
			name : 2,
			star_image_url : 'images/st5.png'
		}, {
			name : 1,
			star_image_url : 'images/st.png'
		}];
		
		$scope.featureList = [{
			name : 'pool',
			featureLabel : 'Swimming Pool'
		}, {
			name : 'television_access',
			featureLabel : 'Television'
		}, {
			name : 'internet_access',
			featureLabel : 'Free WIFI'
		},{
			name : 'air_condition',
			featureLabel : 'Air Conditioner'
		}];
		
		 
		  
		 $scope.bathroomList = [{
				name : '1',
				Label : '1 Bathroom'
			}, {
				name : '2',
				Label : '2 Bathrooms'
			}, {
				name : '3',
				Label : '3 Bathrooms'
			}, {
				name : '4',
				Label : '4 Bathrooms'
			},{
				name : '5+',
				Label : '5+ Bathrooms'
			}];
		 
		$scope.facilityList = [{
			name : 'free_breakfast',
			facilityLabel : 'Free Breakfast'
		},{
			name : 'free_parking',
			facilityLabel : 'Free Parking'
		} 
		,
		{
			name : 'in_house_kitchen',
			facilityLabel : 'In House Kitchen'
		}, {
			name : 'smoking_allowd',
			facilityLabel : 'Smoking Allowed'
		}, {
			name : 'pet_friendly',
			facilityLabel : 'Pet Friendly'
		}];
		/*--*/
		$scope.model = {
			selectedstarRateList : [],
			selectedFeatureList : [],
			selectedFacilityList : [],
			selectedAccomodationList : [],
			/*propertyNameList : [],
			accomodatesList:[],*/
			selectedPropertyTypeList:[],
			selectedBathroomList:[]
		};
		/*--*/
	/*	$scope.model.propertyNameList.push({name:""});
		$scope.model.accomodatesList.push({name:"Select"});*/
		/*--*/
		$scope.isLabelChecked = function(objName) {
			
			if (objName == 'starRate') {
				if (this.starRateLabel.selected) {
					$scope.model.selectedstarRateList.push(this.starRateLabel);
				} else {
					$scope.model.selectedstarRateList.splice(this.starRateLabel, 1);
				}
			} else if (objName == 'features') {
				if (this.featureListLabel.selected) {
					$scope.model.selectedFeatureList.push(this.featureListLabel);
				} else {
					$scope.model.selectedFeatureList.splice(this.featureListLabel, 1);
				}
			} else if (objName == 'facility') {
				if (this.facilityListLabel.selected) {
					$scope.model.selectedFacilityList.push(this.facilityListLabel);
				} else {
					$scope.model.selectedFacilityList.splice(this.facilityListLabel, 1);
				}
			} else if (objName == 'PropertyType') {
				if (this.propertyTypeListLabel.selected) {
					$scope.model.selectedPropertyTypeList.push(this.propertyTypeListLabel);
				} else {
					$scope.model.selectedPropertyTypeList.splice(this.propertyTypeListLabel, 1);
				}
			} 
			else if(objName=='bathroom'){
				if (this.bathroom.selected) {
					$scope.model.selectedBathroomList.push(this.bathroom);
				} else {
					$scope.model.selectedBathroomList.splice(this.bathroom, 1);
				}	
			}
			else{
			
			}
			
			
		/*	if(this.selectGuestHeadCount=='Select'){
				$scope.model.accomodatesList.splice(0,1);
				$scope.model.accomodatesList.push({name:""});
			}*/

		 	$http({
				method : 'POST',
				url : 'RoomAvailability/checkFilterRoomAvailabilty/',
				data : $scope.model // forms user object
			}).success(function(response) {
				$scope.propNames = response.rows;

			}); 
		};
		/*--*/
		// Show Div
		$scope.getPropertyDetails = function(item) {
			var objForm = document.createElement('FORM');
			objForm.method = 'post';
			objForm.action = 'PropertyDetails';
			var objInput = document.createElement('INPUT');
			objInput.type = 'hidden';
			objInput.name = 'propertyId';
			objInput.value = item.propertyId;
			objForm.appendChild(objInput);
			document.body.appendChild(objForm);
			objForm.submit();
		}
		/*--*/
		$scope.strtoint = function(num)
		{
			var arr = [];
			for(var i=1; i<=num; i++) {
			arr.push(i.toString());
			}
			return arr;
		};
	})
	.controller('featuredPropertyCtrl', function ($scope,$http){
	$scope.featuredPropFetch=function()
    {
    	$http.post("Index1/galleryImgFetch/").then(function(response){
			$scope.imageSrc = response.data;
		});
    }
	 
})
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

		