<!DOCTYPE html>
<html>
<head>
<meta name="keywords" content="Holidays in Goa, Goa Holidays, Rantal Properties in Pune, Villas in Konkan",
		"vacation rentals by owner, trueholidays,trueholiday, rent by owner, vacation by owner, vacation rentals, vacation homes for rent, vacation rental by owner, villas for rent, villa rentals, apartment rentals,  holiday rentals, hotels, family vacation, family travel, group travel, cheap rentals by owner, cheap vacation rental homes">
	<title>Property Booking</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<!-- <link href="css/new-theme/bootstrap.css" rel='stylesheet' type='text/css'/>
	<link href="css/new-theme/style.css" rel="stylesheet" type="text/css" media="all"/>--> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- --> <script src="js/new-theme/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>

	<!-- requried-jsfiles-for owl-->
    <script src="js/new-theme/owl.carousel.js"></script>
	<link href="css/new-theme/owl.carousel.css" rel="stylesheet">
	<script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/angular-messages.min.js"></script>
	<script type="text/javascript" src="js/controller/landingPageController.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAw7GwLP6e0viGPXOtxAHtYCOVeRFkEbsw&libraries=places&sensor=false"></script>
	<script type="text/javascript" src="js/global/global_url_variable.js"></script>
	<script type="text/javascript" src="js/global/global_functions.js"></script> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--  <link href="css/materialize1.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/>  --><!-- 
  <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
   -->
<link href="css/materialize1.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/> <!-- 
  <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
   -->
 <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
  <script src="js/js/materialize1.js"></script>
  <script src="js/js/init1.js"></script><!-- 
   <script src="js/js/prism.js"></script> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


        <!--Import jQuery before materialize.js--
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- Compiled and minified JavaScript --
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

        <!--Materializecss Slider-->
        <script>
            $(document).ready(function () {
                $('.slider').slider({full_width: true});
            });
        </script>    
<!-- //requried-jsfiles-for owl -->
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

</head>
<body ng-app="landingPageApp" >
<!--header starts-->
<div class="header" >
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





<!---strat-date-piker--
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- <script src="js/jquery-ui.js"></script> -->
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
<!---/End-date-piker--
<link type="text/css" rel="stylesheet" href="css/new-theme/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/new-theme/JFFormStyle-1.css" />
<script type="text/javascript" src="js/new-theme/JFCore.js"></script>
<script type="text/javascript" src="js/new-theme/JFForms.js"></script>-->
<!-- Set here the key for your domain in order to hide the watermark on the web server -->
<script type="text/javascript">
	(function() {
		JC.init({
			domainKey: ''
		});
		
	})();
</script>
<!-- <form method="post" action="RoomAvailability" id="frmCntrl" ng-controller="landingPageCntrl">
<div class="online_reservation" >
		   <div class="b_room b_room_active" id="b_room_div">
			  <div class="booking_room booking_room_active" id="booking_room_div">
				  <div class="reservation">
					  <ul>
						  <li  class="span1_of_click">
							<!--  <h5>Where to go?</h5>--
							  <div class="book_date book_date_active" id="where_to_go">
								  <input   id="inpDestination" type="text"   name="inpDestination" ng-model="inputDestination" value=""  ng-autocomplete="result1" details="details1" options="options1" onFocus="this.value = '';" ><!--  ng-click="expandFilterOptions()" ng-change="textChanged()"--
							  </div>
							  
    						<div style="color:darkgray">result: {{result}}</div>
						  </li>
						 <li  class="span1_of_click">
							 <!--<h5>Arrival</h5>--
							 <div class="book_date book_date_active">
								 <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn"  value="" onFocus="this.value = '';" >
								 
							 </div>					
						 </li>
						 <li  class="span1_of_click">
							<!-- <h5>Depature</h5>--
							 <div class="book_date book_date_active">
								<input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut"  value="" onFocus="this.value = '';" >
						     </div>		
						 </li>
						  <li class="span1_of_click" id="aaa"  >
							<!--  <h5>Accomodation type</h5>--
							  <div>
								  <select class="frm-field required" ng-model="selectAccomodationType"  id="propertyType" name="propertyType" ng-init="selectAccomodationType=accomodationType[0]"
										  ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
										  ng-show = "inputDestination != 'Where you want to go?'" style="height: 32px"></select>
							  </div>
						  </li>
						  <li class="span1_of_click"   id="bbb">
							<!--  <h5>No. of Guests</h5>	--
							  <div class="section_room">
								  <select class="frm-field required" ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " 
								  ng-options="option as option.label for option in guestHeadCount track by option.value " style="height: 32px"></select>
							  </div>
						  </li>
						 <li class="span1_of_3 left">
								<div class="date_btn">
									<input style="margin-top: 0.5em !important;" type="submit" name="submit" value="Search"  onclick="return validateForm();"/>
								</div>
						 </li>
						 <div class="clearfix"></div>
					 </ul>
				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
	 <!--  </div>
</div>
</form> --> 



