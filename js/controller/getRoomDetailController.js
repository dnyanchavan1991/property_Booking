var app = angular.module('getRoomDetailApp', []);

app.controller('getRoomDetailController',function($scope, $http){

	$scope.getRoomDetail = function() {
		$http.get("propertyDetails/getRoomDetail").then(function(response){
			$scope.names = response.data;
		});
	};
});

app.controller('reviewCtrl',  function ($scope, $http) {
	
	//$scope.formData = {};
	
	$scope.processForm = function(prop_id)
    { 	
		 $scope.formData = {};
		 $scope.formData.customer_name = $scope.customer_name;
		 $scope.formData.customer_email = $scope.customer_email;
		 $scope.formData.property_id = prop_id;
		 $scope.formData.rating_given = $scope.rating_given;
		 $scope.formData.review_given = $scope.review_given;
		 
		 $http({
			method  : 'POST',
			url     : 'Review/sendReview',
			data    : $scope.formData,
		})
		.success(function(data){			
			alert("Review submitted");
			location.reload();
		}); 
    };
});


app.controller(
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
						alert('Cannot send message.');
					} else {
						alert('Message sent succesfuly.');

					}
				});

				$scope.showModal = !$scope.showModal;
			};

		})
app.directive(
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
