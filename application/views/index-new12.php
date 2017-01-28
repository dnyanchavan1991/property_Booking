<!DOCTYPE html>
<html>
<head>
<meta�name="keywords"�content="Holidays in Goa, Goa Holidays, Rantal Properties in Pune, Villas in Konkan",
		"vacation rentals by owner, trueholidays,trueholiday, rent by owner, vacation by owner, vacation rentals, vacation homes for rent, vacation rental by owner, villas for rent, villa rentals, apartment rentals,  holiday rentals, hotels, family vacation, family travel, group travel, cheap rentals by owner, cheap vacation rental homes">
	<title>Property Booking</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	 <!-- <link href="css/new-theme/bootstrap.css" rel='stylesheet' type='text/css'/> -->
	<!-- <link href="css/new-theme/style.css" rel="stylesheet" type="text/css" media="all"/> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <script src="js/new-theme/jquery.min.js"></script> -->
	 <script src="js/bootstrap.js"></script> 

	<!-- requried-jsfiles-for owl -->
    <script src="js/new-theme/owl.carousel.js"></script>
	<link href="css/new-theme/owl.carousel.css" rel="stylesheet">
	<script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/angular-messages.min.js"></script>
	<script type="text/javascript" src="js/controller/landingPageController.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAw7GwLP6e0viGPXOtxAHtYCOVeRFkEbsw&libraries=places&sensor=false"></script>
	<script type="text/javascript" src="js/global/global_url_variable.js"></script>
	<script type="text/javascript" src="js/global/global_functions.js"></script>
	<link href="css/material/materialize1.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
  <link href="css/material/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--  <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection"/>  --> 
  
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/js/materialize1.js"></script>
  <script src="js/js/init1.js"></script> 
	<script type="text/javascript">

	$(function() {
		    $("#datepicker").datepicker({
				numberOfMonths: 1,				
				minDate: new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() + 1);
					$("#datepicker1").datepicker("option", "minDate", dt);
				}
			});
			$("#datepicker1").datepicker({
				numberOfMonths: 1,
				minDate : new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() - 1);
					$("#datepicker").datepicker("option", "maxDate", dt);
				}
			});
			
			
		
	});
	function validateForm(){
	var alertFlag = false;			
	var ret_flag = true;
			
			if ($("#inpDestination").val() == "Where do you want to go?"){
				alert("Please provide Travel Destination");
				ret_flag = false;
				alertFlag = true;
			}
				/*if($("#inpDestination").val() == "")
				{
					if(confirm("Would you like to visit all Destination Properties?")){
						ret_flag = true;
					} else {
						ret_flag = false;
					}					
				} */
				if(($("#datepicker").val() == "Arrival Date" || $("#datepicker").val() == "" ) && !alertFlag)
				{
					alert("Please provide Tentative Travel Start Date");
					ret_flag = false;
					alertFlag = true;
				}
				if(($("#datepicker1").val() == "Departure Date" || $("#datepicker1").val() == "") && !alertFlag)
				{
					alert("Please provide Tentative Travel End Date");
					ret_flag = false;
					alertFlag = true;
				}
			
				if (ret_flag === false)
					return false;
				else 
					return true;
			}
	$(document).ready(function() {
		/*$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : true,
			navigationText :  false,
			pagination : false,
		});*/
		
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
	<?php $this->load->view('common/header1.php'); ?>
</div>





 <div class="slider">
    <ul class="slides">
      <li>
        <img src="https://images.unsplash.com/photo-1464817739973-0128fe77aaa1?dpr=1&auto=compress,format&fit=crop&w=1199&h=799&q=80&cs=tinysrgb&crop="> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="images/new-theme/1.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="images/new-theme/2.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="images/new-theme/3.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>



<!---strat-date-piker---->
<!-- <link rel="stylesheet" href="css/jquery-ui.css" /> -->
<script src="js/jquery-ui.js"></script>
<script src="js/ngAutocomplete.js"></script>
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
<!-- <link type="text/css" rel="stylesheet" href="css/new-theme/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/new-theme/JFFormStyle-1.css" /> -->
<!-- <script type="text/javascript" src="js/new-theme/JFCore.js"></script>
<script type="text/javascript" src="js/new-theme/JFForms.js"></script> -->
<!-- Set here the key for your domain in order to hide the watermark on the web server -->
<script type="text/javascript">
	(function() {
		JC.init({
			domainKey: ''
		});
		
	})();
</script><br><br>
<form method="post" action="RoomAvailability" id="frmCntrl" ng-controller="landingPageCntrl">
<div class="online_reservation container " >
		   <div class="b_room b_room_active " id="b_room_div">
			  <div class="booking_room booking_room_active" id="booking_room_div">
				  <div class="reservation form-group">
				  		<div style="color:darkgray">result: {{result}}</div>
					
					   <div   class="span1_of_click input-field col s6 ">
							<!--  <h5>Where to go?</h5>-->
							  <div class="book_date book_date_active  " id="where_to_go">
								  <input   id="inpDestination" type="text"   name="inpDestination" ng-model="inputDestination" value=""  ng-autocomplete="result1" details="details1" options="options1" onFocus="this.value = '';" ><!--  ng-click="expandFilterOptions()" ng-change="textChanged()"-->
							  </div>
							  
    					 </div>

						 <div  class="span1_of_click">
							 <!--<h5>Arrival</h5>-->
							 <div class="book_date form-group book_date_active col-sm-12 col-md-12 col-lg-2 ">
								 <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn"  value="" onFocus="this.value = '';" >
								 
							 </div>					
						 </div>
						 <div  class="span1_of_click">
							<!-- <h5>Depature</h5>-->
							 <div class="book_date book_date_active col-sm-12 	col-md-12 col-lg-2 form-group ">
								<input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut"  value="" onFocus="this.value = '';" >
						     </div>		
						 </div>
						  <div class="span1_of_click" id="aaa"  >
							<!--  <h5>Accomodation type</h5>-->
							  <div class=" col-sm-12 	col-md-12 col-lg-2 form-group">
								  <select class="frm-field required" ng-model="selectAccomodationType"  id="propertyType" name="propertyType" ng-init="selectAccomodationType=accomodationType[0]"
										  ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
										  ng-show = "inputDestination != 'Where you want to go?'" style="height: 32px"></select>
							  </div>
						  </div>
						  <div class="span1_of_click"   id="bbb">
							<!--  <h5>No. of Guests</h5>	-->
							  <div class="section_room col-sm-12 	col-md-12 col-lg-2">
								  <select class="frm-field required" ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " 
								  ng-options="option as option.label for option in guestHeadCount track by option.value " style="height: 32px"></select>
							  </div>
						  </div>
						 <div class="span1_of_3 left">
								<div class="date_btn form-group  col-sm-2 ">
									<button style="" class="btn  btn-sm waves-effect waves-light" type="submit" name="submit" value="Search"  onclick="return validateForm();" >Submit</button>
								</div>
								
						 </div>
						 <div class="clearfix"></div>
					  
				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
	  </div>
</div>
</form>
<!----><br><br>
<div class="package text-center" id="gallery" ng-controller="galleryImgCtrl" data-ng-init="galleryImgFetch()">
<form method="post" action="RoomAvailability" id="frmCntrl">
<input type="hidden" name="inpDestination" id="inpDestination" value=""> 

<div id='Banner'  style="background-color: #ffff00;display: inline;padding: 5px;margin:20px"> <a href="#" onclick="$('#inpDestination').val('Featured');$('#frmCntrl').submit();" ><font size="5" face="vollkorn"> Featured Property </font> </a></div>
</form>
<script type="text/javascript">
var i = 1,timer;
window.onload=function() {
timer = setInterval('blink()', 500);

}
function blink() {
	 if (i == 1) {
		
	    	document.getElementById('Banner').style.backgroundColor = '#ff0000';

	 } else {
	
	      document.getElementById('Banner').style.backgroundColor = '#ffff00';
	  }
	 if(i == 1) i = 0; else i = 1;
	}</script>
<?php $this->load->view('common/featured-property.html'); ?>
</div>
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