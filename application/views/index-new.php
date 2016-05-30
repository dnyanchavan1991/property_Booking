<!DOCTYPE html>
<html>
<head>
	<title>Property Booking</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<link href="css/new-theme/bootstrap.css" rel='stylesheet' type='text/css'/>
	<link href="css/new-theme/style.css" rel="stylesheet" type="text/css" media="all"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/new-theme/jquery.min.js"></script>
	<script src="js/new-theme/bootstrap.js"></script>

	<!-- requried-jsfiles-for owl -->
	<link href="css/new-theme/owl.carousel.css" rel="stylesheet">
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/controller/landingPageController.js"></script>

	<script type="text/javascript" src="js/global/global_url_variable.js"></script>
	<script type="text/javascript" src="js/global/global_functions.js"></script>
	
	<script type="text/javascript">
	$(function() {
		    $("#datepicker").datepicker({
				numberOfMonths: 2,
				
				minDate: new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() + 1);
					$("#datepicker1").datepicker("option", "minDate", dt);
				}
			});
			$("#datepicker1").datepicker({
				numberOfMonths: 2,
				minDate : new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() - 1);
					$("#datepicker").datepicker("option", "maxDate", dt);
				}
			});
			
			
		
	});
	function validateForm(){			
			var ret_flag = true;
				if($("#inpDestination").val() == "")
				{
					if(confirm("Would you like to visit all Destination Properties?")){
						ret_flag = true;
					} else {
						ret_flag = false;
					}					
				} 
				if($("#datepicker").val() == "Arrival Date" || $("#datepicker").val() == "")
				{
					alert("Please provide Tentative Travel Start Date");
					ret_flag = false;
				}
				if($("#datepicker1").val() == "Departure Date" || $("#datepicker1").val() == "")
				{
					alert("Please provide Tentative Travel End Date");
					ret_flag = false;
				}
			
				if (ret_flag === false)
					return false;
				else 
					return true;
			}
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : true,
			navigationText :  false,
			pagination : false,
		});
		
		// Vish - trying to keep search bar fixed if vertical scroll happens
		var offset = $('.online_reservation').offset();
		$(window).on('scroll', function() {
			var st = $(this).scrollTop();
			event.stopPropagation();
			if (offset.top <= st){				
				$('#where_to_go').click();				
				$('.reservation>ul').addClass("container-fluid");
				
			} else {
				$('.reservation>ul').removeClass("container-fluid");
			}
		}); 
					 
	});
</script>
<!-- //requried-jsfiles-for owl -->
</head>
<body ng-app="landingPageApp" >
<!--header starts-->
<div class="header">
	<?php $this->load->view('common/header.php'); ?>
</div>

<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script>
  $(document).ready(function() {

      $('#where_to_go').click(function(){
          $('#aaa').show();
          $('#bbb').show();
          $('#booking_room_div').addClass('booking_room_active');
          $('#b_room_div').addClass('b_room_active');
          $('.book_date').addClass('book_date_active');
          $('.span1_of_1').addClass('span1_of_click').removeClass('span1_of_1 left');
      });

	  var response = '';
	  $.ajax({ type: "GET",
		  url: "http://ipinfo.io/json",
		  async: false,
		  success : function(text)
		  { //alert($.parseJSON(text));
			  response = text;
			  $.ajax({ type: "post",
				  url: "VisitorInfo/insertVisitorData",
				  datatype:'json',
				  data:response,
				  async: false,
				  success : function(text)
				  {
					  $.ajax({
						  type: "post",
						  url: "VisitorInfo/getVisitorCount",
						  async: false,
						  success : function(response)
						  {
							  var parseResp = $.parseJSON(response);
							  $("#visitCount").html(parseResp.count);

						  }
					  });
				  }

			  });
		  }

	  });

  });
	  function allFieldsVisible(){

		  var elm = $('#aaa');

		  if (elm[0].style.display == "inline"){
			  return true;
		  } else {

			  show();
		  }
	  }
</script>
<!---/End-date-piker---->
<link type="text/css" rel="stylesheet" href="css/new-theme/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/new-theme/JFFormStyle-1.css" />
<script type="text/javascript" src="js/new-theme/JFCore.js"></script>
<script type="text/javascript" src="js/new-theme/JFForms.js"></script>
<!-- Set here the key for your domain in order to hide the watermark on the web server -->
<script type="text/javascript">
	(function() {
		JC.init({
			domainKey: ''
		});
		
	})();
