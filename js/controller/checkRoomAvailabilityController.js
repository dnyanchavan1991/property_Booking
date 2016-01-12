var app = angular.module('checkRoomAvailabilityApp', []);

app.controller('checkRoomAvailabilityController', function($scope, $http) {

	$scope.getRoomAvailability = function() {
		$http.get("RoomAvailability/checkRoomAvailabilty").then(
				function(response) {
					$scope.names = response.data.roomavAilableInfo;
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
});
app.controller('popupController', function($scope) {
	$scope.showModal = false;

	$scope.toggleModal = function() {
		$scope.showModal = !$scope.showModal;
	};
});
app.directive('modal', function () {
    return {
      template: '<div class="modal fade">' + 
          '<div class="modal-dialog">' + 
            '<div class="modal-content">' + 
              '<div class="modal-header">' + 
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' + 
                '<h4 class="modal-title">{{ title }}</h4>' + 
              '</div>' + 
              '<div class="modal-body" ng-transclude></div>' + 
            '</div>' + 
          '</div>' + 
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;

        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });