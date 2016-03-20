<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive
	Website Template | Contact :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript">
	addEventListener("load", function(){
		setTimeout(hideURLbar, 0); 
	}, false);
	function hideURLbar()
	{ 
		window.scrollTo(0,1);
	} 
</script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"	media="all" />
<link href="css/tab.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/slippry.css" media="screen" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/dirPagination.js"></script>
<script type="text/javascript" src="js/angular-messages.min.js"></script>
<script type="text/javascript" src="js/controller/getRoomDetailController.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
	rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script defer src="js/slippry.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({
				scrollTop : $(this.hash).offset().top
			}, 1000);
		});
		jQuery('.tabs .tab-links a').on('click',function(e){
			var currentAttrValue = jQuery(this).attr('href');
			// Show/Hide Tabs
			jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
			// Change/remove current tab to active
			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
			e.preventDefault();
		});
	});
	$(function() {
		$("#review_checkin").datepicker({
			dateFormat: "dd/mm/yy",
			//minDate:  0,
			onClose: function(date){            
				var date1 = $('#review_checkin').datepicker('getDate');           
				var date = new Date( Date.parse( date1 ) ); 
				date.setDate( date.getDate() + 1 );        
				var newDate = date.toDateString(); 
				newDate = new Date( Date.parse( newDate ) );   
				$('#review_checkout').datepicker("option","minDate",newDate);            
			}
		});
		$('#review_checkout').datepicker({
			dateFormat: "dd/mm/yy" 
		});
	});
</script>

