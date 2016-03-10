<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive
	Website Template | Booking :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript">
	addEventListener("load", function() { 
		setTimeout(hideURLbar, 0); 
	}, false);
	function hideURLbar(){
		window.scrollTo(0,1);
	} 
</script>
<!-- //for-mobile-apps -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'	rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/chocolat.css" rel="stylesheet">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/vendor/modernizr-2.6.2.min.js"></script>
<script src="js/vendor/jquery-1.10.2.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/angular-messages.min.js"></script>
<script type="text/javascript" src="js/controller/accomodationController.js"></script>
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/popup_style.css" />

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop : $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
<body ng-app="accomodationApp">
	<!-- banner -->
	<div class="banner page-head">
		<div class="container">
			<div class="header-nav">
				
			</div>
			<div class="navigation">
				<span class="menu"><img src="images/menu.png" alt="" /></span>
				<nav class="cl-effect-11" id="cl-effect-11">
					<ul class="nav1">
						<li><a class="active" href="Index1" data-hover="HOME">HOME</a></li>
						<li><a href="About" data-hover="ABOUT">ABOUT</a></li>
						<li><a href="Typography" data-hover="SERVICES">SERVICES</a></li>
						<li><a href="Booking" data-hover="BOOKING">BOOKING</a></li>
						<li><a href="Contact" data-hover="CONTACT">CONTACT</a></li>
						<li><a href="Registration" data-hover="REGISTRATION">REGISTRATION</a></li>					  	
						<li><button id='modal-launcher' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">LOGIN</button></li>
					</ul>
				</nav>
				<!-- script for menu -->
				<script>
					$("span.menu").click(function() {
						$("ul.nav1").slideToggle(300, function() {
							// Animation complete.
						});
					});
				</script>
				<!-- //script for menu -->
			</div>
			<div class="social-icons">
				<ul>
					<li><a href="#" class="f1"></a></li>
					<li><a href="#" class="f2"></a></li>
					<li><a href="#" class="f3"></a></li>
					<li><a href="#" class="f4"></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<!-- //banner -->
	<!--about-->
	<div class="booking" style="background-color: #FFFFFF;">
		<div class="container">
			<h2 class="tittle-one">BOOKING</h2>
			<div class="reservation-form">
				<div class="col-md-3 reservation-left">
					<h3>Hotels</h3>
					<ul>
						<li><a href="booking.html"><img src="images/333.jpg" alt="" /></a></li>
						<li><a href="booking.html"><img src="images/555.jpg" alt="" /></a></li>
						<li><a href="booking.html"><img src="images/666.jpg" alt="" /></a></li>
						<li><a href="booking.html"><img src="images/777.jpg" alt="" /></a></li>
					</ul>
				</div>
				<div class="col-md-9 reservation-right">
					<form name="form" novalidate ng-controller="roomAvailabilityController" ng-submit="form.$valid && getRoomAvalabilityCount()" class="angular-msgs">
						<h4>When would you like to come?</h4>
						<div class="book-pag">
							<div class="book-pag-frm">
								<label>Check In :</label> 
								<input type="text" class="date" jqdatepicker ng-model="checkin" name="checkin" Placeholder="Check-In date" ng-required="true"  />
								{{form.checkin.$valid}} - {{form.checkin.$error}}
								<div id="ng-error" ng-messages="form.checkin.$error" ng-if="form.checkin.$dirty">
									<div ng-message="required" style="" >This field is required</div>
								</div>
							</div>
							<div class="book-pag-frm">
								<label>Check Out:</label>
								<input type="text" class="date" jqdatepicker ng-model="checkout" name="checkout" Placeholder="Check-Out date" ng-required="true" />
								{{form.checkout.$valid}} - {{form.checkout.$error}}
								<div id="ng-error" ng-messages="form.checkout.$error" ng-if="form.checkout.$dirty">
									<div ng-message="required" style="" >This field is required</div>
								</div>
							</div>
							<div class="book-pag-frm">
								<label>Guests:</label>
								<input type="number" ng-model="accomodates" name="accomodates" min="1" max="15" ng-required="true">
								{{form.accomodates.$valid}} - {{form.accomodates.$error}}
								<div id="ng-error" ng-messages="form.accomodates.$error" ng-if="form.accomodates.$dirty">
									<div ng-message="required" style="" >This field is required</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<h4>Contact details</h4>
						<input type="text" ng-model="name" name="name" Placeholder="Name" ng-required="true" />
						{{form.name.$valid}} - {{form.name.$error}}
						<div id="ng-error" ng-messages="form.name.$error" ng-if="form.name.$dirty">
							<div ng-message="required" style="" >This field is required</div>
						</div>
						<input type="email" ng-model="email" name="email" Placeholder="Email" ng-required="true" /> 
						{{form.email.$valid}} - {{form.email.$error}}
						<div id="ng-error" ng-messages="form.email.$error" ng-if="form.email.$dirty">
							<div ng-message="required" style="" >This field is required</div>
						</div>
						<button type="submit" >RESERVE NOW</button>
					</form>
					<!--strat-date-piker-->
					<script>
						/*$(function() {
							//$("#datepicker,#checkin,#checkout").datepicker();
							$("#checkin_date").datepicker({
								dateFormat: "dd/mm/yy",
								minDate:  0,
								onClose: function(date){            
									var date1 = $('#checkin_date').datepicker('getDate');           
									var date = new Date( Date.parse( date1 ) ); 
									date.setDate( date.getDate() + 1 );        
									var newDate = date.toDateString(); 
									newDate = new Date( Date.parse( newDate ) );   
									$('#checkout_date').datepicker("option","minDate",newDate);            
								}
							});
							$('#checkout_date').datepicker({
								dateFormat: "dd/mm/yy" 
							});
						});*/
					</script>
					<!--//End-date-piker-->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//about-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 ftr_navi ftr">
				<h3>NAVIGATION</h3>
				<ul>
					<li><a href="Index1">Home</a></li>
					<li><a href="About">About</a></li>
					<li><a href="Typography">Services</a></li>						
					<li><a href="Booking">Booking</a></li>
					<li><a href="Contact">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
				<h3>FACILITIES</h3>
				<ul>
					<li><a href="#">Double bedrooms</a></li>
					<li><a href="#">Single bedrooms</a></li>
					<li><a href="#">Royal facilities</a></li>
					<li><a href="#">Connected rooms</a></li>
				</ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
				<h3>GET IN TOUCH</h3>
				<ul>
					<li>Address 1</li>
					<li>Address 2</li>
					<li>Contact Number</li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<ul>
					<li><a href="#" class="f1"> </a></li>
					<li><a href="#" class="f2"> </a></li>
					<li><a href="#" class="f3"> </a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--footer-->
	<!-- copy -->
	<div class="copy-right">
		<div class="container">
			<p>&copy; 2015 All Rights Reserved | Design by <a href="http://www.agilesoftsol.com/">Agile Technologies</a></p>
		</div>
	</div>
	<!-- //copy -->
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		/*$(document).ready(function() {
			$().UItoTop({
				easingType : 'easeOutQuart'
			});
		});*/
	</script>
	<a href="#" id="toTop" style="display: block;"> 
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	<!-- //smooth scrolling -->
</body>
</html>
<!--<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">Login</h2>
      		</div>
      		<div class="modal-body login-modal">
      			
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
	        		<div class='modal-body-left'ng-controller="loginCtrl">
	        		<h3>Admin</h3>
	        			<div class="form-group">
		              		<input type="text" id="username" placeholder="Username" ng-model="form.username" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input type="password" id="login-pass" placeholder="Password" ng-model="form.password" class="form-control login-field">
		              		<i class="fa fa-lock login-field-icon"></i>
		              		<input type="hidden" name="acces_type" value="admin">
		            	</div>
		                 <div class="form-group">
		            	  	<input type="hidden" name="access_type" id="access_type"  ng-model="form.access_type" value="admin" ng_init="form.access_type='admin'" class="form-control login-field">
		              		
		              	 	</div>
		            	<button ng-click="authenticateAdmin()"  class="btn btn-success modal-login-btn">Login</button>
		            	<a href="#" class="login-link text-center">Lost your password?</a>
		            	<a href="Registration" class="login-link text-center">New User? Register!</a>
	        		</div>
	        	
	        		<div class='modal-body-right' ng-controller="loginCtrl">
	        			  <!--<div class="modal-social-icons">
	        				<a href='#' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
	        				<a href='#' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
	        				<a href='#' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
	        				<a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>
	        			
	        			</div> -->
	        			<!--<h3>User</h3>
	        			<div class="form-group">
		              		<input type="text" id="username" placeholder="Username" ng-model="form.username" value="" class="form-control login-field">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input type="password" id="login-pass" placeholder="Password" ng-model="form.password" value="" class="form-control login-field">
		              		<i class="fa fa-lock login-field-icon"></i>
		              	 	</div>
		              	 		<div class="form-group">
		            	  	<input type="hidden" name="access_type" id="access_type" placeholder="Password" ng-model="form.access_type" value="user" ng_init="form.access_type='user'" class="form-control login-field">
		              		
		              	 	</div>
		
		            <button ng-click="authenticate()" class="btn btn-success modal-login-btn">Login</button>
		            	<a href="#" class="login-link text-center">Lost your password?</a>
		                <a href="Registration" class="login-link text-center">New User? Register!</a>
	        		</div>	
	        		<div id='center-line'> OR </div>
	        	</div>																												
        		<div class="clearfix"></div>
        		
        		
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">
      		</div>
    	</div>
  	</div>
</div>-->