</script>
<form method="post" action="RoomAvailability" id="frmCntrl" ng-controller="landingPageCntrl">
<div class="online_reservation" >
		   <div class="b_room" id="b_room_div">
			  <div class="booking_room" id="booking_room_div">
				  <div class="reservation">
					  <ul>
						  <li  class="span1_of_1 left">
							<!--  <h5>Where to go?</h5>-->
							  <div class="book_date" id="where_to_go">
								  <input   id="inpDestination" type="text" autocomplete="off" name="inpDestination" ng-model="inputDestination" value=""   ng-click="expandFilterOptions()" onfocus="this.value = '';" >
							  </div>
						  </li>
						 <li  class="span1_of_1 left">
							 <!--<h5>Arrival</h5>-->
							 <div class="book_date">
								 <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn"  value="" onfocus="this.value = '';" >
							 </div>					
						 </li>
						 <li  class="span1_of_1 left">
							<!-- <h5>Depature</h5>-->
							 <div class="book_date">
								<input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut"  value="" onfocus="this.value = '';" >
						     </div>		
						 </li>
						  <li class="span1_of_1 left" id="aaa" style="display:none;">
							<!--  <h5>Accomodation type</h5>-->
							  <div>
								  <select class="frm-field required" ng-model="selectAccomodationType"  id="propertyType" name="propertyType" ng-init="selectAccomodationType=accomodationType[0]"
										  ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
										  ng-show = "inputDestination != 'Where you want to go?'" ></select>
							  </div>
						  </li>
						  <li class="span1_of_1" style="display:none;" id="bbb">
							<!--  <h5>No. of Guests</h5>	-->
							  <div class="section_room">
								  <select class="frm-field required" ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " ng-options="option as option for option in guestHeadCount"></select>
							  </div>
						  </li>
						 <li class="span1_of_3 left">
								<div class="date_btn">
									<input style="margin-top: 0px !important;" type="submit" name="submit" value="View Prices"  onclick="return validateForm();"/>
								</div>
						 </li>
						 <div class="clearfix"></div>
					 </ul>
				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
	  </div>
</div>
</form>
<!---->
<div class="package text-center" id="gallery" ng-controller="galleryImgCtrl" data-ng-init="galleryImgFetch()">
    <?php $this->load->view('common/featured-property.html'); ?>
</div>
<!---->
<!---->
<div class="rooms text-center">
	 <div class="container">
		 <h3>Our Services</h3>
		 <div>
			 <div class="col-md-4 room-sec">
				 <img src="images/new-theme/property-search.png" alt=""/>
				 <h4>Quick Property Search</h4>
				 <p>Provide your travel destination, tentative travel dates and total travelers...sit back.... and choose from our best deals for you</p>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/new-theme/notification.png" alt=""/>
				 <h4>Notification</h4>
				 <p>On every property enquiry and booking, we keep both Customer and Property owner informed with real time SMS feature. An Email is always accompanied by the SMS.</p>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img style="margin-top:1em" src="images/new-theme/payu-money.png" alt=""/>
				 <h4 style="margin-top:2em">Secured Payment</h4>
				 <p>We are 100% secure when it is related to payment. We have tied up with the best payment gateway, <a href="http://www.payumoney.com">payUMoney.com</a></p>
			 </div>
			 <div class="clearfix"></div>
			 <div class="col-md-4 room-sec">
				 <img src="images/new-theme/map_with_pin-lb.png" alt=""/>
				 <h4>Locate on Google MAP</h4>
				 <p>We provide excellent feature of locating any property on google map, which will give you real feel of the location and distance of the property from the Travel origin place.</p>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/new-theme/review.png" alt=""/>
				 <h4>Reviews</h4>
				 <p>We trust on "Self Experience is the Best Experience".. <br/>Visit properties and provide your reviews to help future travelers book their properties conveniently.</p>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="fotter">
	 <div class="container">
		 <h3>Today's Unique Visitors : <span id="visitCount"></span></h3>
	 </div>
</div>
<!---->
<div class="fotter-info">
	<?php $this->load->view('common/footer.html'); ?>
</div>
<!---->

</body>
</html>