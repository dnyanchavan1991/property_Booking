	angular.module('checkRoomAvailabilityApp', [])

			.controller('checkRoomAvailabilityController', function($scope, $http) {

				$scope.getRoomAvailability = function() {
					$http.get("RoomAvailability/checkRoomAvailabilty").then(
							function(response) {
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
			.controller('popupController', function($scope,$http) {
				$scope.showModal = false;
	              
				$scope.form = {};
				$scope.togglemailPopUp = function() {
					$('#phone_div').hide();

					$('#email_id_div').show();
					 $scope.form.phone =null;
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

					$http({
			          method  : 'POST',
			          url     : 'Contact/Contact_to_customer/'+ item.propertyId+'/',
			        data    : $scope.form, //forms user object
			         // datatype:"json"
			          
			         })
			          .success(function(data) {
			        	  if(data.count==0){
			        		  alert('you canot add data');
			        	  }
			        		  else{
			        			  alert('from here it will get to payu mney');  
			        			  
			        	  }
			          });
			    
					$scope.showModal = !$scope.showModal; };

			})
			.directive('modal', function () {
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
			  })
			.controller('CheckboxFilterCtrl', function ($scope) {

				    $scope.starRateList = [
					            {name:'5',star_image_url:"images/st2.png"},
					            {name:'4',star_image_url:"images/st3.png"},
					            {name:'3',star_image_url:"images/st4.png"},
					            {name:'2',star_image_url:"images/st5.png"},
					            {name:'1',star_image_url:"images/st.png"},
					          
					        ]
				    $scope.model = {
				    	selectedLabelList : [],
						selectedLabelList1 : [],
				    }
				    $scope.isSelectAll = function(){
				    $scope.model.selectedLabelList = [];
						if($scope.master){
						$scope.master = true;
					    for(var i=0;i<$scope.labelList.length;i++){
										        $scope.model.selectedLabelList.push($scope.labelList);	
				 $scope.model.selectedLabelList1.push($scope.labelList);								
									}
								}
				    else{$scope.master = false;}
				   angular.forEach($scope.labelList, function (item) {
						    item.selected = $scope.master;
				   });
				}
				    
				  $scope.isLabelChecked = function(objName)
							{
								  //alert($scope.[objName]);
							
								if(this.label.selected){
								$scope.model.selectedLabelList.push(this.label);
								$scope.model.selectedLabelList1.push(this.label)
									if($scope.model.selectedLabelList.length == $scope.labelList.length ){
																												$scope.master = true;
															                                               
																										   }
								                        }
								
							else{
							           $scope.model.selectedLabelList.splice(this.label,1);
									   $scope.model.selectedLabelList1.push(this.label)
								}

							  console.log($scope.model.selectedLabelList[0].name);
							}  
				    
				    
				});