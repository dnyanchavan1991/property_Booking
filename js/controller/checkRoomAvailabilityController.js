angular
		.module('checkRoomAvailabilityApp', [])
		.controller(
				'checkRoomAvailabilityController',
				function($scope, $http) {

					$http.get("AccomodationType/getAccomodationType/" + 2)
							.then(function(response) {
								$scope.names = response.data;
							});

				/*	$scope.getRoomAvailability = function() {
						$http.get("RoomAvailability/checkRoomAvailabilty")
								.then(function(response) {
									$scope.propNames = response.data;
								});

					};*/
					$scope.propertyName = [ {
						name : ""
					} ];
					$scope.starRateList = [ {
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
					},

					];
					$scope.featureList = [ {
						name : 'pool',
						featureLabel : 'Swimming Pool'
					}, {
						name : 'internet_access',
						featureLabel : 'Television'
					}, {
						name : 'air_condition',
						featureLabel : 'Air Conditioner'
					}, ]
					$scope.facilityList = [ {
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
					}, ]

					$scope.model = {
						selectedstarRateList : [],
						selectedFeatureList : [],
						selectedFacilityList : [],
						selectedAccomodationList : [],
						propertyNameList : []

					}

					$scope.isLabelChecked = function(objName) {

						if (objName == 'starRate') {
							if (this.starRateLabel.selected) {

								$scope.model.selectedstarRateList
										.push(this.starRateLabel);
							} else {
								$scope.model.selectedstarRateList.splice(
										this.starRateLabel, 1);
							}
						} else if (objName == 'features') {

							if (this.featureListLabel.selected) {

								$scope.model.selectedFeatureList
										.push(this.featureListLabel);
							} else {
								$scope.model.selectedFeatureList.splice(
										this.featureListLabel, 1);

							}
						} else if (objName == 'facility') {
							if (this.facilityListLabel.selected) {

								$scope.model.selectedFacilityList
										.push(this.facilityListLabel);
							} else {
								$scope.model.selectedFacilityList.splice(
										this.facilityListLabel, 1);
							}
						} else if (objName == 'accomodation') {
							if (this.accomodationListLabel.selected) {

								$scope.model.selectedAccomodationList
										.push(this.accomodationListLabel);
							} else {
								$scope.model.selectedAccomodationList.splice(
										this.accomodationListLabel, 1);
							}
						} else if (objName == 'propertyName') {
							if (this.propertyName[0].name != null) {
								
								$scope.model.propertyNameList
										.push(this.propertyName[0]);
							}
							else{
								$scope.model.propertyNameList
								.push('');
							}
						}
						else{
						
						}

						$http(
								{
									method : 'POST',
									url : 'RoomAvailability/checkFilterRoomAvailabilty/',
									data : $scope.model, // forms user object

								}).success(function(response) {
									
							$scope.propNames = response;
							
						});

					};
				
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
				});
		