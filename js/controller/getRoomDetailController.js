var app = angular.module('getRoomDetailApp', ['angularUtils.directives.dirPagination','ngMessages']);

app.controller('getRoomDetailController',function($scope, $http){
	
	$scope.getRoomDetail = function() {
		$http.get("propertyDetails/getRoomDetail").then(function(response){
			$scope.names = response.data;
			
		});
	};
});
/*--paginate review*/
app.controller('paginateReview',function($scope,$http){
	$scope.getReviews = function()
    {
		$http.get("json/ReviewsPerProperty.json").success(function(data){ 
			$scope.reviews = data;
			//alert();
			//alert($scope.reviews);
		});
	};
	$scope.strtoint = function(num)
    {
		var arr = [];
		for(var i=1; i<=num; i++) {
		   arr.push(i.toString());
		}
		return arr;
	};
});
/*--//paginate review*/
/*--submit review*/
app.controller('reviewCtrl',  function ($scope, $http) {
	$scope.processForm = function()
    { 	
		 $scope.formData = {};
		 $scope.formData.customer_name = $scope.customer_name;
		 $scope.formData.customer_email = $scope.customer_email;
		 $scope.formData.property_id = $scope.prop_id;
		 $scope.formData.rating_given = $scope.rating_given;
		 $scope.formData.review_given = $scope.review_given;
		 $scope.formData.review_checkin = $scope.review_checkin;
		 $scope.formData.review_checkout = $scope.review_checkout;
		 
		 $http({
			method  : 'POST',
			url     : 'Review/sendReview',
			data    : $scope.formData,
		})
		.success(function(data){			
			alert("Review submitted");
			location.reload();
			//location.href = "#tab7";
			//$(this).html("<a href='#tab7'></a>");
		});
    };
});
/*--//submit review*/

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
			$scope.Contact_to_customer_enquiry = function(propertyId) {

				$http(
						{
							method : 'POST',
							url : 'Contact/Contact_to_customer_enquiry/'
									+ propertyId + '/',
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
