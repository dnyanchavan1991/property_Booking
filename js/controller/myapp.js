 var moduleA = angular.module("MyModuleA", []);
          moduleA.controller("MyControllerA", function($scope) {
              $scope.name = "Bob A";
          });

 var moduleB = angular.module("MyModuleB", []);
          moduleB.controller("MyControllerB", function($scope) {
              $scope.name = "Steve B";
          });

          angular.element(document).ready(function() {
              var myDiv1 = document.getElementById("myDiv1");
              angular.bootstrap(myDiv1, ["MyModuleA", "MyModuleB"]);

              var myDiv2 = document.getElementById("myDiv2");
              angular.bootstrap(myDiv2, ["MyModuleB"]);
          });