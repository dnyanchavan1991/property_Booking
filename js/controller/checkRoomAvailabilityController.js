angular
		.module('checkRoomAvailabilityApp', [])
		.controller(
				'CheckboxFilterCtrl',
				function($scope, $http) {
					$http.get("AccomodationType/getAccomodationType/"+2).then(
			 					function(response) {
			 						$scope.names = response.data;
			 					});

			 			
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
						name : 'meals',
						featureLabel : 'WIFI/Internet Access'
					}, {
						name : 'internet_acess',
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
						selectedFacilityList : []
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
								$scope.model.selectedFeatureList.splice(this.featureListLabel, 1);
										
							}
						} else if (objName == 'facility') {
							if (this.facilityListLabel.selected) {

								$scope.model.selectedFacilityList
										.push(this.facilityListLabel);
							} else {
								$scope.model.selectedFacilityList.splice(
										this.facilityListLabel, 1);
							}
						}

						$http(
								{
									method : 'POST',
									url : 'RoomAvailability/checkFilterRoomAvailabilty/',
									data : $scope.model, // forms user object

								}).success(function(data) {
							if (data.count == 0) {
								alert('Cannot send message');
							} else {
								alert('Message sent successfully..');

							}
						});

					}

				})
		.controller(
				'checkRoomAvailabilityController',
				function($scope, $http) {

					$scope.getRoomAvailability = function() {
						$http.get("RoomAvailability/checkRoomAvailabilty")
								.then(function(response) {
									$scope.propNames = response.data;
								});

					};
					// Show Div
					$scope.showResult = function() {
						$scope.showhideprop = true;
					};
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
				})
		.controller(
				'popupController',
				function($scope, $http) {
					$scope.showModal = false;

					$scope.form = {};
					$scope.togglemailPopUp = function() {
						$('#phone_div').hide();

						$('#email_id_div').show();
						$scope.form.phone = null;
						$scope.showModal = !$scope.showModal;
					};
					$scope.togglemessagePopUp = function() {
						$('#email_id_div').hide();

						$('#phone_div').show();
						$('#email_id').val('');
						$scope.form.email_id = null;
						$scope.showModal = !$scope.showModal;
					};
					$scope.contactToCustomer = function(item) {

						$http(
								{
									method : 'POST',
									url : 'Contact/Contact_to_customer/'
											+ item.propertyId + '/',
									data : $scope.form, // forms user object
								// datatype:"json"

								}).success(function(data) {
							if (data.count == 0) {
								alert('you canot add data');
							} else {
								alert('from here it will get to payu mney');

							}
						});

						$scope.showModal = !$scope.showModal;
					};

				})
		.directive(
				'modal',
				function() {
					return {
						template : '<div class="modal fade">'
								+ '<div class="modal-dialog">'
								+ '<div class="modal-content">'
								+ '<div class="modal-header">'
								+ '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
								+ '<h4 class="modal-title">{{ title }}</h4>'
								+ '</div>'
								+ '<div class="modal-body" ng-transclude></div>'
								+ '</div>' + '</div>' + '</div>',
						restrict : 'E',
						transclude : true,
						replace : true,
						scope : true,
						link : function postLink(scope, element, attrs) {
							scope.title = attrs.title;

							scope.$watch(attrs.visible, function(value) {
								if (value == true)
									$(element).modal('show');
								else
									$(element).modal('hide');
							});

							$(element).on('shown.bs.modal', function() {
								scope.$apply(function() {
									scope.$parent[attrs.visible] = true;
								});
							});

							$(element).on('hidden.bs.modal', function() {
								scope.$apply(function() {
									scope.$parent[attrs.visible] = false;
								});
							});
						}
					};
				})
