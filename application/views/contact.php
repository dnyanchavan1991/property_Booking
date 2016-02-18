
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive
	Website Template | Contact :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Classic Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript">
	
	
	 addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 


</script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"
	media="all" />
<link href="css/tab.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" media="screen" /><link rel="stylesheet" href="css/jquery-ui.css" />

<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/angular.min.js"></script>

<script type="text/javascript" src="js/controller/getRoomDetailController.js"></script>
<!-- //js -->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
	rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
	jQuery(document).ready(
			function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop : $(this.hash).offset().top
					}, 1000);
				});
				jQuery('.tabs .tab-links a').on(
						'click',
						function(e) {
							var currentAttrValue = jQuery(this).attr('href');

							// Show/Hide Tabs
							jQuery('.tabs ' + currentAttrValue).show()
									.siblings().hide();

							// Change/remove current tab to active
							jQuery(this).parent('li').addClass('active')
									.siblings().removeClass('active');

							e.preventDefault();
						});
				
			});
</script>

<!-- start-smoth-scrolling -->
</head>
<body ng-app="getRoomDetailApp" ng-controller="getRoomDetailController"
	ng-init="getRoomDetail()">
	<!-- banner -->
	<div class="banner page-head">
		<div class="container">
			<div class="header-nav">
				
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
				       <li><button id='modal-launcher' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">
					  LOGIN</button></li>
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
						<div id="tab1" class="tab active">
							<p>
								<?php echo  $propertyDescription; ?>
							</p>
						</div>
						<div id="tab2" class="tab">
							<div class="flexslider">
								<ul class="slides">	
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
										echo '<li data-thumb="'.$image .'">';
										echo'<img src="'.$image .'" alt="" />';
										echo'</li>'; 
									} 
									else 
									{
										continue;
									}

								}?>
								</ul>
							</div>
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
							<?php echo $way_to_reach; ?>
						</div>
						<div class="tab" id="tab7">
							<?php //echo $way_to_reach; ?>
							<div class="contact-form" ng-controller="reviewCtrl">
								<form name="formData" ng-submit="processForm()">
									<input type="hidden" ng-model="formData.property_id" ng-value="<?php echo $property_id; ?>">
									<input type="text" ng-model="formData.customer_name" ng-value="<?php if(isset($name)){echo $name;} else {echo "";}?>"placeholder="Name" required>
									<input type="text" ng-model="formData.customer_email" ng-value="<?php if(isset($email_address)){echo $email_address;} else {echo "";}?>"placeholder="Email" required>
									<div class="clearfix"> </div>
									Rating:
									<span class="starRatingReview">
										<input id="rating5" type="radio" ng-model="formData.rating_given" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" ng-model="formData.rating_given" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" ng-model="formData.rating_given" value="3" ng-checked="true">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" ng-model="formData.rating_given" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" ng-model="formData.rating_given" value="1">
										<label for="rating1">1</label>
									</span>
									<div class="clearfix"> </div>
									<textarea style="height: 110px !important;" ng-model="formData.review_given" placeholder="Content...(max 250)" required></textarea>
									<div class="clearfix"> </div>
									<input style="margin-top: 0px!important;margin-left:0px !important;" type="submit" value="SEND">
								</form>
							</div>
							<div class="other-comments">
								<div class="comments-head">
									<h3>Reviews</h3>
									<div class="clearfix"></div>
								</div>
								<div class="comments-bot">
									<?php 
									foreach($propertyReviews as $review){
									?>
									<p>"<?php echo $review['review_text'];?>"</p>
									<div class="rating text-left">
										<?php 
										for($i=1; $i<=$review['star_rating']; $i++)
										{
											echo "<span>☆</span>";
										}
										?>
									</div>
									<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> <?php echo $review['customer_name'];?> <p style="display:inline-block;"><?php echo $review['customer_email'];?></p></h4>
									<?php }?>
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
						<p>Special Offer</p>	
						<script>
							$(document).ready(function(){
								$('[data-toggle="tooltip"]').tooltip();   
							});
						</script>
					</div>
					<div class="sp-bor-btn text-right">
						<h4><span>$8,750</span> $4,850</h4>
						<p class="best-pri">Best price</p>
						
						<a class="best-btn" href="BookProperty">Book Now</a>
						<div class="hotel-left-two" ng-controller="popupController">
									
									<p>
										<button ng-click="togglemailPopUp()" class="btn btn-default">Send
											Mail</button>
										<button ng-click="togglemessagePopUp()"
											class="btn btn-default">Send SMS</button>
									</p>
									<modal title="Enquiry via mail" visible="showModal">
									<form name="formData" ng-submit="contactToCustomer(rooms)">
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
												style="width: 60%; height: 0px;" onfocus="this.value = '';"
												onblur="if (this.value == '') {this.value = '';}" required>
										</div>
										<div class="form-group">
											<label for="checkOut"></label><input class="date"
												name="checkOut" id="checkOut" ng-model="form.checkOut"
												ng-init="checkOut= 'CheckIn Date'" type="text"
												style="width: 60%; height: 0px;" onfocus="this.value = '';"
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
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63718.72916803739!2d102.31975295000002!3d3.489618449999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ceba2007355f81%3A0xd2ff1ad6a3ca801!2sMentakab%2C+Pahang%2C+Malaysia!5e0!3m2!1sen!2sin!4v1439535856431"></iframe>
				</div>
				
			</div>
			<!--<div class="map">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63718.72916803739!2d102.31975295000002!3d3.489618449999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ceba2007355f81%3A0xd2ff1ad6a3ca801!2sMentakab%2C+Pahang%2C+Malaysia!5e0!3m2!1sen!2sin!4v1439535856431"></iframe>
			</div>-->
			<div class="paragraph">
				<p>
					<b></b>
				</p>
			</div>
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
		<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
			});
		});
		</script>
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
	</script>
	<a href="#" id="toTop" style="display: block;"> <span
		id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
</body>
</html>