<hr>
<div class="container-fluid">
	<div class="row ">
		<form class="col s12" method="post" action="RoomAvailability" id="frmCntrl" ng-controller="landingPageCntrl">
	    	<div class="online_reservation card horizontal" >
			   <div class="b_room b_room_active" id="b_room_div">
				  <div class="booking_room booking_room_active" id="booking_room_div">
					  	<div class="reservation ">
						    <div class=" col s6 " style="border: 0px solid;">
						            <div class="input-field col s12  m12 l4 book_date book_date_active" id="where_to_go">
						              <input type="text" id="inpDestination"  name="inpDestination" ng-model="inputDestination" value=""  ng-autocomplete="result1" details="details1" options="options1" onFocus="this.value = '';" class="validate" required="true">
						              <label for="last_name">Enter Location</label>
						             <!--  <div style="color:darkgray">result: {{result}}</div> -->
						            </div>      
							      	<div class="input-field col s12  m12 l4 book_date book_date_active">
							             	<input type="date" class="datepicker"  id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn"  value="" onFocus="this.value = '';" required="true">
							                 <label for="last_name">Arrival Date</label>
							        </div>
							        <div class="input-field col s12  m12 l4">
							             	<input type="date" class="datepicker" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut"  value="" onFocus="this.value = '';" required="true" >
							                 <label for="last_name">Departure Date</label>
							        </div>
							</div>
							<div class=" col l6" style="border:0px solid;">
						      		<div class="input-field col s12  m12 l4 section_room" id="aaa">
						                <select   ng-model="selectAccomodationType"  id="propertyType" name="propertyType" 
						                		  ng-init="selectAccomodationType=accomodationType[0]"
												  ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
												  ng-show = "inputDestination != 'Where you want to go?'" required="true">
						                </select>
						                <label>Property Type</label>
						            </div> 
						           	<div class="input-field col s12  m12 l4" id="bbb">
						                <select ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " 
											ng-options="option as option.label for option in guestHeadCount track by option.value "  required="true">
						                </select>
						               <label>Select Guests</label> 
						            </div> 
							      	<div class="input-field  col s12  m12 l4 date_btn" style="text-align: center;">
							          <button class="btn waves-effect waves-light modal-login-btn"  type="submit" name="submit" value="Search"  
							          onclick="return validateForm();" >Search
							           <!--  <i class="material-icons right">send</i> -->
							          </button>
							    	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
	    </form>
	</div>
</div>

<!---->
<div class="package text-center" id="gallery" ng-controller="galleryImgCtrl" data-ng-init="galleryImgFetch()">
<form method="post" action="RoomAvailability" id="frmCntrl">
	<input type="hidden" name="inpDestination" id="inpDestination" value=""> 

	<div id='Banner'>
	 <a href="#" onclick="$('#inpDestination').val('Featured');$('#frmCntrl').submit();" >
	 <font size="5" face="vollkorn"> Featured Property </font> </a></div>
</form>
<script type="text/javascript">
/*var i = 1,timer;
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
	}*/ </script>
<?php $this->load->view('common/featured-property.html'); ?>
</div>
</div>
<!---->
<!---->
<!-- <div class="rooms text-center">
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
</div> -->
<hr>
<!-- Our Services Start -->
<div class="container">
	<div class="row">
        <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="images/new-theme/search.jpg" class="img-responsive" height="200">
             <!--  <span class="card-title">Quick Property Search</span> -->
            </div>
            <div class="card-content">
              <p>Provide your travel destination, tentative travel dates and total travelers...sit back.... and choose from our best deals for you</p>
            </div>
            <div class="card-action">
              <a href="#">Quick Property Search</a>
            </div>
          </div>
        </div>

         <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="images/new-theme/notification.jpg">
              <!-- <span class="card-title">Notification</span> -->
            </div>
            <div class="card-content">
              <p>On every property enquiry and booking, we keep both Customer and Property owner informed with real time SMS feature. An Email is always accompanied by the SMS.</p>
            </div>
            <div class="card-action">
              <a href="#">Notification</a>
            </div>
          </div>
        </div>

         <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="images/new-theme/payment.gif">
             <!--  <span class="card-title">Secured Payment</span> -->
            </div>
            <div class="card-content">
              <p>We are 100% secure when it is related to payment. We have tied up with the best payment gateway, payUMoney.com</p>
            </div>
            <div class="card-action">
              <a href="#">Secured Payment</a>
            </div>
          </div>
        </div>

      	 <div class="col s12 m6">
          <div class="card medium">
            <div class="card-image">
               <img src="images/new-theme/location.gif">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
              <p>We provide excellent feature of locating any property on google map, which will give you real feel of the location and distance of the property from the Travel origin place.</p>
            </div>
            <div class="card-action">
              <a href="#">Locate on Google MAP</a>
            </div>
          </div>
        </div>

         <div class="col s12 m6">
          <div class="card medium">
            <div class="card-image">
              <img src="images/new-theme/review.gif">
              <span class="card-title">Reviews</span>
            </div>
            <div class="card-content">
              <p>We trust on "Self Experience is the Best Experience".. Visit properties and provide your reviews to help future travelers book their properties conveniently.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

      </div>
  </div>

<!-- Our Services end -->
<div class="fotter">
	 <div class="container">
		 <h3>Today's Unique Visitors : <span id="visitCount"></span></h3>
	 </div>
</div>
<!---->
<div class="fotter-info">
	<?php $this->load->view('common/footer1.html'); ?>
</div>
<!---->

</body>
</html>