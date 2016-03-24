angular.module('checkRoomAvailabilityApp', ['angularUtils.directives.dirPagination'])
	.controller('checkRoomAvailabilityController',function($scope, $http) {
		 $scope.guestHeadCount = ["Select","1", "2", "3", "4", "5", "6" ,"7", "8", "9", "10", "11", "12", "13", "14", "15"];
			
		$http.get("AccomodationType/getPropertyTypeList/").then(function(response) {
			$scope.propertyTypeNames = response.data;
		});
		/*--*/
		$scope.getRoomAvailability = function() {
			$http.get("RoomAvailability/checkRoomAvailabilty").then(function(response) {
				$scope.propNames  = response.data.rows;
			});
		};
		/*--*/
		$scope.propertyName = [{
			name : ""
		} ];
		$scope.selectGuestHeadCount= [{
			name : "Select"
		} ];
		
		
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
			name : 'internet_access',
			featureLabel : 'Television'
		}, {
			name : 'air_condition',
			featureLabel : 'Air Conditioner'
		}];
		
		$scope.facilityList = [{
			name : 'free_parking',
			facilityLabel : 'Free Parking'
		}, {
			name : 'in_house_kitchen',
			facilityLabel : 'In House Kitchen'
		}, {
			name : 'smoking_allowd',
			facilityLabel : 'Smoking Allowd'
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
			propertyNameList : [],
			accomodatesList:[],
			selectedPropertyTypeList:[]
		};
		/*--*/
		$scope.model.propertyNameList.push({name:""});
		$scope.model.accomodatesList.push({name:"Select"});
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
			} else if (objName == 'propertyName') {
				$scope.model.propertyNameList.pop();
				if (this.propertyName[0].name != null) {
					$scope.model.propertyNameList.splice(0,1);
					$scope.model.propertyNameList.push(this.propertyName[0]);
				}
				else{
					$scope.model.propertyNameList.push({name:""});
				}
			}
			else if(objName=='accomodates'){
				$scope.model.accomodatesList.pop();
				
				if(this.selectGuestHeadCount!='Select'){
					$scope.model.accomodatesList.splice(0,1);
				$scope.model.accomodatesList.push({name:this.selectGuestHeadCount[0]});
			       }
			else{
				$scope.model.accomodatesList.push({name:""});	
			   }
					
			}
			else{
			
			}
			
			if(this.selectGuestHeadCount=='Select'){
				$scope.model.accomodatesList.splice(0,1);
				$scope.model.accomodatesList.push({name:""});
			}

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
	});
		