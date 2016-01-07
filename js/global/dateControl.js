$('#checkin').datepicker(
         { 
            minDate: 0,
            beforeShow: function() {
            $(this).datepicker('option', 'maxDate', $('#checkout').val());
         
          }
       });

$('#checkout').datepicker(
         {
            defaultDate: "+1w",
            beforeShow: function() {
            $(this).datepicker('option', 'minDate', $('#checkin').val());
if ($('#checkin').val() === '') $(this).datepicker('option', 'minDate', 0);   

         }
       });