 angular.module('myRegApp', [])
          .controller('AppController', [function() {
              var self = this;
              self.submit = function() {
            	  alert('Data submited succesfully');  
                 console.log('Form is submitted with following user', self.user);
            };
            
      }]);