<!-- start-smoth-scrolling -->
</head>
<body ng-app="getRoomDetailApp" ng-controller="getRoomDetailController"	ng-init="getRoomDetail()">
	<!-- banner -->
	<div class="banner page-head">
		<div class="container">
			<div class="header-nav">
				
				<div class="navigation">
					<span class="menu"><img src="images/menu.png" alt="" /></span>
					<nav class="cl-effect-11" id="cl-effect-11">
						<ul class="nav1">
							<li><a href="Index1" data-hover="HOME">HOME</a></li>
						    <li><a  href="" id='modal-launcher' data-toggle="modal" data-target="#login-modal" data-hover="LOGIN">LOGIN</a></li>
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
				<div class="social-icons" style="margin-top: -3%;" >
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
	<!--contact-->
	<div class="contact">
		<div class="container">
			<h2 class="tittle-one">
				<?php echo $propertyName;  ?>
			</h2>
			<div class="col-md-8 single-gd-lt">
				<div class="tabs">
					<ul class="tab-links">
						<li class="active"><a href="#tab1">Description</a></li>
						<li><a href="#tab2">Gallery</a></li>
						<li><a href="#tab4">Charges</a></li>
						<li><a href="#tab6">How to Reach</a></li>
						<li><a href="#tab7">Reviews</a></li>
					</ul>

					<div class="tab-content">
						<!-- Description-->
						<div id="tab1" class="tab active">
							<p>
								<?php echo  nl2br($propertyDescription); ?>
							</p>
							<br/>
							<h3> The Property </h3>
							<p>
								<ul>
									<li style=" float: left"> 
										Type :
									</li>
									<li style="  float: left"> 
										Bedrooms : <?php echo  nl2br($bedrooms); ?>
									</li>
									<li style=" float: left"> 
										Bathrooms : <?php echo  nl2br($bathrooms); ?>
									</li>
									<li style="  float: left"> 
										Accommodates : <?php echo  $accommodates; ?>
									</li>
								</ul>
								<br/><br/>
								<h3>Amenities </h3>
								
								<ul>
									<li style="float: left; padding: 10px"> 
										Swimming Pool : <?php echo  nl2br($pool); ?>
									</li>
									<li style="  float: left; padding: 10px"> 
										Food : <?php echo  nl2br($meals); ?>
									</li>
									<li style="  float: left; padding: 10px"> 
										Internet Access  : <?php echo  nl2br($internet_access); ?>
									</li> 
								</ul><br/><br/>
								<ul>
									<li style="  float: left: padding: 10px"> 
										television : <?php echo  $television; ?>
									</li>
									<li style="  float: left; padding: 10px"> 
										Pets Allowed : <?php echo  nl2br($pet_friendly); ?>
									</li>
									<li style="  float: left: padding: 10px"> 
										Air Conditioned : <?php echo  $air_condition; ?>
									</li>
									
									<li style="  float: left; padding: 10px"> 
										In-House Kitchen : <?php echo  $in_house_kitchen; ?>
									</li>
									<li style="  float: left"> 
										Other Amenities : <?php echo  nl2br($other_amenities); ?>
									</li>
									<li style="  float: left"> 
										Leisure Activities : <?php echo  nl2br($leisureActivities); ?>
									</li>
								</ul> 
							</p>
						  
							 
						 
						</div>
						<!-- Description-->
						
						<div id="tab2" class="tab">
							<div class="">
								<ul id="slides">	
									<?php	
									$files = glob('Admin/'.$imagePath."*.*");
									for ($i=1; $i<count($files); $i++)
									{
										$image = $files[$i];
										$supported_file = array(
																	'gif',
																	'jpg',
																	'jpeg',
																	'png'
																);
										$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
										if (in_array($ext, $supported_file))
										{
											echo "<li>";
											echo "<img src='".$image."' alt=''/>";
											echo "</li>"; 
										} 
										else 
										{
											continue;
										}
									}?>
								</ul>
							</div>
							<script>
							$(function() {
								var demo1 = $("#slides").slippry({
									 transition: 'horizontal'
									// useCSS: true,
									// speed: 1000,
									// pause: 3000,
									// auto: true,
									// preload: 'visible',
									// autoHover: false
								});
							});
							</script>
						</div>
					
						<div id="tab4" class="tab">
						<?php 
						foreach($rentresult as $row)
						{
							$row=(array)$row;
							echo'<p><b>Accomodation Type:-</b>'.$row['accomodation'].
							'<br><b>Base Price:-</b>'.$row['basePrice'].
							'<br><b>Price per child:-</b>'.$row['childPrice'].
							'<br><b>Price per Adult:-</b>'.$row['adultPrice'].
							'<br><b>Room capacity:-</b>'.$row['capacity'].
							'</p><br><br>';
						}
						?>
						</div>
						<div id="tab6" class="tab">
							<?php echo nl2br($way_to_reach); ?>
						</div>
						<div class="tab" id="tab7" >
							<div class="contact-form">
								<form name="form" novalidate ng-submit="form.$valid && processForm()" ng-controller="reviewCtrl" class="angular-msgs">
									
									<?php if(isset($name) && isset($email_address)){?>
										<input type="text" id="customer_name" ng-model="customer_name" placeholder="Name" ng-init="customer_name='<?php echo $name;?>'" readonly>
										<input type="email" ng-model="customer_email" placeholder="Email" ng-init="customer_email='<?php echo $email_address;?>'" readonly>
									<?php } else{?>
									
										<input type="text" id="customer_name" ng-model="customer_name" name="customer_name" ng-pattern="/^[a-zA-Z ]*$/" placeholder="Name"  style="margin-top: -13px !important;" ng-value="" required>
										<div id="ng-error" ng-messages="form.customer_name.$error" ng-if="form.customer_name.$dirty">
											<div ng-message="required">This field is required</div>
											<div ng-message="pattern">Only characters & space allowed</div>
										</div>
										<input type="email" ng-model="customer_email" name="customer_email" ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" placeholder="Email" style="    margin-top: -13px !important;" ng-value="" required>
										<div id="ng-error" ng-messages="form.customer_email.$error" ng-if="form.customer_email.$dirty">
											<div ng-message="required">This field is required</div>
											<div ng-message="pattern">Your email address is invalid</div>
										</div>
									<?php }?>
									
									<div class="clearfix"> </div>
									
									<input id="review_checkin" type="text" ng-model="review_checkin" name="review_checkin" placeholder="Check-In date"  required>
									<div id="ng-error" ng-messages="form.review_checkin.$error" ng-if="form.review_checkin.$dirty">
										<div ng-message="required" style="margin-top: 23px;" >This field is required</div>
									</div>
									<input id="review_checkout" type="text" ng-model="review_checkout" name="review_checkout" placeholder="Check-Out date"  required>
									<div id="ng-error" ng-messages="form.review_checkout.$error" ng-if="form.review_checkout.$dirty">
										<div ng-message="required" style="margin-top: 23px; " >This field is required</div>
									</div>
									
									<div class="clearfix"> </div>
									
									<div style="display:inline-block;margin-left: 10px; ">Rating:</div>
									<div class="acidjs-rating-stars">
										<input type="radio" ng-model="rating_given" id="group-2-0" value="5" /><label for="group-2-0"></label>
										<input type="radio" ng-model="rating_given" id="group-2-1" value="4" /><label for="group-2-1"></label>
										<input type="radio" ng-model="rating_given" id="group-2-2" ng-init="rating_given=3" ng-selected="true" value="3" /><label for="group-2-2"></label>
										<input type="radio" ng-model="rating_given" id="group-2-3" value="2" /><label for="group-2-3"></label>
										<input type="radio" ng-model="rating_given" id="group-2-4" value="1" /><label for="group-2-4"></label>
									</div>
									
									<textarea style="height: 110px !important;" ng-model="review_given" ng-minlength="100" ng-maxlength="1000" name="review_given"  placeholder="Content...(max 1000)" required></textarea>
									<div id="ng-error" ng-messages="form.review_given.$error" ng-if="form.review_given.$dirty" >
										<div ng-message="required">This field is required</div>
										<div ng-message="minlength" style=" margin-left: 205px; margin-top:-38px;">Review must be over 100 characters</div>
										<div ng-message="maxlength">Review must not exceed 1000 characters</div>									
									</div>
									
									<div class="clearfix"> </div>
									
									<input type="hidden" ng-model="prop_id" ng-init="prop_id='<?php echo $property_id;?>'" >
									<input style="margin-top: 0px!important; !important;" type="submit" id="submit" value="Submit">
									<br/><br/>
								</form>
							</div>
							<div class="other-comments" ng-controller="paginateReview" ng-init="getReviews()">
								<div class="comments-head">
									<div style="float:left;"><h3>Reviews</h3></div>
									<div style="float:right;">
										<dir-pagination-controls
											max-size="5"
											direction-links="true"
											boundary-links="true"
											auto-hide="true">
										</dir-pagination-controls>
									</div>
									<!--<div>
										<select ng-model="perpage">
											<option ng-value="5" ng-selected="true">5</option>
											<option ng-value="10">10</option>
											<option ng-value="25">25</option>
										</select>
									</div>-->
									<div class="clearfix"></div>
								</div>
								<div class="comments-bot" dir-paginate="reviews_count in reviews | itemsPerPage: 10">
									<p style="white-space: pre-line;">{{reviews_count.review_text}}</p>
									<div class="text-left" >
										<span class="red-star" ng-repeat="r_cnt in strtoint(reviews_count.star_rating)">★</span>
									</div>
									<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> 
										{{reviews_count.customer_name}} <br/>
									<p style="display:inline-block;">Visited property during {{reviews_count.check_in}} - {{reviews_count.check_out}}</p>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 single-gd-rt">
				<div class="spl-btn">
					<div class="spl-btn-bor">
						<a href="#" data-toggle="tooltip" title="Save up to 50% on this stay">
							<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
						</a>
						<p>Contact</p>	
						<script>
							$(document).ready(function(){
								$('[data-toggle="tooltip"]').tooltip();   
							});
						</script>
					</div>
					<div class="sp-bor-btn text-right">
						<h4>Availability : <?php echo $avail_accomodates;?></h4>
						<p class="best-pri"></p>
						
						<a class="best-btn" onclick=" return checkLogin()" href="BookProperty">Book Now</a>
						<div class="hotel-left-two" ng-controller="popupController">
									
									<p>
										<a href="" ng-click="togglemailPopUp()" class="best-btn">Send
											Mail</a>
										<a href="" ng-click="togglemessagePopUp()"
											class="best-btn">Send SMS</a>
									</p>
									<modal title="Enquiry via mail" visible="showModal">
									<form name="formData" ng-submit="Contact_to_customer_enquiry(<?php echo "'$propertyId'"; ?>)">
										<div class="form-group">
											<label for="email"></label> <input type="text"
												class="form-control" name="full_name" id="full_name"
												ng-model="form.full_name" placeholder="Full Name" />
										</div>
										<div class="form-group" id="email_id_div">
											<label for="email"></label> <input type="email"
												class="form-control" name="email_id" id="email_id"
												ng-model="form.email_id" placeholder="Enter email" />
										</div>
										<div class="form-group" id="phone_div">
											<label for="email"></label> <input type="text"
												class="form-control" name="phone" id="phone"
												ng-model="form.phone"
												placeholder="Enter Phone/Mobile Number" />
										</div>
										<div class="form-group">
											<label for="checkIn"></label><input class="date"
												name="checkIn" id="checkIn" ng-model="form.checkIn"
												ng-init="checkIn= 'CheckIn Date'" type="text"
												style="width: 70%; padding: 15px !important; margin: 0px !important;  height: 0px;  " onfocus="this.value = '';"
												onblur="if (this.value == '') {this.value = '';}" required>
										</div>
										<div class="form-group">
											<label for="checkOut"></label><input class="date"
												name="checkOut" id="checkOut" ng-model="form.checkOut"
												ng-init="checkOut= 'CheckIn Date'" type="text"
												style="width: 70%; padding: 15px !important; margin: 0px !important; height: 0px;" onfocus="this.value = '';"
												onblur="if (this.value == '') {this.value = '';}" required>
										</div>
										<div class="form-group">
											<label for="enquiry"></label>
											<textarea type="text" class="form-control"
												ng-model="form.enquiry" id="enquiry" name="enquiry"
												placeholder="Enquiry.." required="required"></textarea>
										</div>

										<br>

										<button type="submit" class="btn btn-default">Submit</button>
									</form>
									<script src="js/jquery-ui.js"></script>
									 <script>
										$(function() {
											$("#datepicker,#checkIn,#checkOut")
													.datepicker();
										});
									</script> </modal>

								</div>
					</div>
				</div>
				<div class="map-gd">
					<div id="map_canvas" style="width:100%;height:270px;"></div>
					<script src="http://maps.googleapis.com/maps/api/js"></script>
					<script>
						/* - map - */
						var map;
						var lat = parseFloat('<?php echo $latitude;?>');
						var log = parseFloat('<?php echo $longitude;?>');
						var myLatlng = new google.maps.LatLng(lat,log);
						var myOptions = {
											zoom: 12,
											center: myLatlng,
											mapTypeId: google.maps.MapTypeId.ROADMAP
										};
						map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
						var marker = new google.maps.Marker({
							position: myLatlng,
							map: map,
							title: "Property location"
						});
						
						/* - map end - */
					</script>
				</div>
				
			</div>
			<!--<div class="map">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63718.72916803739!2d102.31975295000002!3d3.489618449999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ceba2007355f81%3A0xd2ff1ad6a3ca801!2sMentakab%2C+Pahang%2C+Malaysia!5e0!3m2!1sen!2sin!4v1439535856431"></iframe>
			</div>-->
			<!-- <div class="contact-form">
				<h3 class="tittle">CONTACT FORM</h3>
				<form>
					<input type="text" placeholder="Name"> <input type="text"
						placeholder="Email"> <input type="text"
						placeholder="Subject">
					<div class="clearfix"></div>
					<textarea placeholder="Message"></textarea>
					<input type="submit" value="SEND">
				</form>
			</div>-->
		</div>
	</div>
	

	<!--//contact-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 ftr_navi ftr">
				<h3>NAVIGATION</h3>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="typography.html">Services</a></li>
					<li><a href="booking.html">Booking</a></li>
					<li><a href="contact.html">Contact</a></li>
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
					<li>Ola-ola street jump,</li>
					<li>260-14 City, Country</li>
					<li>+62 000-0000-00</li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<a href="index.html"><span class="glyphicon glyphicon-home"
					aria-hidden="true"></span>Classic Hotel</a>
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
			<p>
				&copy; 2015 All Rights Reserved | Design by <a
					href="http://www.agilesoftsol.com/">Agile Technologies</a>
			</p>
		</div>
	</div>
	<!-- //copy -->
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			 */
			$().UItoTop({
				easingType : 'easeOutQuart'
			});
		});
		
		function checkLogin() {
			var name = $("#customer_name").val();
			if(name !='') {
				return true;
			} else {
				alert("Please login to book the property...!");
				//return false;
				 window.location.href = "http://localhost:8081/Property_Booking/dev_1/branches/dev/login";
				
				
				return false;
			}
		}
	</script>
	<a href="#" id="toTop" style="display: block;"> <span
		id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
</body>
</html>